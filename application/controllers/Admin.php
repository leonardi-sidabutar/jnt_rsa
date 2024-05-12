<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Menggunakan Vendor PHPSpreadSheet
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

class Admin extends CI_Controller {

	// Construct untuk memastikan ada user yang login
	public function __construct(){
		parent::__construct();
		// Jika tidak ada user yang berhasil login, kembalikan ke halaman login
		if(!$this->session->userdata('username')){
			redirect('auth');
		}
		// Load Model
		$this->load->model('Admin_model');
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
		// Memanggil metode getAllData dari model Example_model untuk mendapatkan semua data
		$data['pengiriman'] = $this->Admin_model->getAllData();

		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/pengiriman',$data);
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


	public function import_data() {
        // Memeriksa apakah file diunggah
        if ($_FILES['excel_file']['name']) {
            $filePath = $_FILES['excel_file']['tmp_name'];

            // Load file Excel menggunakan PhpSpreadsheet
            $spreadsheet = IOFactory::load($filePath);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            // Memproses data
            foreach ($sheetData as $key=>$row) {
				if($key > 0){ //Mulai dari baris ke-2 exce
					$data_to_insert = array(
						'tanggal_pengiriman'=>date("Y-m-d", strtotime($row['0'])),
						'kode_waybill'=>$row['1'],
						'nama_pelanggan'=>$row['2'],
						'outlet_pengiriman'=>$row['3'],
						'outlet_tujuan'=>$row['4'],
						'jumlah_paket'=>(int)$row['5'],
						'metode_penyelesaian'=>$row['6'],
						'volume_berat_paket'=>(int)$row['7'],
						'biaya_kirim'=>(int)$row['8'],
						'status_resi'=>$row['9'],
					);
					// Masukkan data ke dalam database
					$this->Admin_model->insertData($data_to_insert);
				}
            }
			// Jika Berhasil Import
			$this->session->set_flashdata('message','
				<div class="alert alert-success alert-dismissible text-white" role="alert">
					<span class="text-sm"><a href="javascript:;" class="alert-link text-white">Info!</a> Data Berhasil DiImport</span>
					<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
			');
			redirect('admin/pengiriman');
        }else{
			// Jika Gagal Import
			$this->session->set_flashdata('message','
				<div class="alert alert-warning alert-dismissible text-white" role="alert">
					<span class="text-sm"><a href="javascript:;" class="alert-link text-white">Warning!</a> Data Gagal DiImport</span>
					<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
			');
			redirect('admin/pengiriman');
		}
    }

	public function delete($id){
		$delete_row = $this->Admin_model->deleteData($id);

		if($delete_row > 0){
			// Jika Berhasil Hapus Data
			$this->session->set_flashdata('message','
				<div class="alert alert-info alert-dismissible text-white" role="alert">
					<span class="text-sm"><a href="javascript:;" class="alert-link text-white">Info!</a> Data Berhasil diHapus</span>
					<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
			');
			redirect('admin/pengiriman');
		}else{
			echo "Gagal Delete Row Data";
		}
	}

	public function form_pengiriman($id){
		$data['login'] = $this->db->get_where('tbl_login', ['username'=>$this->session->userdata('username')])->row_array();
		$data['judul'] = 'Form Pengiriman';
		$data['row'] = $this->Admin_model->selectData($id);
		
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/form_pengiriman',$data);
		$this->load->view('template/footer');		
	}

	public function update(){
		$data_to_update = array(
			'tanggal_pengiriman'=>date("Y-m-d", strtotime($_POST['date'])),
			'kode_waybill'=>$_POST['waybill'],
			'nama_pelanggan'=>$_POST['nama'],
			'outlet_pengiriman'=>$_POST['outlet_pengiriman'],
			'outlet_tujuan'=>$_POST['outlet_tujuan'],
			'jumlah_paket'=>(int)$_POST['jumlah_paket'],
			'metode_penyelesaian'=>$_POST['metode_penyelesaian'],
			'volume_berat_paket'=>(int)$_POST['volume_berat'],
			'biaya_kirim'=>(int)$_POST['biaya'],
			'status_resi'=>$_POST['status'],
		);
		$this->db->where('id',$_POST['id']);
		$update = $this->db->update('tbl_pengiriman_barang',$data_to_update);

		if($update){
			// Jika Berhasil Hapus Data
			$this->session->set_flashdata('message','
				<div class="alert alert-info alert-dismissible text-white" role="alert">
					<span class="text-sm"><a href="javascript:;" class="alert-link text-white">Info!</a> Data Berhasil Diubah</span>
					<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
			');
		}else{
			// Jika Berhasil Hapus Data
			$this->session->set_flashdata('message','
				<div class="alert alert-danger alert-dismissible text-white" role="alert">
					<span class="text-sm"><a href="javascript:;" class="alert-link text-white">Info!</a> Data Gagal Diubah</span>
					<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
			');
		}
		redirect('admin/pengiriman');
	}

	public function select($id){
		$select = $this->db->get_where('tbl_pengiriman_barang', array('id' => $id))->row_array();
		var_dump($select);
	}

}