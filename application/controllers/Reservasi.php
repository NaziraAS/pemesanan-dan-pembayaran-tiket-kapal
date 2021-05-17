<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index($data)
    {
        var_dump($data);
        die;
        $data['title'] = "Halaman Reservasi";
        $this->load->view('layout/header', $data);
        $this->load->view('reservasi/reservasi');
        $this->load->view('layout_menu/footer');
    }
}
