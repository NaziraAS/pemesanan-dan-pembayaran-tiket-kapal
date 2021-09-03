<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    public function getPembayaran()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()['id'];
        $iduser = $this->db->get_where('pemesanan', ['id_user' => $user])->row_array()['id_user'];
        return $this->db->select('nominal, pemesanan.id_pemesanan')
            ->from('tiket')
            ->join('pembayaran', 'tiket.id_pembayaran=pembayaran.id')
            ->join('pemesanan', 'tiket.id_pemesanan=pemesanan.id_pemesanan')
            ->where('id_user', $iduser)->limit('1', 'DESC')
            ->get()->row_array();
    }
}
