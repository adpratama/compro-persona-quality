<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('string');
        $this->load->model(array('M_Auth', 'M_Setting'));
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
            'title' => 'Settings',
            'pages' => 'pages/dashboard/setting/v_setting',
            'settings' => $this->M_Setting->list(),
        ];

        $this->load->view('pages/dashboard/index', $data);
    }

    public function store()
    {
        $old_slug = $this->uri->segment(4);

        $this->form_validation->set_rules('client_name', 'Client Name ', 'required');
        // $this->form_validation->set_rules('client_logo', 'Client Logo ', 'required');

        if ($this->form_validation->run() ===  FALSE) {

            $this->session->set_flashdata('message_error', trim(preg_replace(["/<p>/", "/<\/p>/"], ["", ""], validation_errors())));

            redirect($_SERVER['HTTP_REFERER']);
        } else {

            $user_id = $this->session->userdata('user_id');
            $client_name = trim($this->input->post('client_name'));

            // pembuatan slug dari nama produk
            $out = explode(" ", $client_name);
            $slug = preg_replace("/[^A-Za-z0-9\-]/", "", strtolower(implode("-", $out)));

            $now = date('Y-m-d H:i:s');

            if ($old_slug) {
            } else {

                $query_check = $this->M_Client->is_available($slug);

                $hasil = $query_check["id"];

                if ($hasil > 0) {
                    $this->session->set_flashdata('message_error', 'The client is already available.');
                    redirect('dash/client');
                } else {

                    $photo = $_FILES['client_logo']['name']; // Nama file 

                    // print_r($photo);
                    // exit;
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
}
