<?php
defined('BASEPATH') or exit('No direct script access allowed');

Class Data extends CI_Model {

    public function get_last_id($table)
    {
        $this->load->database();

        $last = $this->db->order_by('id', "desc")

            ->limit(1)

            ->get($table)

            ->row();

        return $last->id;
    }

    public function submit_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
}