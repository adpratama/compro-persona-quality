<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    const SETTING_FIELDS = ['visi', 'misi', 'tentang', 'alamat', 'email', 'telepon', 'facebook', 'twitter', 'instagram'];

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['string', 'date']);
        $this->load->model(['M_Auth', 'M_Setting']);

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

        foreach (self::SETTING_FIELDS as $field) {
            $data[$field] = $this->M_Setting->setting($field);
        }

        $data['values'] = $this->M_Setting->our_values();

        $this->load->view('pages/dashboard/index', $data);
    }

    private function updateData($fields, $message)
    {
        $now = date('Y-m-d H:i:s');

        foreach ($fields as $field) {
            $data_contact = [
                'content' => trim($this->input->post($field)),
                'updated_at' => $now,
                'updated_by' => $this->session->userdata('user_id'),
            ];

            $this->M_Setting->update_contact($data_contact, $field);
        }

        $this->session->set_flashdata('message_name', $message);
        redirect("dash/setting");
    }

    public function update_visimisi()
    {
        $this->updateData(['visi', 'misi', 'tentang'], 'About us information has been successfully updated.');
    }

    public function update_contact()
    {
        $this->updateData(['telepon', 'email', 'alamat', 'facebook', 'twitter', 'instagram'], 'Contact information has been successfully updated.');
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
