<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends CI_Controller
{
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['form', 'url', 'date']);
        $this->load->model(['M_Client', 'M_Setting', 'M_Team', 'M_Service']);
        $this->data['values'] = $this->M_Setting->our_values();
    }

    public function about()
    {
        $this->data += [
            "title" => "Tentang",
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
            "title" => "Tim",
            'pages' => 'pages/v_team',
            'teams' => $this->M_Team->list(),
        ];

        $this->load->view('index', $this->data);
    }

    public function client()
    {
        $this->data += [
            "title" => "Klien",
            'pages' => 'pages/v_client',
            'teams' => $this->M_Team->list(),
        ];

        $this->load->view('index', $this->data);
    }
}
