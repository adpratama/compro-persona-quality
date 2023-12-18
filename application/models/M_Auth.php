<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Auth extends CI_Model
{
    var $table = 'user';

    public function registration($data)
    {
        $this->db->insert('user', $data);
        $this->session->set_flashdata('success', 'You have successfully registered. Please login!');
        redirect('auth');
    }

    public function cek_user($id)
    {
        if (empty($id)) {
            redirect('auth');
        }
        return $this->db->get_where('user', ['username' => $id])->row_array();
    }

    public function cek_role($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

    public function cek_user_id($id)
    {
        if (empty($id)) {
            redirect('auth');
        }
        return $this->db->get_where('user', ['Id' => $id])->row_array();
    }

    public function update_user($data, $id)
    {
        $this->db->where('Id', $id);
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }

    public function role($id)
    {
        return $this->db->get_where('user_role', ['Id' => $id])->row_array();
    }

    public function dashboard()
    {
        return $this->db->get('user')->num_rows();
    }

    public function count_admin()
    {
        return $this->db->get_where('user', ['role_id' => '1'])->num_rows();
    }

    public function count_member()
    {
        return $this->db->get_where('user', ['role_id' => '2'])->num_rows();
    }

    public function users_list()
    {
        return $this->db->get('user')->result();
    }

    public function add_member($data)
    {
        $this->db->insert('user', $data);
        $this->session->set_flashdata('message_name', 'Member successfully added');
        redirect('dashboard/user');
    }

    public function add_member_v2($data)
    {
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }

    public function member_list()
    {
        $array = array('role_id' => '2', 'is_active' => '1');
        return $this->db->select('id_karyawan, name, username, nama_perusahaan')->where($array)->get('v_karyawan')->result();
    }

    public function member_list_id($id)
    {
        $array = array('id_karyawan' => $id);
        return $this->db->select('id_karyawan, name, username, nama_perusahaan')->where($array)->get('v_karyawan')->row_array();
    }
}
