<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Beranda';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }
    public function Pencarian()
    {
        $data['title'] = 'Pencarian';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('cari', $data);
        $this->load->view('templates/footer');
    }
    public function Detail()
    {
        $data['title'] = 'Detail';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('detail', $data);
        $this->load->view('templates/footer');
    }
    public function Tips_Trik()
    {
        $data['title'] = 'Tips Trik';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('tips');
        $this->load->view('templates/footer');
    }
    public function About()
    {
        $data['title'] = 'Tentang Kami';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('about');
        $this->load->view('templates/footer');
    }
    public function Login()
    {
        $data['title'] = 'Login';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('login', $data);
        $this->load->view('templates/footer');
    }
}
