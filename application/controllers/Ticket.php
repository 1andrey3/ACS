<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

  function __construct() {
    parent::__construct();
    //->load->model('data/configdb_model');
  }

  public function index(){
  	$data['title'] = 'Ticket Remedy';
  	$this->load->view('parts/header', $data);
  	$this->load->view('crear_ticket');
  	$this->load->view('parts/footer');
  }
  
  
}
?>