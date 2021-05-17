<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'menu');
    }
    public function index()
    {
        $this->form_validation->set_rules('asal', 'Asal', 'required|trim', [
            'required' => 'Kolom Asal Harus Di Isi!'
        ]);
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim', [
            'required' => 'Kolom Tujuan Harus Di Isi!'
        ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => 'Kolom Kelas Harus Di Isi!'
        ]);
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim', [
            'required' => 'Kolom Tanggal Harus Di Isi!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Halaman Menu";
            $this->load->view('layout_menu/header', $data);
            $this->load->view('menu/V_Menu', $data);
            $this->load->view('layout_menu/footer');
        } else {
            $data = $_POST['jumlah'];
            $this->daftar($data);
        }
    }
    public function daftar($jumlah)
    {
        $data['jumlah'] = $jumlah;
        $data['data'] = $this->menu->search();
        $data['title'] = "Halaman Reservasi";
        $this->load->view('layout/header', $data);
        $this->load->view('reservasi/reservasi', $data);
        $this->load->view('layout_menu/footer');
    }
    public function pesan($jumlah)
    {
        if ($this->session->userdata('email')) {
            $this->menu->saveTiket($jumlah);
            redirect('Pemesanan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Mohon untuk login dahulu!
            </div>');
            redirect('Auth');
        }
    }
}
