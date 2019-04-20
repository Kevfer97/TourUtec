<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edificios_controller extends CI_Controller {
	public function index()
	{
		$this->load->view('_Layout/Header_Master');
		$this->load->view('Edificios');
		$this->load->view('_Layout/Footer_Master');
	}
}

