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
    if($_POST){
      $data['id_zte_grupoVM'] = $_POST['idZteFila'];
    } else{
      $data['id_zte_grupoVM'] = '';
    }
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
    $datos['id_apertura_estados'] = $_POST['id_apertura_estados']; 
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
    $data = $this->UserTable->modal_Actividades($id_zte);
    echo json_encode($data);
  }
  public function nuevaActividad(){
    $modal_nueva_actividad[0] = $_POST['id_zte'];
    $modal_nueva_actividad[1] = $_POST['estado_vm'];
    $modal_nueva_actividad[2] = $_POST['motivo_estado'];
    $modal_nueva_actividad[3] = $_POST['ing_apertura'];
    $modal_nueva_actividad[4] = $_POST['inicio_p'];
    $modal_nueva_actividad[5] = $_POST['fin_p'];
    $modal_nueva_actividad[6] = $_POST['tec_afec'];
    $modal_nueva_actividad[7] = $_POST['bandas_afec'];
    $modal_nueva_actividad[8] = $_POST['per_sol'];
    $modal_nueva_actividad[9] = $_POST['ent_ejec'];
    $modal_nueva_actividad[10] = $_POST['fm_nok'];
    $modal_nueva_actividad[11] = $_POST['fm_claro'];
    $modal_nueva_actividad[12] = $_POST['telef_fm'];
    $modal_nueva_actividad[13] = $_POST['wp'];
    $modal_nueva_actividad[14] = $_POST['crq'];
    $modal_nueva_actividad[15] = $_POST['id_rf_tool'];
    $modal_nueva_actividad[16] = $_POST['bsc_name'];
    $modal_nueva_actividad[17] = $_POST['rnc_name'];
    $modal_nueva_actividad[18] = $_POST['serv_mss'];
    $modal_nueva_actividad[19] = $_POST['int_back'];
    $modal_nueva_actividad[20] = $_POST['reg_clu'];
    $modal_nueva_actividad[21] = $_POST['vist_mm'];
    $modal_nueva_actividad[22] = $_POST['hor_ate'];
    $modal_nueva_actividad[23] = $_POST['hor_real'];
    $modal_nueva_actividad[24] = $_POST['contratista'];
    $modal_nueva_actividad[25] = $_POST['coment'];
    $modal_nueva_actividad[26] = $_POST['tipo_trabajo'];
    $data = $this->UserTable->insertar_actividades($modal_nueva_actividad);
    var_dump($modal_nueva_actividad);
    header('location:index');
  }
}