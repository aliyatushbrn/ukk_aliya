<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        }
    }

    public function index()
    {
        // Ambil bulan dari parameter GET jika ada
        $bulan = $this->input->get('bulan');

        // Jika bulan tidak kosong, lakukan filter data berdasarkan bulan yang dipilih
        if (!empty($bulan)) {
            // Ubah format bulan menjadi Y-m untuk pencarian data penjualan
            $bulan = date('Y-m', strtotime($bulan));

            // Query untuk mendapatkan data penjualan berdasarkan bulan yang dipilih
            $this->db->select('penjualan.*, pelanggan.nama AS nama_pelanggan');
            $this->db->from('penjualan');
            $this->db->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan', 'left');
            $this->db->where("DATE_FORMAT(tanggal, '%Y-%m')", $bulan);
            $penjualan = $this->db->get()->result_array();
        } else {
            // Jika bulan kosong, ambil semua data penjualan
            $this->db->select('penjualan.*, pelanggan.nama AS nama_pelanggan');
            $this->db->from('penjualan');
            $this->db->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan', 'left');
            $penjualan = $this->db->get()->result_array();
        }

        // Data untuk dikirimkan ke view
        $data = array(
            'judul_halaman' => 'Charming Beauty | Laporan Penjualan',
            'penjualan' => $penjualan,
        );

        // Load view dengan data yang diperlukan
        $this->template->load('template', 'laporan_penjualan', $data);
    }


}