<?php

class UsersModel extends MY_Model {

    public $_table = 'users';

    public function attemptLogin($email,$password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.email',$email);
        $this->db->where('users.password',$password);
        $query = $this->db->get();
        $result = $query->row();

        return $result;

    }

     public function checkUser($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.email',$email);
        $query = $this->db->get();
        $result = $query->row();

        return $result;

    }


    public function register($data)
    {
        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;

    }

    public function updateUser($data,$user_id) {

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
        return $user_id; 
    }

}