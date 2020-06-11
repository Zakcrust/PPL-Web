<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function Tambah_Bis()
    {
        $data['title'] = 'Tambah Bis';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbaradm');
        $this->load->view('admin', $data);
        $this->load->view('templates/footer');
    }
    public function Daftar_Bis()
    {
        $data['title'] = 'Daftar Bis';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbaradm');
        $this->load->view('daftar', $data);
        $this->load->view('templates/footer');
    }
}
