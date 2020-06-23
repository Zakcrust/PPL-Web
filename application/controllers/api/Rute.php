<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require(APPPATH . '/libraries/REST_Controller.php');

Class Rute extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index_get() {
        $source = $this->get('source');
        $destination = $this->get('destination');
        if(!empty($source) && !empty($destination))
        {
            $data_query = array('kota_asal' => $source, 'kota_tujuan' => $destination);
            $query = $this->db->get_where('rute', $data_query);
            $data = $query->result();
            if(empty($data))
            {
                $data = 'Not Found';
            }
                
        }else {
            $data = 'Not Found';
        }
            $this->response($data, REST_Controller::HTTP_OK);
    }

}