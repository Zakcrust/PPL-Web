<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login');
        $this->load->model('PageLoader');
        $this->load->model('Data');
    }

    public function Login() {
        $login_data = array(
            'user' => $this->input->post('user'),
            'pass' => $this->input->post('pass')
        );

        if($this->Login->checkLogin((array)$login_data)){
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
            $data['title'] = 'Login';
            $this->PageLoader->loadPage('login', 'Login', false);
        }
        else {
            $this->PageLoader->loadPage('admin', 'Tambah Bis', true);
        }
        
    }
    public function Daftar_Bis()
    {
        $data['rute'] = $this->db->get('rute')->result();
        $data['title'] = 'Daftar Bis';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbaradm');
        $this->load->view('daftar', $data);
        $this->load->view('templates/footer');
    }

    public function simpanData()
    {
        $this->session->unset_userdata('data_invalid');
        $this->session->unset_userdata('data_valid');

        $facilities_data = $this->input->post('facilities');
        $facilities = '';

        foreach ($facilities_data as $facility) {
            $facilities .= strval($facility) . ',';
        }
        $facilities = substr($facilities, 0, -1);

        if (isset($_FILES['foto']))
        {
            $errors = array();
            
            $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['foto']['name'];


            $tmp = explode('.', $file_name);
            $file_ext = end($tmp);

            $file_size = $_FILES['foto']['size'];
            $file_tmp = $_FILES['foto']['tmp_name'];


            if (in_array($file_ext, $allowed_ext) === false) {
                $errors[] = 'Extension not allowed';
                print_r($errors);
                $this->session->set_flashdata('data_invalid', $errors[0]);
                $this->PageLoader->loadPage('admin', 'Tambah Bis', true);
                return;
            } else if ($file_size > 2097152) {
                $errors[] = 'File size must be under 2mb';
                print_r($errors);
                $this->session->set_flashdata('data_invalid', $errors[0]);
                $this->PageLoader->loadPage('admin', 'Tambah Bis', true);
                return;
            }

            $data = file_get_contents($file_tmp);
            $base64_img = base64_encode($data);
        }
        

        $bis_data = array (
            'nama' => $this->input->post('bus'),
            'via' => $this->input->post('via'),
            'fasilitas' => $facilities,
            'harga' => $this->input->post('price'),
            'deskripsi' => $this->input->post('description'),
            'detail_deskripsi' => '',
            'foto' => $base64_img
        );

        $this->Data->submit_data($bis_data, 'bis');

        $rute_data = array(
            'kota_asal' => $this->input->post('source'),
            'kota_tujuan' => $this->input->post('destination'),
            'id_bis'      => $this->Data->get_last_id('bis')
        );

        $this->Data->submit_data($rute_data, 'rute');
        $this->session->set_flashdata('data_valid', 'Data berhasil ditambahkan');
        redirect(base_url('Admin/tambahBis'));
    }

    public function edit($id)
    {
        $data['rute'] = $this->db->get_where('rute', array('id' => $id))->result();
        $data['title'] = 'Edit Data';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbaradm');
        $this->load->view('edit', $data);
        $this->load->view('templates/footer');
    }

    public function updateData()
    {
        $this->session->unset_userdata('data_invalid');
        $this->session->unset_userdata('data_valid');
        $facilities_data = $this->input->post('facilities');
        if($facilities_data == null){
            $this->session->set_flashdata('data_invalid', 'Facilities must be checked');
            $this->edit($this->input->post('rute_id'));
            return;
        }
        
        $facilities = '';

        foreach ($facilities_data as $facility) {
            $facilities .= strval($facility) . ',';
        }
        $facilities = substr($facilities, 0, -1);

        if (isset($_FILES['foto'])) {
            $errors = array();

            $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['foto']['name'];


            $tmp = explode('.', $file_name);
            $file_ext = end($tmp);

            $file_size = $_FILES['foto']['size'];
            $file_tmp = $_FILES['foto']['tmp_name'];


            if (in_array($file_ext, $allowed_ext) === false) {
                $errors[] = 'Extension not allowed';
                print_r($errors);
                $this->session->set_flashdata('data_invalid', $errors[0]);
                $this->edit($this->input->post('rute_id'));
                return;
            } else if ($file_size > 2097152) {
                $errors[] = 'File size must be under 2mb';
                print_r($errors);
                $this->session->set_flashdata('data_invalid', $errors[0]);
                $this->edit($this->input->post('rute_id'));
                return;
            }

            $data = file_get_contents($file_tmp);
            $base64_img = base64_encode($data);
        }


        $bis_data = array(
            'id' => $this->input->post('bus_id'),
            'nama' => $this->input->post('bus'),
            'via' => $this->input->post('via'),
            'fasilitas' => $facilities,
            'harga' => $this->input->post('price'),
            'deskripsi' => $this->input->post('description'),
            'detail_deskripsi' => '',
            'foto' => $base64_img
        );

        $this->Data->update_data($bis_data, 'bis', $bis_data['id']);

        $rute_data = array(
            'id'        => $this->input->post('rute_id'),
            'kota_asal' => $this->input->post('source'),
            'kota_tujuan' => $this->input->post('destination'),
            'id_bis'      => $this->Data->get_last_id('bis')
        );

        $this->Data->update_data($rute_data, 'rute', $rute_data['id']);
        $this->session->set_flashdata('data_valid', 'Data berhasil ditambahkan');
        redirect(base_url('Admin/Daftar_Bis'));
    }

    public function delete($id)
    {
        $rute = $this->db->get_where('rute', array('id' => $id))->result();
        $this->db->delete('rute', array('id' => $id));
        $this->db->delete('bis', array('id' => $rute[0]->id_bis));
        redirect(base_url('Admin/Daftar_Bis'));
    }

}
