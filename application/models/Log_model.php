<?php

class Log_model extends CI_Model
{
    function checkEmail($email) {
        $this->db->select('count(*) as cnt');
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        $row = $query->row_array();
        return $row['cnt'];
    }

    function check_loginfo($email, $password) {
        $this->db->select('count(*) as cnt');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
        $row = $query->row_array();
        return $row['cnt'];   
    }

    function getUserdataByEmail($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        $row = $query->row_array();
        return $row;
    }

    function getUsers() {
        $this->db->select('*');
        $query = $this->db->get('users');
        $row = $query->result_array();
        return $row;
    }
}