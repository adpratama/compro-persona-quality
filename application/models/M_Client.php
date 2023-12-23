<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Client extends CI_Model
{
    public function list()
    {
        return $this->db->order_by('name', 'ASC')->get('client')->result();
    }

    public function detail($slug)
    {
        return $this->db->where('slug', $slug)->get('client')->row_array();
    }

    public function add_data($data)
    {
        return $this->db->insert('client', $data);
    }

    public function update_data($data, $old_slug)
    {
        return $this->db->where('slug', $old_slug)->update('client', $data);
    }

    public function update_photo($data, $slug)
    {
        return $this->db->where('slug', $slug)->update('client', $data);
    }

    public function delete($slug)
    {
        return $this->db->where('slug', $slug)->delete('client');
    }
}
