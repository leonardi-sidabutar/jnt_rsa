<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Enkripsi_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Function Get All Data
    public function getAllData()
    {
        // Query untuk mengambil semua data dari tabel
        $query = $this->db->get('enkripsi_pengiriman');
        // Mengembalikan hasil query dalam bentuk array
        return $query->result_array();
    }

    // Function Insert Data
    public function insertData($data)
    {
        // Masukkan data ke dalam tabel database
        $this->db->insert('enkripsi_pengiriman', $data);
    }
    public function kosongkan()
    {
        $this->db->truncate('enkripsi_pengiriman');
    }
    public function hitungtotal()
    {
        $query = $this->db->get('enkripsi_pengiriman');
        return $query->num_rows();
    }
}
