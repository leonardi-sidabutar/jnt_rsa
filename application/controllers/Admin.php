<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('template/footer');
	}
	
	public function login(){
		$this->load->view('admin/login');
		
	}
	public function tes(){
		$this->load->view('admin/tes');
	}
}