<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('level') !='Admin') {
            redirect('home');
        }
    }
	
	public function index() {
        $this->db->select('*')->from('user');
        $this->db->order_by('nama', 'DESC');
        $user = $this->db->get()->result_array();
        $data = array (
            'judul_halaman' => 'Charming Beauty | Data Pengguna',
            'user'          => $user
        );
		$this->template->load('template','pengguna_index', $data);
	}

    public function simpan() {
        $this->db->from('user')->where('username', $this->input->post('username'));
        $cek = $this->db->get()->result_array();
        if($cek==NULL){
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'nama' => $this->input->post('nama'),
                'level' => $this->input->post('level'),
            );
            $this->db->insert('user', $data);
            $this->session->set_flashdata('notifikasi', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Pengguna berhasil ditambahkan!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
        } else {
            $this->session->set_flashdata('notifikasi', '
            <div class="alert alert-danger alert-dismissible" role="alert">
            Username sudah digunakan!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
        }
        
        redirect('pengguna');
    }

    public function hapus($id_user) {
        $where = array( 'id_user' => $id_user);
        $this->db->delete('user', $where);
        $this->session->set_flashdata('notifikasi', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Pengguna berhasil dihapus!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('pengguna');
    }

    public function edit($id_user) {
        $this->db->from('user')->where('id_user', $id_user);
        $user = $this->db->get()->row();
        $data = array (
            'judul_halaman' => 'Charming Beauty  | Edit Data Pengguna',
            'user'          => $user
        );
		$this->template->load('template','pengguna_edit', $data);
    }

    public function update() {
        $data = array(
            'nama' => $this->input->post('nama'),
            'level' => $this->input->post('level'),
        );
        $where = array( 'id_user' => $this->input->post('id_user'));
        $this->db->update('user', $data,$where);
        $this->session->set_flashdata('notifikasi', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Pengguna berhasil diupdate!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('pengguna');
    }

    public function reset($id_user) {
        $data = array(
            'password' => md5('1234'),
        );
        $where = array( 'id_user' => $id_user);
        $this->db->update('user', $data,$where);
        $this->session->set_flashdata('notifikasi', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Password direset menjadi 1234!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('pengguna');
    }
}