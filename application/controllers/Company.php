<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends CI_Controller
{
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['form', 'url', 'date']);
        $this->load->model(['M_Client', 'M_Setting', 'M_Team']);
        $this->data['values'] = $this->M_Setting->our_values();
    }

    public function about()
    {
        $this->data += [
            "title" => "About us",
            'pages' => 'pages/v_about',
            'visi' => $this->M_Setting->setting('visi'),
            'misi' => $this->M_Setting->setting('misi'),
            'tentang' => $this->M_Setting->setting('tentang'),
        ];

        $this->load->view('index', $this->data);
    }

    public function team()
    {
        $this->data += [
            "title" => "Our team",
            'pages' => 'pages/v_team',
            'teams' => $this->M_Team->list(),
        ];

        $this->load->view('index', $this->data);
    }
}
