<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct(){
 
    parent::__construct();
    $this->load->helper('url');

    // Load session
    $this->load->library('session');

    // Load Pagination library
    $this->load->library('pagination');

    // Load model
    $this->load->model('Main_model');
  }

  public function index(){
    redirect('User/loadRecord');
  }

  public function loadRecord($rowno=0){

    // Search text
    $search_text = "";
    if($this->input->post('submit') != NULL ){
      $search_text = $this->input->post('search');
      $this->session->set_userdata(array("search"=>$search_text));
    }else{
      if($this->session->userdata('search') != NULL){
        $search_text = $this->session->userdata('search');
      }
    }

    // Row per page
    $rowperpage = 3;

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $allcount = $this->Main_model->getrecordCount($search_text);

    // Get records
    $users_record = $this->Main_model->getData($rowno,$rowperpage,$search_text);
 
    // Pagination Configuration
    $config['base_url'] = base_url().'index.php/User/loadRecord';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = 3;

    $config['uri_segment'] = 3;
    $config['attributes'] = array('class' => 'pagination-link');

    // Initialize
    $this->pagination->initialize($config);

    $data['title'] = 'Searched posts';

    // $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);
 
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['row'] = $rowno;
    $data['search'] = $search_text;

    // Load view
    
    $this->load->view('templates/header');
    $this->load->view('user_view_two',$data);
    $this->load->view('templates/footer');
 
  }

}