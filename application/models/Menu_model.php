<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function search()
    {
        $asal = $this->input->post('asal');
        $tujuan = $this->input->post('tujuan');
        $kelas = $this->input->post('kelas');
        $tanggal = $this->input->post('tanggal');
        // $jml = [
        //     'jumlah_pesaanan' => $this->input->post('jumlah')
        // ];
        // asal, tujuan, tglKeberangkatan, kelas, harga
        $sql = "SELECT * FROM jadwal
       WHERE asal LIKE ' %$asal% ' or tujuan LIKE '%$tujuan%' or kelas LIKE '%$kelas%' or tglBerangkat LIKE '%$tanggal%'";
        $result = $this->db->query($sql)->result_array();
        // $this->db->insert('pemesanan', $jml);
        if ($this->db->affected_rows($result) > 0) {
            return $result;
        } else {
            $data = [[
                'asal' => 'Data Not Found',
                'tujuan' => '',
                'tglKeberangkatan' => '',
                'kelas' => '',
                'harga' => '',
                'style' => 'h1'
            ]];
            return $result = $data;
        }
    }
    public function saveTiket($id, $dewasa, $anak)
    {
        // membuat kode pemesanan
        $userid = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $userid = $userid['id'];
        $asal = $this->input->post('asal');
        $asal = strtoupper($asal);
        $asalBaru = str_split($asal, 3)[0];
        $tujuan = $this->input->post('tujuan');
        $tujuan = strtoupper($tujuan);
        $tujuanBaru = str_split($tujuan, 3)[0];
        $tgl = date('dm');
        $kode = $tgl . $asalBaru . $tujuanBaru;
        $data = [
            'id_user' => $userid,
            'kode_pemesanan' => $kode,
            'tgl_pemesanan' => date('Y-m-d'),
            'dewasa' => $dewasa,
            'id_jadwal' => $id,
            'anak' => $anak

        ];
        $this->db->insert('pemesanan', $data);
    }
    public function listpemesanan()
    {
        $sql = "SELECT pemesanan.id_pemesanan,email, tgl_pemesanan from pemesanan join user on pemesanan.id_user=user.id";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function details($id)
    {
        $sql = "SELECT * from passenger join pemesanan on passenger.id_pemesanan=pemesanan.id_pemesanan where pemesanan.id_pemesanan=$id";
        return $this->db->query($sql)->result_array();
    }
    // cek gambar di dalam tabel pembayaran by id
    public function cekGambar()
    {
        $id = $this->input->post('id');
        // return $this->db->get_where('pembayaran', ['id', $this->input->post('icd')])->row_array();
        return $this->db->select('gambar')->from('tiket')
            ->join('pembayaran', 'tiket.id_pembayaran=pembayaran.id')
            ->join('pemesanan', 'tiket.id_pemesanan=pemesanan.id_pemesanan')
            ->where('id_pemesanan', $id)->get()->row_array();
    }
}
