<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('string');
        $this->load->model(array('M_Auth', 'M_Team'));
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
            'title' => 'Team',
            'pages' => 'pages/dashboard/team/v_team',
            'teams' => $this->M_Team->list(),
        ];
        $this->load->view('pages/dashboard/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add team',
            'pages' => 'pages/dashboard/team/v_create',
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

                $this->M_Team->update_data($data, $old_slug);
            } else if ($_POST['submit'] == "update_logo") {
                // untuk edit logo saja
                $photo = $_FILES['client_logo']['name'];

                $cek = $this->M_Team->detail($old_slug);

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

                    $this->M_Team->update_photo($data, $old_slug);
                }
            }
        } else {
            $this->form_validation->set_rules('team_name', 'Team name ', 'required');
            $this->form_validation->set_rules('team_title', 'Team title ', 'required');

            if ($this->form_validation->run() ===  FALSE) {

                $this->session->set_flashdata('message_error', trim(preg_replace(["/<p>/", "/<\/p>/"], ["", ""], validation_errors())));

                $this->session->set_flashdata('team_name', set_value('team_name'));
                $this->session->set_flashdata('team_title', set_value('team_title'));
                $this->session->set_flashdata('team_fb', set_value('team_fb'));
                $this->session->set_flashdata('team_tw', set_value('team_tw'));
                $this->session->set_flashdata('team_ig', set_value('team_ig'));
                $this->session->set_flashdata('team_lg', set_value('team_lg'));


                redirect($_SERVER['HTTP_REFERER']);
            } else {

                $team_name = trim($this->input->post('team_name'));

                // pembuatan slug dari nama produk
                $out = explode(" ", $team_name);
                $slug = preg_replace("/[^A-Za-z0-9\-]/", "", strtolower(implode("-", $out)));

                $query_check = $this->M_Team->is_available($slug);

                $hasil = $query_check["id"];

                if ($hasil > 0) {
                    $this->session->set_flashdata('message_error', 'The team is already available.');
                    redirect('dash/team');
                } else {

                    $photo = $_FILES['team_photo']['name']; // Nama file 

                    // Mendapatkan extension
                    $pathInfo = pathinfo($photo);
                    $extension = $pathInfo['extension']; // Extension file
                    $newPhotoFileName = $slug . '.' . $extension;

                    $config = array(
                        'upload_path' => 'assets/front/images/team/',
                        'allowed_types' => "jpeg|jpg|JPEG|JPG",
                        'overwrite' => TRUE,
                        'max_size' => "99999999999",
                        'max_height' => "2000",
                        'max_width' => "2500",
                        'file_name' => $newPhotoFileName
                    );

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('team_photo')) {
                        $error = array('error' => $this->upload->display_errors());

                        $this->session->set_flashdata('message_error', 'Error message: ' . $this->upload->display_errors());

                        $this->session->set_flashdata('team_name', set_value('team_name'));
                        $this->session->set_flashdata('team_title', set_value('team_title'));
                        $this->session->set_flashdata('team_fb', set_value('team_fb'));
                        $this->session->set_flashdata('team_tw', set_value('team_tw'));
                        $this->session->set_flashdata('team_ig', set_value('team_ig'));
                        $this->session->set_flashdata('team_lg', set_value('team_lg'));

                        // After that you need to used redirect function instead of load view such as 
                        redirect($_SERVER['HTTP_REFERER'], $error);
                    } else {

                        $data = [
                            'name' => $team_name,
                            'jabatan' => $this->input->post('team_title'),
                            'sm_facebook' => $this->input->post('team_fb'),
                            'sm_twitter' => $this->input->post('team_tw'),
                            'sm_instagram' => $this->input->post('team_ig'),
                            'sm_linkedin' => $this->input->post('team_lk'),
                            'no_urut_jabatan' => '2',
                            'photo' => $newPhotoFileName,
                            'slug' => trim($slug),
                            'created_at' => $now,
                            'created_by' => $user_id,
                        ];

                        $this->M_Team->add_team($data);
                    }
                }
            }
        }
    }

    public function delete()
    {
        $slug = $this->uri->segment(4);

        $cek = $this->M_Team->detail($slug);

        $foto = $cek["photo"];

        $path = "assets/front/images/clients/" . $foto;

        if (file_exists($path)) {
            unlink($path);
        }

        $this->M_Team->delete($slug);
    }
}
