<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

    public function getByPage($pageId)
    {
        $sql = 'SELECT * FROM comment WHERE page_id = ? AND approved = 1';
        $query = $this->db->query($sql, array($pageId));

        return $query->result();
    }

    public function getById($id){
        $sql = 'SELECT * FROM page WHERE id = ?';
        $query = $this->db->query($sql, array($id));

        return $query->row();
    }

}