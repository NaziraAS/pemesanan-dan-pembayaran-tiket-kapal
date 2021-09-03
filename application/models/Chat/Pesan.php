<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Model
{
    protected $tabel = "chat";
    public function savepesan()
    {
        $data = [
            'pesan' => $this->input->post('message'),
            'tgl' => time(),
            'id_user' => $this->input->post('id')
        ];
        $this->db->insert($this->tabel, $data);
        // return $this->db->get_where('chat', ['id_user' => $this->input->post('id')])->result_array();
    }
    public function getPesan()
    {
        $id = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // return $this->db->get_where('chat', ['id_user' => $id['id']])->result_array();
        $data = "SELECT * FROM `chat` ORDER BY id DESC LIMIT 1";
        return $this->db->query($data)->result_array();
    }
    public function getPesanAll()
    {
        $id = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        return $this->db->get_where('chat', ['id_user' => $id['id']])->result_array();
    }
}
