<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function index()
    {
        // query nominal
        $sql = "SELECT nominal from tiket join pembayaran on tiket.id_pembayaran=pembayaran.id join pemesanan on tiket.id_pemesanan=pemesanan.id_pemesanan where id_user=5";
        $result = $this->db->query($sql)->row_array();
        $data['nominal'] = $result['nominal'];
        $data['title'] = "Halaman Pembayaran";
        $this->load->view('layout/header', $data);
        $this->load->view('pembayaran/pembayaran', $data);
        $this->load->view('layout/footer');
    }
    public function UploadBuktiPembayaran()
    {
        $data['title'] = "Halaman Pembayaran";
        $this->load->view('layout/header', $data);
        $this->load->view('pembayaran/buktiPembayaran');
        $this->load->view('layout/footer');
    }
    public function upload()
    {
        if (!$this->session->userdata('email')) {
            redirect('Auth');
        }
        $image = $_FILES['gambar'];
        // var_dump(APPPATH);
        // die;
        if ($image) {
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['upload_path']          = APPPATH . './images/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $img = $this->upload->data('file_name');
                // ambil id user
                $datauser = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $iduser = $datauser['id'];
                // ambil id pembayara berdasarkan id user
                $sqlpembayaran = "SELECT pembayaran.id from pembayaran join tiket on tiket.id_pembayaran=pembayaran.id join pemesanan on tiket.id_pemesanan=pemesanan.id_pemesanan where id_user=$iduser";
                // query data pembayaran
                $result = $this->db->query($sqlpembayaran)->row_array();
                $idpembayaran = $result['id'];
                $sql = "UPDATE `pembayaran` SET `gambar`='$img' WHERE id=$idpembayaran";
                $this->db->query($sql);
                $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                        Upload Berhasil!
                        </div>');
                redirect('Pembayaran/UploadBuktiPembayaran');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }
}
