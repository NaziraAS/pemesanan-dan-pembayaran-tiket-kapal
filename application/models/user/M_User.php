<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{

    public $title;
    public $content;
    public $date;

    public function get_data()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }
    public function dataRegister()
    {
        $data = [
            'namalengkap' => htmlspecialchars($this->input->post('namalengkap')),
            'email' => htmlspecialchars($this->input->post('email')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'level' => "user"
        ];
        $this->db->insert('user', $data);
    }
    public function dataLogin()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = $this->input->post('password');
        $data = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($data) {
            if ($data['level'] == 'admin') {

                if (password_verify($password, $data['password'])) {
                    $data = [
                        'email' => $data['email']
                    ];
                    $this->session->set_userdata($data);
                    redirect('Admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Anda Salah
                    </div>');
                    redirect('Auth');
                }
            } elseif ($data['level'] == 'user') {
                if (password_verify($password, $data['password'])) {
                    $data = [
                        'email' => $data['email']
                    ];
                    $this->session->set_userdata($data);
                    redirect('Menu');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Password Anda Salah
                        </div>');
                    redirect('Auth');
                }
            }
        }
    }
}
