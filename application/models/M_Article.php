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

    public function detail($slug)
    {
        return $this->db->where('slug', $slug)->get('article_view')->row_array();
    }

    public function list_limit($limit, $from)
    {
        return $this->db->order_by('created_at', 'DESC')->get('article_view', $limit, $from)->result();
    }

    public function get_published_count()
    {
        return $this->db->get('article_view')->num_rows();
    }

    public function is_available($id)
    {
        return $this->db->select('photo')->where('slug', $id)->get('article')->row_array();
    }

    public function update_photo($data, $slug)
    {
        return $this->db->where('slug', $slug)->update('article', $data);
    }

    public function update_article($data, $old_slug)
    {
        return $this->db->where('slug', $old_slug)->update('article', $data);
    }

    public function delete($slug)
    {
        return $this->db->where('slug', $slug)->delete('article');
    }
}
