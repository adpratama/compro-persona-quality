<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Service extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function list()
    {
        return $this->db->order_by('judul', 'ASC')->get('service')->result();
    }

    public function add_service($data)
    {
        return $this->db->insert('service', $data);
    }

    public function detail($slug)
    {
        return $this->db->where('slug', $slug)->get('service')->row_array();
    }

    public function list_limit($limit, $from)
    {
        return $this->db->order_by('created_at', 'DESC')->get('service', $limit, $from)->result();
    }

    public function get_published_count()
    {
        return $this->db->get('service')->num_rows();
    }

    public function is_available($id)
    {
        return $this->db->select('photo')->where('slug', $id)->get('service')->row_array();
    }

    public function update_photo($data, $slug)
    {
        return $this->db->where('slug', $slug)->update('service', $data);
    }

    public function update_service($data, $old_slug)
    {
        return $this->db->where('slug', $old_slug)->update('service', $data);
    }

    public function delete($slug)
    {
        return $this->db->where('slug', $slug)->delete('service');
    }

    public function items($id)
    {
        return $this->db->where('id_service', $id)->get('service_details')->result();
    }

    public function add_new_item($data)
    {
        return $this->db->insert('service_details', $data);
    }

    public function update_item($data, $old_slug)
    {
        return $this->db->where('slug', $old_slug)->update('service_details', $data);
    }

    public function delete_item($slug)
    {
        return $this->db->where('slug', $slug)->delete('service_details');
    }
}
