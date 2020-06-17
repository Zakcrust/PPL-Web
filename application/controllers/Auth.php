<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin');
        $this->load->model('PageLoader');
    }

    public function index()
    {
        $this->PageLoader->loadPage('home', 'Beranda', false);
    }
    public function Pencarian()
    {
        $this->PageLoader->loadPage('cari', 'Pencarian', false);
    }
    public function Detail()
    {
        $this->PageLoader->loadPage('detail', 'Detail', false);
    }
    public function Tips_Trik()
    {
        $this->PageLoader->loadPage('tips', 'Tips Trik', false);
    }
    public function About()
    {
        $this->PageLoader->loadPage('about', 'Tentang Kami', false);
    }
    public function Login()
    {
        $this->PageLoader->loadPage('login', 'Login', false);
    }
}
