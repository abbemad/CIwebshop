<?php 
    class Categories extends CI_Controller{

        public function index(){
            $data['title'] = 'Categories';

            $data['categories'] = $this->category_model->get_categories();

            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }

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