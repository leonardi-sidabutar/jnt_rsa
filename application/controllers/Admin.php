<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	// Construct untuk memastikan ada user yang login
	public function __construct(){
		parent::__construct();
		// Jika tidak ada user yang berhasil login, kembalikan ke halaman login
		if(!$this->session->userdata('username')){
			redirect('auth');
		}
	}

	public function index()
	{
		$data['login'] = $this->db->get_where('tbl_login', ['username'=>$this->session->userdata('username')])->row_array();
		$data['judul'] = 'home';
		
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('template/footer');
	}
	
	
	public function pengiriman(){
		$data['login'] = $this->db->get_where('tbl_login', ['username'=>$this->session->userdata('username')])->row_array();
		$data['judul'] = 'pengiriman';

		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/pengiriman');
		$this->load->view('template/footer');
	}


	public function enkripsi(){
		$data['login'] = $this->db->get_where('tbl_login', ['username'=>$this->session->userdata('username')])->row_array();
		$data['judul'] = 'Enkripsi';

		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/enkripsi');
		$this->load->view('template/footer');
	}



}
