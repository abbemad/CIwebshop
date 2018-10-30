<?php
    class Users extends CI_Controller{

        public function register(){
            $data['title'] = 'Sign Up';

            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username_exists|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');

                
            } else{

                //encrypt pass NOT use MD5
                $enc_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT); 

                $this->user_model->register($enc_password);

                $this->session->set_flashdata('user_registered', 'You are now registered and are able to login');

                redirect('posts');
            }
        }
        // check username exist
        function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'That username is already taken');

            if($this->user_model->check_username_exists($username)){
                return true;
            } else{
                return false;
            }
        }
    }