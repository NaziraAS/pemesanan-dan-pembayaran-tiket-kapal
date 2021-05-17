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
        $id = $this->pemesanan->jumlahPesanan()[0]['jumlah_pesanan'];
        $data['jumlah'] = (int)$id;
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
}
