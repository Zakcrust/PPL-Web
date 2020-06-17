<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
        $this->load->model('PageLoader');
    }

    public function Login() {
        $login_data = array(
            'user' => $this->input->post('user'),
            'pass' => $this->input->post('pass')
        );
        /* if ($this->session->has_userdata('logged_in')) {
            $this->PageLoader->loadPage('admin', 'Tambah Bis', true);
            die();
        } */

        if($this->admin->checkLogin((array)$login_data)){
            $this->PageLoader->loadPage('admin', 'Tambah Bis', true);
            $this->session->set_userdata('logged_in', true);
        }
        else {
            redirect("Auth/login");
        }
    }

    public function tambahBis()
    {
        if (!$this->session->has_userdata('logged_in')) {
            $this->PageLoader->loadPage('login', 'Login', false);
        }
        $data['title'] = 'Tambah Bis';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
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
