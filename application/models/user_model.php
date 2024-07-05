<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function authenticate($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('pass', $password);
        // $this->db->where('password', md5($password)); // Assuming passwords are stored as MD5 hash
        $query = $this->db->get('users');
        return $query->row();
    }
}
