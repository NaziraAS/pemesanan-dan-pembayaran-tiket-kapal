<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pemesanan/Pemesanan_model', 'pemesanan');
    }
    public function index()
    {
        $data['detail'] = $this->pemesanan->detailPesanTiket();
        // var_dump($data['detail']);
        // die;
        $dewasa = $this->pemesanan->jumlahPesanan()['dewasa'];
        $anak = $this->pemesanan->jumlahPesanan()['anak'];
        $data['dewasa'] = $dewasa;
        $data['anak'] = $anak;
        $data['jumlah'] = (int)$dewasa + (int)$anak;
        $data['title'] = "Halaman Pemesanan";
        $this->load->view('layout/header', $data);
        $this->load->view('menu/pemesanan', $data);
        $this->load->view('layout/footer');
        $this->pemesanan->passenger();
    }
    public function simpan()
    {
        $this->pemesanan->passenger();
        redirect('Pembayaran');
    }
    public function listpesanan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['id'];
        $data['list'] = $this->pemesanan->listpesanan($id);
        $data['title'] = "List pesanan";
        $this->load->view('layout/header', $data);
        $this->load->view('menu/listpesanan', $data);
        $this->load->view('layout/footer');
    }
    // hapus pesanan
    public function hapus($id)
    {
        $this->pemesanan->hapus($id);
        $this->session->set_flashdata('message', 'hapus');
        redirect('Pemesanan/listpesanan');
    }
}
