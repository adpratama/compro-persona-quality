<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Article extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function list_dashboard()
    {
        return $this->db->order_by('judul', 'ASC')->get('article_view')->result();
    }

    public function category()
    {
        return $this->db->order_by('category_name', 'ASC')->get('article_category')->result();
    }

    public function detail_category($slug)
    {
        return $this->db->where('slug', $slug)->get('article_category')->row_array();
    }

    public function add_category($data)
    {
        return $this->db->insert('article_category', $data);
    }

    public function add_article($data)
    {
        return $this->db->insert('article', $data);
    }
}
