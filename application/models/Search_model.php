<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Search_model extends CI_Model {

  public function __construct() {
    parent::__construct(); 
  }

  // Fetch records
  public function getSearch($rowno,$rowperpage,$search="") {
 
    $this->db->select('*');
    $this->db->from('products');
    $this->db->order_by('products.id', 'DESC');

    if($search != ''){
      $this->db->like('title', $search);
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
      $this->db->like('title', $search);
      $this->db->or_like('body', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }

}