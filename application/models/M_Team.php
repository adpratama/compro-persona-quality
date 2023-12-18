<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Team extends CI_Model
{
    public function list()
    {
        return $this->db->order_by('no_urut_jabatan', 'ASC')->order_by('name', 'ASC')->get('team')->result();
    }

    public function is_available($slug)
    {
        return $this->db->select('count(Id) as id')->where('slug', $slug)->get('client')->row_array();
    }

    public function detail($slug)
    {
        return $this->db->where('slug', $slug)->get('client')->row_array();
    }

    public function add_team($data)
    {
        $this->db->insert('team', $data);
        $this->session->set_flashdata('message_name', 'The team added successfully.');
        redirect("dash/team");
    }

    public function update_data($data, $old_slug)
    {
        $this->db->where('slug', $old_slug)->update('client', $data);
        $this->session->set_flashdata('message_name', 'The client data updated successfully.');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update_photo($data, $slug)
    {
        $this->db->where('slug', $slug)->update('client', $data);
        $this->session->set_flashdata('message_name', 'The photo has been successfully modified.');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($slug)
    {
        $this->db->where('slug', $slug)->delete('client');
        $this->session->set_flashdata('message_name', 'The client has been successfully deleted.');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
