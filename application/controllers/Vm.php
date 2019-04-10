<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vm extends CI_Controller {

  function __construct() {
    parent::__construct();
    //->load->model('data/configdb_model');
  }
  public function index(){
  	$data['title']='actividades';
  	$this->load->view("parts/header",$data);
    $this->load->view("actividades");
    $this->load->view("parts/footer");
  }
  
  
}
?>