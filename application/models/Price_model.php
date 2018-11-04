<?php 
    class Price_model extends CI_Model {
        public function __construct(){
            $this->load->database();
        }
        public function get_prices(){
            $this->db->order_by('price');
            $query = $this->db->get('prices');
            return $query->result_array();
        }

        public function create_price(){
            $data = array(
                'price'=> $this->input->post('price'),
                'user_id' => $this->session->userdata('user_id')
            );
            return $this->db->insert('prices', $data);
        }

        public function get_price($id){
            $query = $this->db->get_where('prices', array('id' => $id));
            return $query->row();
        }

        public function delete_price($id){
            $this->db->where('id', $id);
            $this->db->delete('price');
            return true;
        }
        
    }
