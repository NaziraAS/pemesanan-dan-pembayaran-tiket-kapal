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
            // id user dari session
            $iduser = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['id'];
            // $idpemesanan = $this->db->get_where('pemesanan', ['id_user' => $iduser])->row_array();
            $idpemesanan = $this->db->select('id_pemesanan')->from('pemesanan')->where('id_user', $iduser)->order_by('id_pemesanan', 'DESC')->limit(1)->get()->row_array()['id_pemesanan'];
            for ($i = 0; $i < count($nama); $i++) {
                $query = "INSERT INTO `passenger`(`id`, `nama`, `alamat`, `no_telpon`, `jenis_kelamin`,`id_pemesanan`) VALUES ('','$nama[$i]','$alamat[$i]','$notelp[$i]','$jenisKelamin[$i]',$idpemesanan)";
                $this->db->query($query);
            }

            // insert data pembayaran
            $sql = "INSERT INTO `pembayaran`(`id`, `nomor_pembayaran`, `nominal`, `gambar`, `tgl_bayar`) VALUES ('','$kode','$total',null,'$tglBayar')";
            $this->db->query($sql);
            $idpembayaran = $this->db->select('id')->from('pembayaran')->order_by('id', 'DESC')->limit(1)->get()->row_array()['id'];
            // insert id pembayaran dan pemsanan ke dalam tabel tiket
            $sqltiket = "INSERT INTO `tiket`(`id`, `id_pembayaran`, `id_pemesanan`) VALUES ('',$idpembayaran,$idpemesanan)";
            $this->db->query($sqltiket);
        }
    }
    public function detailPesanTiket()
    {
        $id = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $id['id'];
        // $id_bidata = "SELECT id_biodata FROM pemesanan WHERE id_biodata=$id";
        $sql = "SELECT asal, jam,tujuan,kelas,dewasa,anak, tglBerangkat, harga FROM pemesanan join jadwal on pemesanan.id_jadwal=jadwal.id WHERE id_user=$id ORDER BY id_pemesanan DESC LIMIT 1";
        return $this->db->query($sql)->row_array();
    }
    public function jumlahPesanan()
    {
        $id = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $id['id'];
        $sql = "SELECT dewasa, anak FROM pemesanan join jadwal on pemesanan.id_jadwal=jadwal.id WHERE id_user=$id ORDER BY id_pemesanan DESC LIMIT 1";
        return $this->db->query($sql)->row_array();
    }
    // list pesanan pembayaran/listpesanan
    public function listpesanan($id)
    {
        $query = "SELECT pemesanan.id_pemesanan,tgl_pemesanan,nominal, asal, tujuan,anak,dewasa from tiket
        join pemesanan on tiket.id_pemesanan=pemesanan.id_pemesanan
        join pembayaran on tiket.id_pembayaran=pembayaran.id
        join jadwal on pemesanan.id_jadwal=jadwal.id where pemesanan.id_user=$id";
        return $this->db->query($query)->result_array();
    }
    // hapus pesanan model
    public function hapus($id)
    {
        // $idpemesanan = $this->db->get_where('pemesanan', ['id_pemesanan' => $id])->row_array()['id_pemesanan'];
        // hapus data dari table passenger berdasaran id pemesanan
        $this->db->delete('passenger', ['id_pemesanan' => $id]);
        // hapus data dari tabel pembayaran, tiket dan pemesanan
        // $query = "DELETE pembayaran.id, nomor_pembayaran,nominal,gambar,tgl_bayar FROM tiket
        // join pembayaran on tiket.id_pembayaran=pembayaran.id WHERE id_pemesanan=$id";
        $query = "DELETE pembayaran, tiket,pemesanan FROM tiket 
        join pembayaran on tiket.id_pembayaran=pembayaran.id 
        join pemesanan on tiket.id_pemesanan=pemesanan.id_pemesanan 
               WHERE pemesanan.id_pemesanan=$id";
        $this->db->query($query);
    }
}
