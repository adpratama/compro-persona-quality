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
            'visi' => $this->M_Setting->setting('visi'),
            'misi' => $this->M_Setting->setting('misi'),
            'tentang' => $this->M_Setting->setting('tentang'),
            'values' => $this->M_Setting->our_values(),
        ];

        $this->load->view('pages/dashboard/index', $data);
    }

    public function update_visimisi()
    {
        $now = date('Y-m-d H:i:s');

        $data_visi = array(
            'content' => trim($this->input->post('visi')),
            'updated_at' => $now,
            "updated_by" => $this->session->userdata('user_id'),
        );

        $data_misi = array(
            'content' => trim($this->input->post('misi')),
            'updated_at' => $now,
            "updated_by" => $this->session->userdata('user_id'),
        );

        $data_tentang = array(
            'content' => trim($this->input->post('tentang')),
            'updated_at' => $now,
            "updated_by" => $this->session->userdata('user_id'),
        );

        $this->M_Setting->update_visimisi($data_visi, $data_misi, $data_tentang);
    }

    public function update_contact()
    {
        $now = date('Y-m-d H:i:s');

        $data_telepon = array(
            'content' => trim($this->input->post('telepon')),
            'updated_at' => $now,
            "updated_by" => $this->session->userdata('user_id'),
        );

        $data_email = array(
            'content' => trim($this->input->post('email')),
            'updated_at' => $now,
            "updated_by" => $this->session->userdata('user_id'),
        );

        $data_alamat = array(
            'content' => trim($this->input->post('alamat')),
            'updated_at' => $now,
            "updated_by" => $this->session->userdata('user_id'),
        );

        $this->M_Setting->update_contact($data_telepon, $data_email, $data_alamat);
    }

    public function add_values()
    {
        $data = [
            "judul_setting" => $this->input->post('values_title'),
            "content" => $this->input->post('values_content'),
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => $this->session->userdata('user_id'),
            "kategori" => "our_values"
        ];

        $this->M_Setting->add_values($data);
    }
}
