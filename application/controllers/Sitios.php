<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sitios extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
        $this->load->model('Formulario');
	}

	public function index() {

        $data['title'] = "Listado de sitios";
        $data['estacion'] = $this->Formulario->recorridoEstacion();
		$data['tecnologia'] = $this->Formulario->recorridoTecnologia();
		$data['banda'] = $this->Formulario->recorridoBanda();
 		$this->load->view('parts/header',$data);
		$this->load->view('sitios');
		$this->load->view('parts/footer');
    }

    public function mostrar_sitios(){
        $data = $this->Formulario->recorridoGrupoVM();
        echo json_encode(array('data' => $data));
    }
}
