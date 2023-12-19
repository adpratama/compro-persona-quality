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
}
