<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vm extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('data/Dao_vm_model');
    $this->load->model('UserTable');
  }
  public function index(){
    $data['actividades'] = $this->UserTable->tableActividades();
    $titulo['title']='actividades';
    $this->load->view("parts/header",$titulo);
    $this->load->view("actividades", $data); 
    $this->load->view("parts/footer");
  }

  public function buscar_tipos_trabajo(){
    $data=$this->Dao_vm_model->obtener_tipos_trabajo();
    echo json_encode($data);
  }
  public function EstadosVM(){
    $data['title']='Estados';
    $datos['zteID'] = $_POST['zteID']; 
    $datos['estadosJS'] = $_POST['estadosJS'];
    var_dump($datos);
    $this->load->view("parts/header",$data);
    $this->load->view("estadosVM");
    $this->load->view("parts/footer");
  }
}