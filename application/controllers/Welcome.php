<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('UserTable');
		$this->load->model('ContrasenaNueva');
		$this->load->model('Formulario');
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

	function datosGrupoVM(){
		$form = [];
		$form[0] = $_POST['idSiteAccess'];
		$form[1] = $_POST['fechaSolicitud'];
		$form[2] = $_POST['estacion'];
		$form[3] = $_POST['tecnologia'];
		$form[4] = $_POST['banda'];
		$form[5] = $_POST['enteEjecutor'];
		$form[6] = $_POST['nGSkype'];
		$form[7] = $_POST['rSkype'];
		$form[8] = $_POST['personaSolicita'];
		$form[9] = $_POST['horaApertura'];
		$form[10] = $_POST['ingenieroCreadorG'];
		$form[11] = $_POST['incidente'];
		var_dump($form);
		$this->Formulario->guardarDatos($form);
		header('location:../Sitios');
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

	function creacionGrupoVM(){
		$data['title'] = 'grupoVM';
		$data['estacion'] = $this->Formulario->recorridoEstacion();
		$data['tecnologia'] = $this->Formulario->recorridoTecnologia();
		$data['banda'] = $this->Formulario->recorridoBanda();
		$data['grupoSitios'] = $this->Formulario->recorridoGrupoVM();
		$data['title'] = "Creación Grupos VM";
 		$this->load->view('parts/header',$data);
		$this->load->view('sitios');
		$this->load->view('parts/footer');
	}

	function tablaJson(){
		$tabla = $this->Formulario->recorridoEstacion();
		echo json_encode($tabla);

		// echo '<pre>'; print_r($ids); echo '</pre>';
		// print_r($tabla[]['id_estacion']);

		// var_dump(json_encode($tabla));
	}

	function tablaGrupovm(){
		$tabla =  $this->Formulario->recorridoGrupoVM();
		echo json_encode($tabla);
	}

	function CambioContra()
	{
		$inpCambio =  $this->input->post('inputDos');
		$id = $this->input->post('id');
		if($this->ContrasenaNueva->cambiar($id, $inpCambio) == 1){
			$data['mensaje'] = 'Contraseña Actualizada!';
			$data['texto'] = 'Por favor, ingrese con su nueva contraseña';
			$data['tipo'] = 'success';
			$this->load->view('login',$data);
		}else{
			$data['mensaje'] = 'Error de actualización';
			$data['texto'] = 'Por favor, intente nuevamente el cambiado de contraseña';
			$data['tipo'] = 'error';
			$this->load->view('login',$data);
		}
	}

	function estadosActividades(){

		$data[0] = $this->input->post('id_apertura_estados');
		$data[1] = $this->input->post('ingenieroControl');
		$data[2] = $this->input->post('horaRevision');
		$data[3] = $this->input->post('comentarioPC');
		$data[4] = $this->input->post('selectorEstado');
		
		$datoCierre[0] = $this->input->post('id_apertura_estados');
		$datoCierre[1] = $this->input->post('RET');
		$datoCierre[2] = $this->input->post('ampliacionDual');
		$datoCierre[3] = $this->input->post('selectorDual');
		$datoCierre[4] = $this->input->post('tipoSolucion');
		$datoCierre[5] = $this->input->post('estadoVM');
		$datoCierre[6] = $this->input->post('subEstado');
		$datoCierre[7] = $this->input->post('inicioVM');
		$datoCierre[8] = $this->input->post('fallaFinal');
		$datoCierre[9] = $this->input->post('tipoFalla');
		$datoCierre[10] = $this->input->post('vistasMM');
		$datoCierre[11] = $this->input->post('estadoNotificacion');
		$datoCierre[12] = $this->input->post('ingenieroCierre');
		$datoCierre[13] = $this->input->post('horaAtencionCierre');
		$datoCierre[14] = $this->input->post('horaConfirmacionCierre');
		$datoCierre[15] = $this->input->post('comentariosCierre');
		$datoCierre[16] = $this->input->post('selectorEstado');
		$this->UserTable->enviarPuntoControl($data);
		$this->UserTable->enviarCierre($datoCierre);		
	}
}
