<?php
defined('BASEPATH') or exit('No direct script access allowed');

Class PageLoader extends CI_Model {

    public function loadTambahBis(){
        $data['title'] = 'Tambah Bis';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbaradm');
        $this->load->view('admin', $data);
        $this->load->view('templates/footer');
    }

    public function loadPage($page, $pageTitle, $isAdmin) {
        $data['title'] = $pageTitle;
        $this->load->view('templates/header', $data);
        if ($isAdmin) {
            $this->load->view('templates/topbaradm', $data);
        }
        else {
            $this->load->view('templates/topbar', $data);
        }
        $this->load->view($page, $data);
        $this->load->view('templates/footer');
        
    }

}