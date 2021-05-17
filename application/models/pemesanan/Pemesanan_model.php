<?php

use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan_model extends CI_Model
{
    public function search()
    {
        $data = [
            'tiket_id' => $this->input->post('id'),
            'jumlah' => $this->input->post('jumlah')
        ];
        return $data;
        // $this->db->insert('tiket_order', $data);
    }
    public function detailTiket()
    {
        $query = "SELECT asal, tujuan, tglBerangkat, kelas, jumlah_pesanan FROM pemesanan join jadwal on pemesanan.id_jadwal=jadwal.id WHERE pemesanan.id_jadwal=jadwal.id";
    }
    public function passenger()
    {
        if (isset($_POST['bayar'])) {
            $nama = $this->input->post('nama');
            $notelp = $this->input->post('noTelpon');
            $jenisKelamin = $this->input->post('jenisKelamin');
            $alamat = $this->input->post('alamat');
            $total = $this->input->post('total');
            $kode = "kode" . date('ymd');
            $tglBayar = date('Y-m-d h:i:sa');
            // id use from session
            $id = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $idpesan = $id['id'];
            $idpemesanan = $this->db->get_where('pemesanan', ['id_user' => $idpesan])->row_array();
            $idpemesananpesan = $idpemesanan['id_pemesanan'];
            for ($i = 0; $i < count($nama); $i++) {
                $query = "INSERT INTO `passenger`(`id`, `nama`, `alamat`, `no_telpon`, `jenis_kelamin`,`id_pemesanan`) VALUES ('','$nama[$i]','$alamat[$i]','$notelp[$i]','$jenisKelamin[$i]',$idpemesananpesan)";
                $this->db->query($query);
            }

            // insert data pembayaran
            $sql = "INSERT INTO `pembayaran`(`id`, `nomor_pembayaran`, `nominal`, `gambar`, `tgl_bayar`) VALUES ('','$kode','$total','','$tglBayar')";
            $this->db->query($sql);
            $idpembayaran = $this->db->get('pembayaran')->row_array();
            $idpembayaranbayar = $idpembayaran['id'];
            // insert id pembayaran dan pemsanan ke dalam tabel tiket
            $sqltiket = "INSERT INTO `tiket`(`id`, `id_pembayaran`, `id_pemesanan`) VALUES ('',$idpembayaranbayar,$idpemesananpesan)";
            $this->db->query($sqltiket);
        }
    }
    public function detailPesanTiket()
    {
        $id = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $id['id'];
        // $id_bidata = "SELECT id_biodata FROM pemesanan WHERE id_biodata=$id";
        $sql = "SELECT asal, tujuan,kelas,jumlah_pesanan,harga, tglBerangkat, harga FROM pemesanan join jadwal on pemesanan.id_jadwal=jadwal.id WHERE id_user=$id";
        $query = $this->db->query($sql);

        return $query->result_array();
    }
    public function jumlahPesanan()
    {
        $id = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $id['id'];
        $sql = "SELECT jumlah_pesanan FROM pemesanan join jadwal on pemesanan.id_jadwal=jadwal.id WHERE id_user=$id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
