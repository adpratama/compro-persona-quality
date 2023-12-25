<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper('date');
        $this->load->model(array('M_Article', 'M_Setting'));
        $this->load->library(array('pagination'));
    }



    public function index()
    {
        $config['base_url'] = base_url('article/index');
        $config['total_rows'] = $this->M_Article->get_published_count();
        $config['per_page'] = 5;
        $config['num_link'] = 5;
        $config['full_tag_open'] = '<nav class="paging" aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = TRUE;
        $config['last_link'] = TRUE;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fas fa-angle-double-left"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fas fa-angle-double-right"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link active">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['display_pages'] = TRUE;

        $this->pagination->initialize($config);

        // Use 'page' instead of 'per_page'
        $from = $this->uri->segment(3);
        $limit = $config['per_page'];

        $data = [
            'title' => "Artikel",
            'pages' => 'pages/article/v_article',
            'article' => $this->M_Article->list_limit($limit, $from),
            'categories' => $this->M_Article->category(),
            'articles' => $this->M_Article->list_limit('3', '0'),
        ];

        $this->load->view('index', $data);
    }


    public function read()
    {
        $slug = $this->uri->segment(3);

        $detail = $this->M_Article->detail($slug);

        $data = [
            "title" => $detail['judul'],
            'pages' => 'pages/article/v_detail',
            'article' => $detail,
            'articles' => $this->M_Article->list_limit('3', '0'),
            'categories' => $this->M_Article->category(),
        ];

        $this->load->view('index', $data);
    }
}
