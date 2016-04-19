<?php

class home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($username, $password) {
        $this -> db -> select('id, password, name');
        $this -> db -> from('admin');
        $this -> db -> where('id', $username);
        $this -> db -> limit(1);
        $query = $this -> db -> get();

        if($query -> num_rows() == 1 && password_verify($password,$query->row()->password))
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function set($id, $password, $name, $phone) {
        $data = array(
            'id' => $id,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'name' => $name,
            'phone' => $phone
        );
        $this->db->insert('admin', $data);
    }

    public function get($id) {
        $this->db->select('id');
        $this->db->from('admin');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1)
            return true;
        else
            return false;
    }
}
