<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
			"title" => "Home",
			'pages' => 'pages/v_home',
			'clients' => $this->M_Client->list(),
			'tentang' => $this->M_Setting->setting('tentang'),
			'alamat' => $this->M_Setting->setting('alamat'),
			'telepon' => $this->M_Setting->setting('telepon'),
			'values' => $this->M_Setting->our_values(),
			'teams' => $this->M_Team->list(),
		];

		$this->load->view('index', $data);
	}
}
