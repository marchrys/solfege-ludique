<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_model extends CI_Model {

    public function getByPage($pageId)
    {
        $sql = 'SELECT * FROM comment WHERE page_id = ? AND approved = 1';
        $query = $this->db->query($sql, array($pageId));

        return $query->result();
    }

    public function getPending(){
        $query = $this->db->query('SELECT * FROM comment WHERE approved = 0');
        return $query->result();
    }

    public function insertComment($pageId, $author, $content, $createdAt){
        $sql = 'INSERT INTO comment (page_id, author, content, created_at) VALUES (?, ?, ?, ?)';

        $query = $this->db->query($sql, array($pageId, $author, $content, $createdAt));
    }

    public function approveComment($commentId){
        $sql = 'UPDATE comment SET approved = 1 WHERE id = ?';

        $query = $this->db->query($sql, array($commentId));
    }

}
