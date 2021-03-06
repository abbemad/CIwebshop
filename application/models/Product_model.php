<?php 
    class Product_model extends CI_Model {
        public function __construct(){
            $this->load->database();
        }

        public function get_products($slug = FALSE, $limit= FALSE, $offset = FALSE){
            if($limit){
                $this->db->limit($limit, $offset);
            }
            if($slug === FALSE){
                $this->db->order_by('products.id', 'DESC');
                $this->db->join('categories', 'categories.id = products.category_id');
                $query = $this->db->get('products');
                return $query->result_array();
            }

            $query = $this->db->get_where('products', array('slug' => $slug));
            return $query->row_array();
        }

        public function create_product($image){
            $slug = url_title($this->input->post('name'));
            
			$data = array(
				'name' => $this->input->post('name'),
                'slug' => $slug,
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id'),
                'user_id' => $this->session->userdata('user_id'),
                'image' => $image,
                'price' => $this->input->post('price')
			);
			return $this->db->insert('products', $data);
		}

        public function delete_product($id){
            $this->db->where('id', $id);
            $this->db->delete('products');
            return true;
        }

        public function update_product(){
            $slug = url_title($this->input->post('name'));

            $data = array(
                'name' => $this->input->post('name'),
                'slug' => $slug, 
                'body' => $this->input->post('body'), 
                'category_id' => $this->input->post('category_id'),
                'price' => $this->input->post('price')
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('products', $data);

        }

        public function get_categories(){
            $this->db->order_by('category_name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        public function get_products_by_category($category_id){
            $this->db->order_by('products.id', 'DESC');
            $this->db->join('categories', 'categories.id = products.category_id');
                $query = $this->db->get_where('products', array('category_id'=> $category_id));
            return $query->result_array();
        }

        public function getSearch($rowno,$rowperpage,$search="") {
 
            $this->db->select('*');
            $this->db->from('products');
            $this->db->order_by('products.id', 'DESC');
        
            if($search != ''){
              $this->db->like('name', $search);
              $this->db->or_like('body', $search);
            }
        
            $this->db->limit($rowperpage, $rowno); 
            $query = $this->db->get();
         
            return $query->result_array();
          }
        
          // Select total records
          public function getamountSearch($search = '') {
        
            $this->db->select('count(*) as allcount');
            $this->db->from('products');
         
            if($search != ''){
              $this->db->like('name', $search);
              $this->db->or_like('body', $search);
            }
        
            $query = $this->db->get();
            $result = $query->result_array();
         
            return $result[0]['allcount'];
          }

            function product(){
            return $q = $this->db->select('*')->from('products')->get()->result();
            }

            function product_detail($id){
            return $q = $this->db->select('*')->from('products')->where('id',$id)->get()->row();
            }

    }

    
