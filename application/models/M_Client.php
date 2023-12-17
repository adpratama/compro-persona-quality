<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Client extends CI_Model
{
    public function list()
    {
        $query = $this->db->order_by('name', 'ASC')->get('client')->result();

        return $query;
    }

    public function is_available($slug)
    {
        $this->db->select('count(Id) as id');
        $this->db->where('slug', $slug);
        $query = $this->db->get('client')->row_array();

        print_r($query);
        exit;
        return $query;
    }

    public function detail($slug)
    {
        $query = $this->db->where('slug', $slug)->get('client')->row_array();

        return $query;
    }

    public function add_client($data)
    {
        $this->db->insert('client', $data);
        $this->session->set_flashdata('message_name', 'The client added successfully.');

        // After that you need to used redirect function instead of load view such as 
        redirect("dash/client");
    }

    public function update_data($data, $old_slug)
    {
        $this->db->where('slug', $old_slug);
        $this->db->update('client', $data);
        $this->session->set_flashdata('message_name', 'The client data updated successfully.');
        // After that you need to used redirect function instead of load view such as 

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update_photo($data, $slug)
    {
        $this->db->where('slug', $slug);
        $this->db->update('client', $data);

        $this->session->set_flashdata('message_name', 'The photo has been successfully modified.');

        // After that you need to used redirect function instead of load view such as 
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($slug)
    {
        $this->db->where('slug', $slug);
        $this->db->delete('client');

        $this->session->set_flashdata('message_name', 'The client has been successfully deleted.');
        // After that you need to used redirect function instead of load view such as 

        redirect($_SERVER['HTTP_REFERER']);
    }
}
