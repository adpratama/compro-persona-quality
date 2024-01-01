<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Testimonial extends CI_Model
{
    public function pending()
    {
        return $this->db->where('status', '0')->order_by('id', 'ASC')->get('testimonial')->result();
    }

    public function list()
    {
        return $this->db->where('status', '1')->order_by('id', 'ASC')->get('testimonial')->result();
    }

    public function hidden()
    {
        return $this->db->where('status', '2')->order_by('id', 'ASC')->get('testimonial')->result();
    }

    public function detail($id)
    {
        return $this->db->where('id', $id)->get('testimonial')->row_array();
    }

    public function add_new($data)
    {
        return $this->db->insert('testimonial', $data);
    }

    public function approve($id, $data)
    {
        return $this->db->where('id', $id)->update('testimonial', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('testimonial');
        $this->session->set_flashdata('message_name', 'The testimonial has been successfully deleted.');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
