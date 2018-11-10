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
            //check login redirect
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $data['title'] = 'Create Category';

            $this->form_validation->set_rules('category_name', 'Category name', 'required');

            if ($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            }else {
                $this->category_model->create_category();

                // flash message create post

                $this->session->set_flashdata('category_created', 'Your category has been created');
                redirect('categories');
            }
        }

        public function posts($id){
            $data['title'] = $this->category_model->get_category($id)->category_name;

            $data['posts'] = $this->post_model->get_posts_by_category($id);

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function products($id){
            $data['title'] = $this->category_model->get_category($id)->category_name;

            $data['products'] = $this->product_model->get_products_by_category($id);

            $this->load->view('templates/header');
            $this->load->view('products/index', $data);
            $this->load->view('templates/footer');
        }

        public function delete($id){
            //check login redirect
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $this->category_model->delete_category($id);

            $this->session->set_flashdata('category_deleted', 'Your category has been deleted');

            redirect('categories');
        }

    }