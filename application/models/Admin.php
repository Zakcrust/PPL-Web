<?php
defined('BASEPATH') or exit('No direct script access allowed');

Class Admin extends CI_Model 
{
    public function checkLogin($data)
    {
        $admin = $this->db->get_where('admin', array('user' => $data['user']))->row();
        $admin = (array) $admin;
        $password = md5($data['pass']);
        return $password == $admin['pass'];
    }
}