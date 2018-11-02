<?php 
    class User_model extends CI_Model{
        public function register($enc_password){
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
        // log user in
        public function login($username, $password)
        {

            $this->db->where('username', $username);
            $query = $this->db->get('users');
            $result = $query->row_array(); // get the row 
        
            if (!empty($result) && password_verify($password, $result['password'])) {
                // if this username exists and the input password is verified using password_verify
                return $result['id'];
            } else {
                return false;
            }
        }
        
        //check existing user
        public function check_username_exists($username){
            $query = $this->db->get_where('users', array('username' => $username));

            if(empty($query->row_array())){
                return true;
            }
            else {
                return false;
            }
        }

        public function check_email_exists($email){
            $query = $this->db->get_where('users', array('email' => $email));

            if(empty($query->row_array())){
                return true;
            }
            else {
                return false;
            }
        }
    }