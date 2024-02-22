<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
		date_default_timezone_set('Asia/Jakarta');
		// hari
		$tanggal = date('Y-m-d');
		$this->db->select('sum(total_harga) as total');
		$this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m-%d')", $tanggal);
		$hari_ini = $this->db->get()->row()->total;
		// transaksi
		$this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m-%d')", $tanggal);
		$transaksi = $this->db->count_all_results();
		// produk
		$produk = $this->db->from('produk')->count_all_results();
		// bulan
		$tanggal = date('Y-m');
		$this->db->select('sum(total_harga) as total');
		$this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
		$bulan_ini = $this->db->get()->row()->total;

		if ($bulan_ini==NULL) { $bulan_ini=0;}
		if ($hari_ini==NULL) { $hari_ini=0;}
		if ($transaksi==NULL) { $transaksi=0;}
		$data = array(
			'judul_halaman' => 'Charming Beauty | Dashboard',
			'hari_ini' => $hari_ini,
			'transaksi' => $transaksi,
			'bulan_ini' => $bulan_ini,
			'produk' => $produk,
		);
		$this->template->load('template', 'beranda', $data);
	}
}
