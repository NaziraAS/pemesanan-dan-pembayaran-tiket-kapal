<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_M');
        $this->load->model('Menu_model');
    }
    public function index()
    {
        if ($this->session->userdata('email') == false) {
            redirect('Auth');
        }
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jadwal'] = $this->Jadwal_M->view();
        $data['user'] = $user['namalengkap'];
        $data['title'] = "Halaman Admin";
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar', $data);
        $this->load->view('admin/V_Admin', $data);
        $this->load->view('layout/footer');
    }
    public function insert()
    {
        $this->form_validation->set_rules('tgl', 'tanggal keberangkatan', 'required');
        $this->form_validation->set_rules('asal', 'Asal', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        if ($this->form_validation->run() == false) {
            redirect('Admin');
            // echo "gagal";
        }
        $data = $this->Jadwal_M->add();
        // var_dump($data);
        // die;
        redirect('Admin');
    }
    public function edit($id)
    {
        // echo $id;
        $data['edit'] = $this->db->get_where('jadwal', ["id" => $id])->result_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $user['namalengkap'];
        $data['title'] = "Halaman Admin";
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar', $data);
        $this->load->view('admin/edit', $data);
        $this->load->view('layout/footer');
        // var_dump($data);
        // die;
    }
    public function insertUpdate($id)
    {
        $result = $this->Jadwal_M->simpanUpdate($id);
        if ($result) {
            redirect('Admin');
        }
    }
    public function delete($id)
    {
        $data = $this->db->delete('jadwal', ['id' => $id]);
        if ($data) {
            redirect('Admin');
        }
    }
    public function sendEmail()
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'aimme1786@gmail.com',
            'smtp_pass' => 'kopisoda123',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];
        $laporan = "<table width=\"100%\" border=\"1\" cellspacing=\"0\" style=\"border-color:white; border-radius:10px\">
        <tr>
          <td width=\"50%\" style=\"text-align:center;\">Passenger</td>
          <td width=\"50%\" style=\"text-align:center;\">Detail</td>
        </tr>
        <tr>
          <td width=\"50%\">
            <h4 style=\"padding:0 0 0 10px\">KODE12290</h4>
            <h5 style=\"padding:0 0 0 10px\">Atang sasmita</h5>
          </td>
          <td>
            <h6 style=\"padding:0 0 0 10px;\">Kelas :Ekonomi</h6>
            <h6 style=\"padding:0 0 0 10px;\">Lombok > Surabaya</h6>
            <h6 style=\"padding:0 0 0 10px;\">17 mei 2021</h6>
            <h6 style=\"padding:0 0 0 10px;\">150000</h6>
          </td>
        </tr>
      </table>";
        $this->email->initialize($config);
        $this->email->from('aimme1786@gmail.com', 'tiket-kapal');
        $this->email->to('sasmitaatang4@gmail.com');
        $this->email->subject('test');
        $this->email->message($laporan);
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    public function listPemesanan()
    {
        if ($this->session->userdata('email') == false) {
            redirect('Auth');
        }
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jadwal'] = $this->Jadwal_M->view();
        $data['user'] = $user['namalengkap'];
        $data['title'] = "Halaman Admin";
        $data['list'] = $this->Menu_model->listPemesanan();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar', $data);
        $this->load->view('admin/listpemesanan', $data);
        $this->load->view('layout/footer');
    }
    public function detail($id)
    {
        $data['title'] = "Halaman Admin";
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jadwal'] = $this->Jadwal_M->view();
        $data['user'] = $user['namalengkap'];
        $data['details'] = $this->Menu_model->details($id);
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar', $data);
        $this->load->view('admin/detailpemesanan', $data);
        $this->load->view('layout/footer');
    }
}
