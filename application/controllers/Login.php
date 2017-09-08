<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('header_view');
		$this->load->view('navbar_view');
		$this->load->view('login_view');
		$this->load->view('footer_view');
	}
}
