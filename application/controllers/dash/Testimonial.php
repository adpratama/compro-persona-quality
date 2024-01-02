<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimonial extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper(['string', 'date']);
        $this->load->model(['M_Auth', 'M_Testimonial']);

        if (!$this->session->userdata('is_logged_in')) {
            $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            You have to login first.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth');
        }
    }

    private function loadTestimonialView($page, $data)
    {
        $data['title'] = 'Testimonial';
        $data['pages'] = "pages/dashboard/{$page}";
        $this->load->view('pages/dashboard/index', $data);
    }

    public function index()
    {
        $data['pending'] = $this->M_Testimonial->pending();
        $data['visible'] = $this->M_Testimonial->list();
        $data['hidden'] = $this->M_Testimonial->hidden();
        $this->loadTestimonialView('v_testimonial', $data);
    }

    private function processApproval($id, $status, $successMessage, $errorMessage)
    {
        $data = ['status' => $status];

        if ($this->M_Testimonial->approve($id, $data)) {
            $this->session->set_flashdata('message_name', $successMessage);
        } else {
            $this->session->set_flashdata('message_error', $errorMessage);
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function approve()
    {
        $id = $this->uri->segment(4);
        $this->processApproval($id, 1, 'Testimoni telah disetujui dan akan ditampilkan di halaman depan', 'Terjadi kesalahan. Silahkan dicoba lagi');
    }

    public function hide()
    {
        $id = $this->uri->segment(4);
        $this->processApproval($id, 2, 'Testimoni telah ditolak dan tidak akan ditampilkan di halaman depan', 'Terjadi kesalahan. Silahkan dicoba lagi');
    }
}
