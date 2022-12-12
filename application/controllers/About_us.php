<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About_us extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'About';
		$this->load->view('src/header', $data);
		$this->load->view('about_us');
		$this->load->view('src/footer');
	}
}
