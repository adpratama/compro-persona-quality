<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('date');
		$this->load->model(array('M_Client', 'M_Setting', 'M_Team', 'M_Article'));
	}

	public function index()
	{
		$data = [
			"title" => "Beranda",
			'pages' => 'pages/v_home',
			'clients' => $this->M_Client->list(),
			'tentang' => $this->M_Setting->setting('tentang'),
			'values' => $this->M_Setting->our_values(),
			'teams' => $this->M_Team->list(),
			'articles' => $this->M_Article->list_limit('3', '0'),
		];

		$this->load->view('index', $data);
	}

	public function contact()
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
