<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'menu');
    }
    // halaman utama
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
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
            // jumlah penumpang yang di inputkan oleh user
            $dewasa = $_POST['dewasa'];
            $anak = $_POST['anak'];
            // jalankan method daftar redirect ke controller reservasi
            $this->daftar($dewasa, $anak);
        }
    }
    public function daftar($dewasa, $anak)
    {
        $data['dewasa'] = $dewasa;
        $data['anak'] = $anak;
        $data['data'] = $this->menu->search();
        $data['title'] = "Halaman Reservasi";
        $this->load->view('layout/header', $data);
        $this->load->view('reservasi/reservasi', $data);
        $this->load->view('layout_menu/footer');
    }
    public function pesan($id, $dewasa, $anak)
    {
        if ($this->session->userdata('email')) {
            $this->menu->saveTiket($id, $dewasa, $anak);
            redirect('Pemesanan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Mohon untuk login dahulu!
            </div>');
            redirect('Auth');
        }
    }
}
