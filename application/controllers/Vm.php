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
    $datos['id_zte'] = $_POST['id_zte_form']; 
    $datos['estado'] = $_POST['estado_form'];
    $grupoVM = $this->UserTable->estados_modal_actividades($datos['id_zte']);
    $datos['estacion'] = $grupoVM[0]['Estacion'];
    $datos['tecnologia'] = $grupoVM[0]['Tecnologia'];
    $datos['banda'] = $grupoVM[0]['Banda'];
    $datos['ente'] = $grupoVM[0]['Ente_ejecutor'];
    // var_dump($datos);
    $this->load->view("parts/header",$data);
    $this->load->view("estadosVM", $datos);
    $this->load->view("parts/footer");
  }
  public function llamadoSitio(){
    $id_zte = $_POST['id_zte_data'];
    $data = $this->UserTable->estados_modal_actividades($id_zte);
    echo json_encode($data);
  }
  
}