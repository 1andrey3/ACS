<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserTable');
        $this->load->model('Model_gestion_usuarios');
    }

    public function index() {
        $data['title'] = 'Usuarios';
        $this->load->view('parts/header', $data);
        $this->load->view('usuarios');
        $this->load->view('parts/footer');
    }

    public function registrar_usuarios() {
        $nombre = strtoupper($this->input->post('nombre'));
        $apellido = mb_strtoupper($this->input->post('apellido'), 'UTF-8');
        $cedula = $this->input->post('cedula');
        $correo = $this->input->post('correo');
        $cargo = $this->input->post('cargo');
        $celular = $this->input->post('celular');
        $contrasena = "abc123";
        $registro = $this->Model_gestion_usuarios->crear_usuario($cedula, $nombre, $apellido, $cargo, $celular, $correo, $contrasena);
        echo $contrasena;
    }

// BUSCAR USUARIO
    public function buscar_usuario() {
        $id = $this->input->post('id');
        $resultado = $this->Model_gestion_usuarios->buscar_usuario($id);
        echo json_encode($resultado);
    }

    public function actualizar_usuario() {
        $cedula = $this->input->post('cedula');
        $nombre = strtoupper($this->input->post('nombre'));
        $apellido = mb_strtoupper($this->input->post('apellido'), 'UTF-8');
        $cargo = $this->input->post('cargo');
        $telefono = $this->input->post('telefono');
        $celular = $this->input->post('celular');
        $correo = $this->input->post('correo');
        $username = $this->input->post('username');
        $contrasena = $this->input->post('contrasena');
        $resultado = $this->Model_gestion_usuarios->actualizar_usuario($cedula, $nombre, $apellido, $cargo, $celular, $correo, $contrasena);
    }

    public function eliminar_usuario() {
        $id = $this->input->post('id');
        $resultado = $this->Model_gestion_usuarios->eliminar_usuario($id);
    }

    //Funcion para conseguir las actividades
    public function buscar_actividades() {
        $data = $this->Model_gestion_usuarios->obtener_actividades();
        echo json_encode($data);
    }

}

?>
