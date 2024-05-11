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
		$data['pengiriman'] = $this->Admin_model->getAllData();

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
			redirect('admin/pengiriman');
        }
    }

}