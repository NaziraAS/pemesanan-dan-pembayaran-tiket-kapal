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
            'kelas' => $this->input->post('kelas')
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
            'kelas' => $this->input->post('kelasEdit'),
            'harga' => $this->input->post('hargaEdit'),
        ];
        $this->db->update('jadwal', $data, ['id' => $id]);
        return true;
    }
}
