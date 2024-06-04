<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){

		// Rules Validation
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');

		if($this->form_validation->run() == false){
			$this->load->view('admin/login');
		}else{
			$this->_login();
		}
	}

	private function _login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Query User
		$login = $this->db->get_where('tbl_login', ['username'=>$username])->row_array();

		// Check Data Login (Terdaftar / Tidak di dalam database)
		if($login){
			// Jika Terdaftar (Ada)
			// Check Password
			if(password_verify($password, $login['password']))
			{
				// Jika Password Benar
				$data = [
					'username'=>$login['username'],
					'role'=>'Admin'
				];
				$this->session->set_userdata($data);
				redirect('admin');
			}else{
				// Jika Password Salah
				$this->session->set_flashdata('message','
					<div class="alert alert-danger alert-dismissible text-white" role="alert">
						<span class="text-sm"><a href="javascript:;" class="alert-link text-white">Peringatan!</a> Password Salah</span>
						<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
				');
			redirect('auth');
			}
		}else{
			// Jika Tidak Terdaftar (Tidak Ada)
			$this->session->set_flashdata('message','
				<div class="alert alert-danger alert-dismissible text-white" role="alert">
					<span class="text-sm"><a href="javascript:;" class="alert-link text-white">Peringatan!</a> Username Tidak terdaftar</span>
					<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
			');
			redirect('auth');
		}

		var_dump($login);
		die;
	}
	
	public function regist(){

		// Rules Validation
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');

		if($this->form_validation->run() == false){
			$this->load->view('admin/login');
		}else{

			$data = [
				'username'=>$this->input->post('username'),
				'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'role'=>'Admin'
			];
			redirect('admin');
		}

		// $data = [
		// 	"username"=>'desmi',
		// 	"password"=>password_hash("desmi123",PASSWORD_DEFAULT)
		// ];

		// $this->db->insert('tbl_login', $data);
	}

	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');

		// Flash
		$this->session->set_flashdata('message','
			<div class="alert alert-success alert-dismissible text-white" role="alert">
				<span class="text-sm">Anda Telah <a href="javascript:;" class="alert-link text-white">Logout!</a></span>
				<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
		');
		redirect('auth');
	}
}