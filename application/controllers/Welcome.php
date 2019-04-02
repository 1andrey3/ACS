<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('UserTable');
		$this->load->model('ContrasenaNueva');
	}

	public function index()
	{
		if ($this->session->userdata('name')) {
			$this->session->sess_destroy();
		}
		$this->load->view('login');
	}
	public function newUser()
	{
		$this->load->view('parts/header');
		$this->load->view('CreacionDeUsuarios.php');
		$this->load->view('parts/footer');
	}

	public function showUsers()
	{
		$this->load->view('parts/header');
		$this->load->view('tablaUsuarios.php');
		$this->load->view('parts/footer');
	}

	public function table()
	{
		$data = $this->UserTable->Mostrar();
		//var_dump($data);
		echo json_encode($data);
	}
	public function insertUsers()
	{
		$info[0] = $this->input->post('idNumber');
		$info[1] = $this->input->post('nombres');
		$info[2] = $this->input->post('apellidos');
		$info[3] = $this->input->post('email');
		$info[4] = $this->input->post('NC');
		$info[5] = $this->input->post('rol');
		$this->UserTable->insertar($info);
		header('location:showUsers');
	}
	function UpdateSQL()
	{
		$actual[0] = $this->input->post('idNumberModal');
		$actual[1] = $this->input->post('nombresModal');
		$actual[2] = $this->input->post('apellidosModal');
		$actual[3] = $this->input->post('emailModal');
		$actual[4] = $this->input->post('NCModal');
		$actual[5] = $this->input->post('rolModal');
		var_dump($actual[0]);
		$this->UserTable->actualizarCI($actual);
		header('location:showUsers');
	}
	function formularioCContrasena()
	{
		$this->load->view('cambiarContrasena');
	}
	function CambioContra()
	{
		$inpCambio =  $this->input->post('inputDos');
		$id = $this->input->post('id');
		$this->ContrasenaNueva->cambiar($id, $inpCambio);
		$this->load->view('login');
	}
}
