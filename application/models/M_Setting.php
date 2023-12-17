<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Setting extends CI_Model
{
    public function list()
    {
        $query = $this->db->get('settings')->result();
        return $query;
    }
}
