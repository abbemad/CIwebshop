<?php
    class Users extends CI_Controller{
        //register 
        public function register(){
            $data['title'] = 'Sign Up';

            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username_exists|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|callback_check_email_exists|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
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
        //login user
        public function login(){
            $data['title'] = 'Sign In';

            $this->form_validation->set_rules('username', 'Username', 'required');
            // $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');

                
            } else{
                //get username
                $username = $this->input->post('username');
                //get and encrypt password
                $password = $this->input->post('password');

                $user_id = $this->user_model->login($username, $password);

                if ($user_id){
                    // create session
                    die('SUCCES');
                    // message
                    $this->session->set_flashdata('user_loggedin', 'You are now logged in');

                    redirect('posts');
                } else {
                    // message
                    $this->session->set_flashdata('login_failed', 'Login is invalid');

                    redirect('users/login');
                }
            }
        }
        // check username exists
        function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'That username is already taken');

            if($this->user_model->check_username_exists($username)){
                return true;
            } else{
                return false;
            }
        }
        // check email exists
        function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists', 'The email adress you entered is already in use');

            if($this->user_model->check_email_exists($email)){
                return true;
            } else{
                return false;
            }
        }
    }