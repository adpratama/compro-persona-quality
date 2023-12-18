<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper('date');
        $this->load->model(array('M_Client', 'M_Setting', 'M_Team'));
    }

    public function about()
    {
        $data = [
            "title" => "About us",
            'pages' => 'pages/v_about',
            'visi' => $this->M_Setting->setting('visi'),
            'misi' => $this->M_Setting->setting('misi'),
            'tentang' => $this->M_Setting->setting('tentang'),
            'values' => $this->M_Setting->our_values(),
        ];

        $this->load->view('index', $data);
    }

    public function team()
    {
        $data = [
            "title" => "Our team",
            'pages' => 'pages/v_team',
            'teams' => $this->M_Team->list(),
            'values' => $this->M_Setting->our_values(),
        ];

        $this->load->view('index', $data);
    }
}
