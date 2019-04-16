<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vm extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('data/Dao_vm_model');
  }
  public function index(){
  	$data['title']='actividades';
  	$this->load->view("parts/header",$data);
    $this->load->view("actividades");
    $this->load->view("parts/footer");
  }

  public function buscar_tipos_trabajo(){
    $data=$this->Dao_vm_model->obtener_tipos_trabajo();
    echo json_encode($data);
  }
  
  
}
?>