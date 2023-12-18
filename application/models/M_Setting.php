<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Setting extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function list()
    {
        return $this->db->get('settings')->result();
    }

    public function setting($clause)
    {
        return $this->db->where('kategori', $clause)->get('settings')->row_array();
    }

    public function update_contact($data, $kategori)
    {
        $this->db->where('kategori', $kategori);
        return $this->db->update('settings', $data);
    }

    public function our_values()
    {
        return $this->db->where('kategori', 'our_values')->get('settings')->result();
    }

    public function add_values($data)
    {
        $this->db->insert('settings', $data);
        $this->session->set_flashdata('message_name', 'Our values information has been successfully added.');
        redirect("dash/setting");
    }
}
