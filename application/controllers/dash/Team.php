<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['string', 'date']);
        $this->load->model(['M_Auth', 'M_Team']);

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
            $this->handleTeamUpdate($old_slug, $user_id, $now);
        } else {
            $this->form_validation->set_rules('team_name', 'Team name', 'required');
            $this->form_validation->set_rules('team_title', 'Team title', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->handleValidationErrors();
            } else {
                $this->handleTeamCreation($user_id, $now);
            }
        }
    }

    private function handleTeamUpdate($old_slug, $user_id, $now)
    {
        $data = $this->prepareTeamData($user_id, $now);

        if ($_POST['submit'] == 'update_nama') {
            $data['name'] = $this->input->post('team_name');
        } elseif ($_POST['submit'] == 'update_logo') {
            $this->handleLogoUpdate($old_slug, $data);
        }

        $this->M_Team->update_data($data, $old_slug);
    }

    private function handleValidationErrors()
    {
        $this->session->set_flashdata('message_error', trim(preg_replace(["/<p>/", "/<\/p>/"], ["", ""], validation_errors())));
        $this->session->set_flashdata('team_name', set_value('team_name'));
        $this->session->set_flashdata('team_title', set_value('team_title'));
        redirect($_SERVER['HTTP_REFERER']);
    }

    private function handleTeamCreation($user_id, $now)
    {
        $data = $this->prepareTeamData($user_id, $now);
        $slug = url_title($this->input->post('team_name'), 'dash', TRUE);
        $this->handleLogoUpload($slug, $data);
    }

    private function prepareTeamData($user_id, $now)
    {
        return [
            'name' => $this->input->post('team_name'),
            'jabatan' => $this->input->post('team_title'),
            'sm_facebook' => $this->input->post('team_fb'),
            'sm_twitter' => $this->input->post('team_tw'),
            'sm_instagram' => $this->input->post('team_ig'),
            'sm_linkedin' => $this->input->post('team_lk'),
            'no_urut_jabatan' => '2',
            'created_at' => $now,
            'created_by' => $user_id,
        ];
    }

    private function handleLogoUpdate($old_slug, &$data)
    {
        $photo = $_FILES['team_photo']['name'];
        $old_data = $this->M_Team->detail($old_slug);
        $old_photo = $old_data['photo'];

        $this->deleteOldPhoto($old_photo);

        $data['photo'] = $this->uploadPhoto($old_slug);
    }

    private function deleteOldPhoto($photo)
    {
        $path = 'assets/front/images/team/' . $photo;
        if (file_exists($path)) {
            unlink($path);
        }
    }

    private function handleLogoUpload($slug, &$data)
    {
        $data['photo'] = $this->uploadPhoto($slug);
        $this->M_Team->add_team($data);
    }

    private function uploadPhoto($slug)
    {
        $photo = $_FILES['team_photo']['name'];
        $path_info = pathinfo($photo);
        $extension = $path_info['extension'];
        $new_photo_file_name = $slug . '.' . $extension;

        $config = [
            'upload_path' => 'assets/front/images/team/',
            'allowed_types' => 'jpeg|jpg|JPEG|JPG',
            'overwrite' => TRUE,
            'max_size' => '99999999999',
            'max_height' => '3000',
            'max_width' => '3000',
            'file_name' => $new_photo_file_name,
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('team_photo')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('message_error', 'Error message: ' . $error);
            redirect($_SERVER['HTTP_REFERER'], $error);
        }

        return $new_photo_file_name;
    }

    public function delete()
    {
        $slug = $this->uri->segment(4);
        $this->deleteTeam($slug);
    }

    private function deleteTeam($slug)
    {
        $old_data = $this->M_Team->detail($slug);
        $this->deleteOldPhoto($old_data['photo']);
        $this->M_Team->delete($slug);
    }
}
