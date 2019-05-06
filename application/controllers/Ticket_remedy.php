<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ticket_remedy extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_ticket_remedy');
	}

  public function index()
  {
		$data['id_actividad'] = "123";
		$consulta = $this->Model_ticket_remedy->consulta($data['id_actividad']);
		$data['title'] = "Tickets Remedy";
    $this->load->view('parts/header',$data);
    $this->load->view('cierre_actividades');
    $this->load->view('parts/footer');

  }

	public function CrearTicketRemedy()
	{
		$arreglo = (Array) $this->input->POST('datos');
		if(count(array_filter($arreglo)) !== count($arreglo)){
			echo"false";
		}else {
		$consulta = $this->Model_ticket_remedy->CrearTicketRemedy($arreglo);
		print_r($arreglo);

		}


	}

	public function ingenieros()
	{
		$consulta = $this->Model_ticket_remedy->ingenieros();

		echo json_encode($consulta);
	}

}
