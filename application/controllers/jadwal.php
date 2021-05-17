<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('tanggalKeberangkatan', 'tanggal keberangkatan', 'required');
        $this->form_validation->set_rules('asal', 'Asal', 'required');
        if ($this->form_validation->run() == false) {
        }
    }
    public function update()
    {
    }
    public function read()
    {
    }
    public function delete()
    {
    }
}
