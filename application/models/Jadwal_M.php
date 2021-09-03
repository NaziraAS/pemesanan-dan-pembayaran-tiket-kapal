<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_M extends CI_Model
{
    public function add()
    {
        $data = [
            'tglBerangkat' => $this->input->post('tgl'),
            'asal' => $this->input->post('asal'),
            'tujuan' => $this->input->post('tujuan'),
            'harga' => $this->input->post('harga'),
            'jam' => $this->input->post('jam'),
            'kelas' => $this->input->post('kelas'),
            'jumlah' => $this->input->post('jumlah')
        ];
        $this->db->insert('jadwal', $data);
    }
    public function view()
    {
        return $this->db->get('jadwal')->result_array();
    }
    public function simpanUpdate($id)
    {
        $data = [
            'tglBerangkat' => $this->input->post('tglEdit'),
            'asal' => $this->input->post('asalEdit'),
            'tujuan' => $this->input->post('tujuanEdit'),
            'jam' => $this->input->post('jamEdit'),
            'kelas' => $this->input->post('kelasEdit'),
            'harga' => $this->input->post('hargaEdit'),
            'jumlah' => $this->input->post('jumlahEdit')
        ];
        $this->db->update('jadwal', $data, ['id' => $id]);
        return true;
    }
    public function uploadbukti($id_pemesanan)
    {
        $sql = "SELECT pemesanan.id_pemesanan,gambar from tiket 
        join pembayaran on tiket.id_pembayaran=pembayaran.id
        join pemesanan on tiket.id_pemesanan=pemesanan.id_pemesanan WHERE pemesanan.id_pemesanan=$id_pemesanan
        ";
        return $this->db->query($sql)->row_array();
    }
}
