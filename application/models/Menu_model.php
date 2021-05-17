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
    public function saveTiket($jumlah)
    {
        // membuat kode pemesanan
        $id = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $id['id'];
        $asal = $this->input->post('asal');
        $asal = strtoupper($asal);
        $asalBaru = str_split($asal, 3)[0];
        $tujuan = $this->input->post('tujuan');
        $tujuan = strtoupper($tujuan);
        $tujuanBaru = str_split($tujuan, 3)[0];
        $tgl = date('dm');
        $kode = $tgl . $asalBaru . $tujuanBaru;
        $data = [
            'tgl_pemesanan' => date('Y-m-d'),
            'kode_pemesanan' => $kode,
            'jumlah_pesanan' => $jumlah,
            'id_jadwal' => (int)$_POST['id'],
            'id_user' => $id

        ];
        $result = $this->db->insert('pemesanan', $data);
        if ($this->db->affected_rows($result) == 1) {
            return true;
        }
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
}
