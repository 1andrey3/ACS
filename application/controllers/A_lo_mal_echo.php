<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class A_lo_mal_echo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('data/Dao_user_model');
    }





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
                      }
                        $data = array(
                          'role' => $val_user->rol,
                          'id' => $val_user->id_usuario,
                          'name' => $val_user->nombres . " " . $val_user->apellidos,
                          'email' => $val_user->email
                        );
                        $this->session->set_userdata($data);
                        var_dump(  $this->session->userdata());
                        header('location: ' . base_url() . "User/principal/$val_user->rol");

                    }else{
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


}
?>
