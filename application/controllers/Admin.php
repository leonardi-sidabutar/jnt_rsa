<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Menggunakan Vendor PHPSpreadSheet
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class Admin extends CI_Controller
{

	// Construct untuk memastikan ada user yang login
	public function __construct()
	{
		parent::__construct();
		// Jika tidak ada user yang berhasil login, kembalikan ke halaman login
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}
		// Load Model
		$this->load->model('Admin_model');
		$this->load->model('Enkripsi_model');
		$this->load->model('Dekripsi_model');
	}

	public function index()
	{
		$data['login'] = $this->db->get_where('tbl_login', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'home';

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('template/footer');
	}


	public function pengiriman()
	{
		$data['login'] = $this->db->get_where('tbl_login', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'pengiriman';
		// Memanggil metode getAllData dari model Example_model untuk mendapatkan semua data
		$data['pengiriman'] = $this->Admin_model->getAllData();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/pengiriman', $data);
		$this->load->view('template/footer');
	}


	public function enkripsi()
	{
		$data['login'] = $this->db->get_where('tbl_login', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Enkripsi';
		$data['pengiriman'] = $this->Admin_model->getAllData();
		$data['total'] = $this->Enkripsi_model->hitungtotal();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/enkripsi');
		$this->load->view('template/footer');
	}


	public function import_data()
	{
		// Memeriksa apakah file diunggah
		if ($_FILES['excel_file']['name']) {
			$filePath = $_FILES['excel_file']['tmp_name'];

			// Load file Excel menggunakan PhpSpreadsheet
			$spreadsheet = IOFactory::load($filePath);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();

			// Memproses data
			foreach ($sheetData as $key => $row) {
				if ($key > 0) { //Mulai dari baris ke-2 exce
					$data_to_insert = array(
						'tanggal_pengiriman' => date("Y-m-d", strtotime($row['0'])),
						'kode_waybill' => $row['1'],
						'nama_pelanggan' => $row['2'],
						'outlet_pengiriman' => $row['3'],
						'outlet_tujuan' => $row['4'],
						'jumlah_paket' => (int)$row['5'],
						'metode_penyelesaian' => $row['6'],
						'volume_berat_paket' => (int)$row['7'],
						'biaya_kirim' => (int)$row['8'],
						'status_resi' => $row['9'],
					);
					// Masukkan data ke dalam database
					$this->Admin_model->insertData($data_to_insert);
				}
			}
			// Jika Berhasil Import
			$this->session->set_flashdata('message', '
				<div class="alert alert-success alert-dismissible text-white" role="alert">
					<span class="text-sm"><a href="javascript:;" class="alert-link text-white">Info!</a> Data Berhasil DiImport</span>
					<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
			');
			redirect('admin/pengiriman');
		} else {
			// Jika Gagal Import
			$this->session->set_flashdata('message', '
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

	public function delete($id)
	{
		$delete_row = $this->Admin_model->deleteData($id);

		if ($delete_row > 0) {
			// Jika Berhasil Hapus Data
			$this->session->set_flashdata('message', '
				<div class="alert alert-info alert-dismissible text-white" role="alert">
					<span class="text-sm"><a href="javascript:;" class="alert-link text-white">Info!</a> Data Berhasil diHapus</span>
					<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
			');
			redirect('admin/pengiriman');
		} else {
			echo "Gagal Delete Row Data";
		}
	}

	public function form_pengiriman($id)
	{
		$data['login'] = $this->db->get_where('tbl_login', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Form Pengiriman';
		$data['row'] = $this->Admin_model->selectData($id);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/form_pengiriman', $data);
		$this->load->view('template/footer');
	}

	public function update()
	{
		$data_to_update = array(
			'tanggal_pengiriman' => date("Y-m-d", strtotime($_POST['date'])),
			'kode_waybill' => $_POST['waybill'],
			'nama_pelanggan' => $_POST['nama'],
			'outlet_pengiriman' => $_POST['outlet_pengiriman'],
			'outlet_tujuan' => $_POST['outlet_tujuan'],
			'jumlah_paket' => (int)$_POST['jumlah_paket'],
			'metode_penyelesaian' => $_POST['metode_penyelesaian'],
			'volume_berat_paket' => (int)$_POST['volume_berat'],
			'biaya_kirim' => (int)$_POST['biaya'],
			'status_resi' => $_POST['status'],
		);
		$this->db->where('id', $_POST['id']);
		$update = $this->db->update('tbl_pengiriman_barang', $data_to_update);

		if ($update) {
			// Jika Berhasil Hapus Data
			$this->session->set_flashdata('message', '
				<div class="alert alert-info alert-dismissible text-white" role="alert">
					<span class="text-sm"><a href="javascript:;" class="alert-link text-white">Info!</a> Data Berhasil Diubah</span>
					<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
			');
		} else {
			// Jika Berhasil Hapus Data
			$this->session->set_flashdata('message', '
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

	public function select($id)
	{
		$select = $this->db->get_where('tbl_pengiriman_barang', array('id' => $id))->row_array();
		var_dump($select);
	}

	public function enkripsi_proses()
	{
		$kuncip = $_POST['p'];
		$kunciq = $_POST['q'];
		$rsa = new RsaDep($kuncip, $kunciq);
		$databaru =  $this->Admin_model->getAllData();
		$this->Enkripsi_model->kosongkan();
		foreach ($databaru as $row) {
			$data_insert = array(
				'tanggal_pengiriman' => $rsa->enkripsi($row['tanggal_pengiriman']),
				'kode_waybill' => $rsa->enkripsi($row['kode_waybill']),
				'nama_pelanggan' => $rsa->enkripsi($row['nama_pelanggan']),
				'outlet_pengiriman' => $rsa->enkripsi($row['outlet_pengiriman']),
				'outlet_tujuan' => $rsa->enkripsi($row['outlet_tujuan']),
				'jumlah_paket' => $rsa->enkripsi($row['jumlah_paket']),
				'metode_penyelesaian' => $rsa->enkripsi($row['metode_penyelesaian']),
				'volume_berat_paket' => $rsa->enkripsi($row['volume_berat_paket']),
				'biaya_kirim' => $rsa->enkripsi($row['biaya_kirim']),
				'status_resi' => $rsa->enkripsi($row['status_resi']),
			);
			$this->Enkripsi_model->insertData($data_insert);
		}
		redirect('admin/hasilenkripsi');
	}

	public function hasilenkripsi()
	{
		$data['login'] = $this->db->get_where('tbl_login', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Enkripsi';
		$data['pengiriman'] = $this->Enkripsi_model->getAllData();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/hasilenkripsi');
		$this->load->view('template/footer');
	}

	public function dekripsi()
	{
		$data['login'] = $this->db->get_where('tbl_login', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Dekripsi';
		$data['pengiriman'] = $this->Enkripsi_model->getAllData();
		$data['total'] = $this->Dekripsi_model->hitungtotal();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/dekripsi');
		$this->load->view('template/footer');
	}

	public function dekripsi_proses()
	{
		$kuncip = $_POST['p'];
		$kunciq = $_POST['q'];
		$rsa = new RsaDep($kuncip, $kunciq);
		$databaruu =  $this->Enkripsi_model->getAllData();
		$this->Dekripsi_model->kosongkan();
		foreach ($databaruu as $roww) {
			$data_insert = array(
				'tanggal_pengiriman' => $rsa->dekripsi($roww['tanggal_pengiriman']),
				'kode_waybill' => $rsa->dekripsi($roww['kode_waybill']),
				'nama_pelanggan' => $rsa->dekripsi($roww['nama_pelanggan']),
				'outlet_pengiriman' => $rsa->dekripsi($roww['outlet_pengiriman']),
				'outlet_tujuan' => $rsa->dekripsi($roww['outlet_tujuan']),
				'jumlah_paket' => $rsa->dekripsi($roww['jumlah_paket']),
				'metode_penyelesaian' => $rsa->dekripsi($roww['metode_penyelesaian']),
				'volume_berat_paket' => $rsa->dekripsi($roww['volume_berat_paket']),
				'biaya_kirim' => $rsa->dekripsi($roww['biaya_kirim']),
				'status_resi' => $rsa->dekripsi($roww['status_resi']),
			);
			$this->Dekripsi_model->insertData($data_insert);
		}
		redirect('admin/hasildekripsi');
	}

	public function hasildekripsi()
	{
		$data['login'] = $this->db->get_where('tbl_login', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Dekripsi';
		$data['pengiriman'] = $this->Dekripsi_model->getAllData();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/hasildekripsi');
		$this->load->view('template/footer');
	}

	public function deleteenkripsi()
	{
		$this->Enkripsi_model->kosongkan();
		redirect('admin/enkripsi');
	}

	public function deletedekripsi()
	{
		$this->Dekripsi_model->kosongkan();
		redirect('admin/dekripsi');
	}
	public function eksporexcel()
	{
		$data['pengiriman'] = $this->Admin_model->getAllData();
		$this->load->view('admin/export',$data);
	}
}
