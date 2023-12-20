<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper(['string', 'date']);
        $this->load->model(['M_Auth', 'M_Article']);

        if (!$this->session->userdata('is_logged_in')) {
            $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            You have to login first.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('auth');
        }
    }

    private function loadArticleView($page, $data)
    {
        $data['title'] = 'Article';
        $data['pages'] = "pages/dashboard/article/{$page}";
        $this->load->view('pages/dashboard/index', $data);
    }

    public function index()
    {
        $data['articles'] = $this->M_Article->list_dashboard();
        $this->loadArticleView('v_article', $data);
    }

    public function create()
    {
        $data['categories'] = $this->M_Article->category();

        if (!$data['categories']) {
            $this->session->set_flashdata('message_error', 'Article category is empty. Please add some category before you can create a new article.');
            $this->loadArticleView('v_category', $data);
        } else {
            $this->loadArticleView('v_create', $data);
        }
    }
}
