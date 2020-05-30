<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
{

    public function auth($username, $password)
    {
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }
}

/* End of file login_model.php */
