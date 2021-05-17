<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/M_User', 'user');
    }
    // method login as index()
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('Admin');
        }
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Login";
            $this->load->view('layout/header', $data);
            $this->load->view('user/login');
            $this->load->view('layout_menu/footer');
        } else {
            $this->user->dataLogin();
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('namalengkap', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'e-mail', 'required|valid_email', [
            'required' => 'field di atas tidak boleh kosong',
            'valid_email' => 'email yang anda masukkan tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[password2]', [
            'matches' => 'password tidak sama',
            'required' => 'password harus di isi!',
            'min_length' => 'panjang password minimal 8 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|min_length[8]|matches[password]', [
            'matches' => 'password tidak sama',
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Register";
            $this->load->view('layout_menu/header', $data);
            $this->load->view('user/register');
            $this->load->view('layout_menu/footer');
        } else {
            $this->user->dataRegister();
            redirect('Auth');
        }
    }
    public function logout()
    {
        unset($_SESSION['email']);
        $this->session->unset_userdata('email');
        redirect('Auth');
    }
}
