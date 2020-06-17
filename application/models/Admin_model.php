<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function getAdmin()
    {
        $query = $this->db->query('SELECT * FROM admin WHERE id = 1');

        return $query->row();
    }

}