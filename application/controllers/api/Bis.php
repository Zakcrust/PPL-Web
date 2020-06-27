<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Bis extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function index_get()
    {
        $data = $this->db->get('bis');
        $data = $data->result();
        $list = array();
        foreach ($data as $row)
        {
            $return_data = array(
                'id'   => $row->id,
                'nama' => $row->nama,
                'via'   => $row->via,
                'fasilitas' => $row->fasilitas,
                'harga' => $row->harga,
                'deskripsi' => $row->deskripsi,
                'detail_deskripsi' => $row->detail_deskripsi,
                'foto' => base64_encode($row->foto)
            );
            array_push($list, $return_data);
        }
        $this->response($list, REST_Controller::HTTP_OK);
    }
}
