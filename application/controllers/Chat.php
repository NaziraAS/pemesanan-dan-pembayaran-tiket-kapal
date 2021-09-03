<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Chat/Pesan');
    }
    public function index()
    {
        $this->form_validation->set_rules('chat', 'Kotak pesan', 'required', [
            'required' => 'Kotak pesan tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman chat';
            $data['id'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('layout/header', $data);
            $this->load->view('chat/chat', $data);
            $this->load->view('layout/footer');
        } else {
            $data = $this->Pesan->savePesan();
            redirect('Chat');
        }
    }
    public function chatsave()
    {
        $this->Pesan->savepesan();
    }
    public function getPesan()
    {
        echo json_encode($this->Pesan->getPesan());
    }
    public function getPesanAll()
    {
        echo json_encode($this->Pesan->getPesanAll());
    }
}
