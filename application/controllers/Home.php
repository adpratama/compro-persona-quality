<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('date');
		$this->load->model(array('M_Client'));
	}
	public function index()
	{
		$clients = $this->M_Client->list();
		$data = [
			"title" => "Home",
			'pages' => 'pages/v_home',
			'clients' => $clients,
		];
		$this->load->view('index', $data);
	}
}
