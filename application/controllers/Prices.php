<?php 
    class Prices extends CI_Controller{

        public function index(){
            $data['title'] = 'Prices';

            $data['prices'] = $this->price_model->get_prices();

            $this->load->view('templates/header');
            $this->load->view('prices/index', $data);
            $this->load->view('templates/footer');
        }

        public function create(){
            //check login redirect
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $data['title'] = 'Create price';

            $this->form_validation->set_rules('price', 'Price', 'required');

            if ($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('prices/create', $data);
                $this->load->view('templates/footer');
            }else {
                $this->price_model->create_price();

                // flash message create post

                $this->session->set_flashdata('price_created', 'Your price has been set');
                redirect('prices');
            }
        }

        public function products($id){
            $data['title'] = $this->price_model->get_price($id)->price;

            // $data['products'] = $this->price_model->get_products_by_price($id);

            $this->load->view('templates/header');
            $this->load->view('prices/index', $data);
            $this->load->view('templates/footer');
        }

        public function delete($id){
            //check login redirect
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $this->price_model->delete_price($id);

            $this->session->set_flashdata('price_deleted', 'Your price has been deleted');

            redirect('prices');
        }

    }