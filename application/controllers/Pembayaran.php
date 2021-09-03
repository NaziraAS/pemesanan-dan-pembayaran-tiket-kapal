<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pemesanan/Pemesanan_model', 'pemesanan');
        $this->load->model('Pembayaran_model', 'pembayaran');
    }
    public function index()
    {
        $data['nominal'] = $this->pembayaran->getPembayaran();
        $data['title'] = "Halaman Pembayaran";
        $this->load->view('layout/header', $data);
        $this->load->view('pembayaran/pembayaran', $data);
        $this->load->view('layout/footer');
    }
    public function UploadBuktiPembayaran($id = 0)
    {
        // id pemesanan
        $data['id'] = $id;
        $data['title'] = "Halaman Pembayaran";
        $this->load->view('layout/header', $data);
        $this->load->view('pembayaran/buktiPembayaran', $data);
        $this->load->view('layout/footer');
    }
    public function upload($id)
    {
        if (!$this->session->userdata('email')) {
            redirect('Auth');
        }
        $image = $_FILES['gambar'];
        // var_dump(APPPATH);
        // die;
        if ($image) {
            $config['upload_path']          = './sources/images/';
            $config['allowed_types']        = 'jpg|png|PNG|JPG|JPEG|jpeg';
            $config['max_size']             = 2048;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $img = $this->upload->data('file_name');
                $query = "UPDATE pembayaran join tiket on pembayaran.id=tiket.id_pembayaran
                            join pemesanan on tiket.id_pemesanan=pemesanan.id_pemesanan set gambar='$img'
                            WHERE pemesanan.id_pemesanan=$id";
                $this->db->query($query);
                $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                        Upload Berhasil!
                        </div>');
                redirect('Pembayaran/UploadBuktiPembayaran');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }
    public function clearPemesanan($id)
    {
        // $idpemesanan = $_GET['idpemesanan'];
        $this->db->delete('pemesanan', ['id_pemesanan' => $id]);
        // $query = "DELETE FROM pembayaran JOIN pemesanan on id_pemesanan.tiket=id_pemesanan.pemesanan join pembayaran on id_pembayaran.tiket=id_pembayaran.pembayaran WHERE id_pemesanan=$idpemesanan";
    }
}
