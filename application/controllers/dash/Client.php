<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('string');
        $this->load->model(array('M_Auth', 'M_Client'));
        $this->load->helper('date');
        $this->load->library('form_validation');

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
        $user_id = $this->session->userdata('user_id');
        $now = date('Y-m-d H:i:s');

        if ($old_slug) {
            // untuk edit data client
            if ($_POST['submit'] == "update_nama") {
                // untuk edit nama saja
                $data = [
                    "name" => $this->input->post('client_name')
                ];

                $this->M_Client->update_data($data, $old_slug);
            } else if ($_POST['submit'] == "update_logo") {
                // untuk edit logo saja
                $photo = $_FILES['client_logo']['name'];

                $cek = $this->M_Client->detail($old_slug);

                $foto = $cek["logo"];
                $path = "assets/front/images/clients/" . $foto;

                if (file_exists($path)) {
                    unlink($path);
                }

                $pathInfo = pathinfo($photo);
                $extension = $pathInfo['extension']; // Extension file
                $newPhotoFileName = $old_slug . '.' . $extension;

                $config = array(
                    'upload_path' => 'assets/front/images/clients/',
                    'allowed_types' => "png|PNG",
                    'overwrite' => TRUE,
                    'max_size' => "99999999999",
                    'max_height' => "800",
                    'max_width' => "1500",
                    'file_name' => $newPhotoFileName
                );

                // var_dump($config);exit;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('client_logo')) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->session->set_flashdata('message_error', 'Error message: ' . $this->upload->display_errors() . '.');

                    // After that you need to used redirect function instead of load view such as 
                    redirect($_SERVER['HTTP_REFERER'], $error);
                } else {

                    $data = array(
                        'logo' => $newPhotoFileName,
                        'updated_at' => $now,
                        'updated_by' => $user_id
                    );

                    $this->M_Client->update_photo($data, $old_slug);
                }
            }
        } else {
            $this->form_validation->set_rules('client_name', 'Client Name ', 'required');

            if ($this->form_validation->run() ===  FALSE) {

                $this->session->set_flashdata('message_error', trim(preg_replace(["/<p>/", "/<\/p>/"], ["", ""], validation_errors())));

                redirect($_SERVER['HTTP_REFERER']);
            } else {

                $client_name = trim($this->input->post('client_name'));

                // pembuatan slug dari nama produk
                $out = explode(" ", $client_name);
                $slug = preg_replace("/[^A-Za-z0-9\-]/", "", strtolower(implode("-", $out)));

                $query_check = $this->M_Client->is_available($slug);

                $hasil = $query_check["id"];

                if ($hasil > 0) {
                    $this->session->set_flashdata('message_error', 'The client is already available.');
                    redirect('dash/client');
                } else {

                    $photo = $_FILES['client_logo']['name']; // Nama file 

                    // Mendapatkan extension
                    $pathInfo = pathinfo($photo);
                    $extension = $pathInfo['extension']; // Extension file
                    $newPhotoFileName = $slug . '.' . $extension;

                    $config = array(
                        'upload_path' => 'assets/front/images/clients/',
                        'allowed_types' => "png|PNG",
                        'overwrite' => TRUE,
                        'max_size' => "99999999999",
                        'max_height' => "2000",
                        'max_width' => "2500",
                        'file_name' => $newPhotoFileName
                    );

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('client_logo')) {
                        $error = array('error' => $this->upload->display_errors());

                        $this->session->set_flashdata('message_error', 'Error message: ' . $this->upload->display_errors());

                        // After that you need to used redirect function instead of load view such as 
                        redirect($_SERVER['HTTP_REFERER'], $error);
                    } else {

                        $data = [
                            'name' => $client_name,
                            'logo' => $newPhotoFileName,
                            'slug' => trim($slug),
                            'created_at' => $now,
                            'created_by' => $user_id,
                        ];

                        $this->M_Client->add_client($data);
                    }
                }
            }
        }
    }

    public function delete()
    {
        $slug = $this->uri->segment(4);

        $cek = $this->M_Client->detail($slug);

        $foto = $cek["photo"];

        $path = "assets/front/images/clients/" . $foto;

        if (file_exists($path)) {
            unlink($path);
        }

        $this->M_Client->delete($slug);
    }
}
