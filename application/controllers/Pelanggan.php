<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
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
        $this->db->select('*')->from('pelanggan');
        $this->db->order_by('nama', 'ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Charming Beauty | Data Pelanggan',
            'user' => $user
        );
        $this->template->load('template', 'pelanggan_index', $data);
    }

    public function simpan()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
        );
        $this->db->insert('pelanggan', $data);
        $this->session->set_flashdata('notifikasi', '
            <div class="alert alert-primary alert-dismissible" role="alert">Pelanggan berhasil ditambahkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          ');
        redirect('pelanggan');
    }

    public function hapus($id_pelanggan)
    {
        $where = array('id_pelanggan' => $id_pelanggan);
        $this->db->delete('pelanggan', $where);
        $this->session->set_flashdata('notifikasi', '
                <div class="alert alert-primary alert-dismissible" role="alert"> Pelanggan berhasil dihapus
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> ');
        redirect('pelanggan');
    }

    public function edit($id_pelanggan)
    {
        $this->db->from('pelanggan')->where('id_pelanggan   ', $id_pelanggan);
        $user = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'Charming Beauty | Edit Data Pelanggan',
            'user' => $user
        );
        $this->template->load('template', 'pelanggan_edit', $data);
    }

    public function update()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
        );
        $where = array('id_pelanggan' => $this->input->post('id_pelanggan'));
        $this->db->update('pelanggan', $data, $where);
        $this->session->set_flashdata('notifikasi', '
                <div class="alert alert-primary alert-dismissible" role="alert"> Pelanggan berhasil diperbarui
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> ');
        redirect('pelanggan');
    }
}
