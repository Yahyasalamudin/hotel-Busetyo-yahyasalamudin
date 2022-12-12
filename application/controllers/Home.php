<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Home';
		$this->load->view('src/header', $data);
		$this->load->view('home');
		$this->load->view('src/footer');
	}
}
