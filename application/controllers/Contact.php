<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper('date');
        $this->load->model(array('M_Client', 'M_Setting', 'M_Team'));
    }

    public function index()
    {
        $data = [
            "title" => "Contact",
            'pages' => 'pages/v_contact',
            'telepon' => $this->M_Setting->setting('telepon'),
            'email' => $this->M_Setting->setting('email'),
            'alamat' => $this->M_Setting->setting('alamat'),
        ];

        $this->load->view('index', $data);
    }
}
