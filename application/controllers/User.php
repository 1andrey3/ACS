<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('data/Dao_user_model');
    }

    // Funcion para validar logueo
    public function index() {
        $ID_USER = $this->input->post('username');
        $PASSWORD = $this->input->post('contrasena');
        $val_user = $this->Dao_user_model->getUserByUsername($ID_USER);
        if ($val_user != null) {
            $val_pass = $this->Dao_user_model->validatePass($PASSWORD, $val_user->id_usuario);
            if ($val_pass != null) {
                if ($PASSWORD === 'abc123' || strlen($PASSWORD) <= 6) {
                    $data['usuario'] = $val_user;
                    $this->load->view('cambiarContrasena', $data);
                } else {
                    $data = array(
                        'role' => $val_user->rol,
                        'id' => $val_user->id_usuario,
                        'name' => $val_user->nombres . " " . $val_user->apellidos,
                        'email' => $val_user->email
                    );
                    $this->session->set_userdata($data);
                    header('location: ' . base_url() . "User/principal/" . $_SESSION['role']);
                }
            } else {
                $response['mensaje'] = 'Error de autentificación!';
                $response['texto'] = 'La contraseña es errónea';
                $response['tipo'] = 'error';
                $this->load->view('login', $response);
            }
        } else {
            $response['mensaje'] = 'Error de actualización';
            $response['texto'] = 'El No. de documento es desconocido!';
            $response['tipo'] = 'error';
            $this->load->view('login', $response);
        }
    }

    // Carga la vista ppal segun el roll
    public function principal() {
        if (!$_SESSION['role']) {
            header('location:' . base_url('user'));
        } else {
            $data['title'] = 'Principal';
            $this->load->view('parts/header', $data);
            $this->load->view($_SESSION['role']);
            $this->load->view('parts/footer');
        }
    }

    // cierra session
    public function logout() {
        if ($this->session->userdata('name')) {
            $this->session->sess_destroy();
        }
        $this->load->view('login');
    }

    // retorna para js las variables del usuario en session
    public function getSessionValues() {
        $clave = $this->input->post('clave');


        if ($clave) {
            echo json_encode($this->session->userdata("$clave"));
        } else {
            echo json_encode($this->session->userdata());
        }
    }

    // retorna listado de ingenieros con su id
    public function js_getEngineers() {
        $ingenieros = $this->Dao_user_model->getEngineers();
        echo json_encode($ingenieros);
    }

    // retorna la lista de ingenieros que se encuentran agendados en la malla para la fecha que se pasa por post
    public function c_getMeshEngineersByDate() {
        $date = $this->input->post('fecha');
        $ingenieros = $this->Dao_user_model->getMeshEngineersByDate($date);
        echo json_encode($ingenieros);
    }

    // valida si el pasword ingresado en el input es correcto
    public function validate_pass() {
        $user_in_session = $this->session->userdata('id');
        $password = $this->input->post('pass');
        $res = $this->Dao_user_model->get_pass_by_id($user_in_session);
        if ($res->contrasena == $password) {
            echo json_encode(1);
        } else {
            echo json_encode(0);
        }
    }

    public function Update_pass_or_email() {
        if (!$this->session->userdata('id')) {
            header('location: ' . base_url());
        }
        $user_in_session = $this->session->userdata('id');
        $data = array(
            'email' => $this->input->post('new_email'),
            'contrasena' => $this->input->post('new_pass')
        );
        $res = $this->Dao_user_model->m_Update_pass_or_email($user_in_session, $data);

        $this->load->library('user_agent');
        if ($res == 1) {
            $this->session->set_flashdata('msj', 'ok');
            $this->session->sess_destroy();
            $this->load->view('login');
        } else {
            $this->session->set_flashdata('msj', 'error');
            header('location: ' . $this->agent->referrer());
        }
    }

    // retorna el id de un usuario segun su nombre
    public function c_get_iduser_by_name() {
        $nombre = explode(' ', $this->input->post('name'))[0];
        $apellido = explode(' ', $this->input->post('name'))[1];
        $idUser = $this->Dao_user_model->get_user_by_name($nombre, $apellido);
        echo json_encode($idUser);
    }

    public function sumar($num) {
        return $num + 2;
    }

    public function dividir($num) {
        return $num / 2;
    }

    public function concatenar($str) {
        return $str . ' hola inmundo';
    }

}
