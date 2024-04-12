<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{		
		$this->load->view('template/header',['judul'=>"home"]);
		$this->load->view('template/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('template/footer');
	}
	
	public function login(){
		$this->load->view('admin/login');
		
	}
	
	public function pengiriman(){
		$this->load->view('template/header',['judul'=>"pengiriman"]);
		$this->load->view('template/sidebar');
		$this->load->view('admin/pengiriman');
		$this->load->view('template/footer');
	}
}
