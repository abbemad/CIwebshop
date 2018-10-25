<?php 
    class User_model extends CI_Model{
        public function  __construct($enc_password){
            // data array

            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password,
                'zipcode' => $this->input->post('zipcode')
            );
            
            //insert user
            return $this->db->insert('users', $data);
        }

    }