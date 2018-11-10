<?php 
    class Products extends CI_Controller {
        public function index($offset = 0){

        // Pagination configuration	
			$config['base_url'] = base_url() . 'products/index/';
			$config['total_rows'] = $this->db->count_all('products');
            $config['per_page'] = 3;
        //uri amount of / in uri
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link');
        // init pagination
            $this->pagination->initialize($config);

            $data['title'] = 'Latest Products';

            $data['products'] = $this->product_model->get_products(FALSE, $config['per_page'], $offset);

            $this->load->view('templates/header');
            $this->load->view('products/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL){
            $data['product'] = $this->product_model->get_products($slug);

            $product_id = $data['product']['id'];
            $data['comments'] = $this->comment_model->get_comments($product_id);
            
        
            if(empty($data['product'])){
                show_404();
            }

            $data['title'] = $data['product']['name'];

            $this->load->view('templates/header');
            $this->load->view('products/view', $data);
            $this->load->view('templates/footer');
        }

        public function create(){
            // check loggedin
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $data['title'] ='Create product';
            
            $data['categories'] = $this->product_model->get_categories();

            $this->form_validation->set_rules('name', 'Product', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');

            if ($this->form_validation->run() === FALSE){

                $this->load->view('templates/header');
                $this->load->view('products/create', $data);
                $this->load->view('templates/footer');
            } else {
                // upload an image
                $config['upload_path'] = './assets/images/products';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '800';
                $config['max_height'] = '800';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                    $image = 'noimage.jpg';
                } else {
                    $data = array('upload_date' => $this->upload->data());
                    $image = $_FILES['userfile']['name'];
                }

               $this->product_model->create_product($image);

               // create flashmessage
               $this->session->set_flashdata('product_created', 'Your product has been created');
               redirect('products');
            }


        }

        public function delete($id){
            //check login redirect
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $this->product_model->delete_product($id);

            $this->session->set_flashdata('product_deleted', 'Your product has been deleted');

            redirect('products');
        }

        public function edit($slug){
            //check login redirect
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['product'] = $this->product_model->get_products($slug);
            // check user
            if($this->session->userdata('user_id') != $this->product_model->get_products($slug)['user_id']){
                redirect('products');
            }
            
            $data['categories'] = $this->product_model->get_categories();
            
           

        
            if(empty($data['product'])){
                show_404();
            }

            $data['title'] = 'Edit product';

            $this->load->view('templates/header');
            $this->load->view('products/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update(){
            //check login redirect
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $this->product_model->update_product();

            $this->session->set_flashdata('product_updated', 'Your product has been updated');
            redirect('products');
        }
    }
