<?php 
    class Categories extends CI_Controller{
        public function create(){
            $data['title'] = 'Create Category';

            $this->form_validation->set_rules('name', 'Name', 'required');

            if ($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            }else {
                $this->category_model->create_category();
                redirect('categories');
            }
        }
    }