<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    const UPDATE_NAMA = "update_nama";
    const UPDATE_LOGO = "update_logo";

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper(['string', 'date']);
        $this->load->model(['M_Auth', 'M_Client']);

        if (!$this->session->userdata('is_logged_in')) {
            $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			You have to login first.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Client',
            'pages' => 'pages/dashboard/client/v_client',
            'clients' => $this->M_Client->list(),
        ];
        $this->load->view('pages/dashboard/index', $data);
    }

    public function store()
    {
        $old_slug = $this->uri->segment(4);
        $client_name = $this->input->post('client_name');
        $data = ['name' => $client_name];

        if ($old_slug) {

            switch ($_POST['submit']) {
                case self::UPDATE_NAMA:
                    $this->M_Client->update_data($data, $old_slug);
                    break;

                case self::UPDATE_LOGO:
                    $this->handleLogoUpdate($old_slug);
                    break;

                default:
                    // Default case
                    break;
            }
        } else {

            $upload_path = 'assets/front/images/clients/';
            $slug = url_title($this->input->post('client_name'), 'dash', TRUE);
            $data['logo'] = $this->uploadPhoto($slug, $upload_path);
            $this->M_Client->add_data($data);

            $this->session->set_flashdata('message_name', $data['name'] . ' berhasil ditambahkan.');

            redirect('dash/client');
        }
    }

    private function handleLogoUpdate($old_slug)
    {
        $user_id = $this->session->userdata('user_id');
        $now = date('Y-m-d H:i:s');
        $upload_path = 'assets/front/images/clients/';

        $photo = $_FILES['client_logo']['name'];
        $old_data = $this->M_Client->detail($old_slug);
        $old_photo = $old_data['logo'];

        $this->deleteOldPhoto($old_photo, $upload_path);

        $data['logo'] = $this->uploadPhoto($old_slug, $upload_path);
        $data['updated_at'] = $now;
        $data['updated_by'] = $user_id;

        $this->M_Client->update_photo($data, $old_slug);
    }

    private function deleteOldPhoto($photo, $upload_path)
    {
        $path = $upload_path . $photo;
        if (file_exists($path)) {
            unlink($path);
        }
    }

    private function uploadPhoto($slug, $upload_path)
    {
        $photo = $_FILES['client_logo']['name'];
        $path_info = pathinfo($photo);
        $extension = $path_info['extension'];
        $new_photo_file_name = $slug . '.' . $extension;

        $config = [
            'upload_path' => $upload_path,
            'allowed_types' => 'png|PNG',
            'overwrite' => TRUE,
            'max_size' => '99999999999',
            'max_height' => '800',
            'max_width' => '1500',
            'file_name' => $new_photo_file_name,
        ];

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('client_logo')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('message_error', 'Error message: ' . $error);
            redirect($_SERVER['HTTP_REFERER']);
        }

        return $new_photo_file_name;
    }

    public function delete()
    {
        $slug = $this->uri->segment(4);
        $this->deleteClient($slug);
    }

    private function deleteClient($slug)
    {
        $old_data = $this->M_Client->detail($slug);
        $this->deleteOldPhoto($old_data['logo'], 'assets/front/images/clients/');
        $this->M_Client->delete($slug);
    }
}
