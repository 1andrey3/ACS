<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dao_user_model extends CI_Model {

    public function __construct() {

    }

    //consulta usuario unico por username
    public function getUserByUsername($id) {
        $query = $this->db->get_where('usuario', array('id_usuario' => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    //consulta usuario unico por password
    public function validatePass($pass, $id_user) {
        $query = $this->db->get_where('usuario', array('contrasena' => $pass, 'id_usuario' => $id_user));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return null;
        }
    }

    // obtiene todos los ingenieros y su id
    public function getEngineers() {
        $query = $this->db->query("
			SELECT id_usuario AS id, CONCAT(nombres,' ',apellidos) AS title
			FROM usuario
			WHERE rol = 'ingeniero';
		");

        return $query->result();
    }

    //trae la contraseña del usuario en sesion
    public function get_pass_by_id($user) {
        $query = $this->db->query("
				SELECT contrasena FROM usuario WHERE id_usuario = $user;
			");
        return $query->row();
    }

    public function m_Update_pass_or_email($user, $data) {
        $this->db->where('id_usuario', $user);
        if ($this->db->update('usuario', $data)) {
            return 1;
        } else {
            return 0;
        }
    }

    // Obtiene el usuario segun la cedula que le de
    public function getUserById($id_user) {
        $query = $this->db->get_where('usuario', array('id_usuario' => $id_user));
        return $query->row();
    }

    // retorna id de usuario segun su id
    public function get_user_by_name($name, $last_name) {
        $query = $this->db->query("
            SELECT id_usuario FROM usuario
            WHERE nombres LIKE '%$name%' AND apellidos LIKE '%$last_name%'
        ");

        return $query->row();
    }

    // funcion que retorna los nombres de los ingenieros por id
    public function getNombreIngPerId($id) {
        $query = $this->db->query(
                "SELECT CONCAT(nombres,' ', apellidos) as ing FROM usuario WHERE id_usuario = $id ");
        return $query->row()->ing;
    }

    // Retorna un array con el listado de los ingenieros array = ['pepitp perez', 'alan brito delgado'....]
    public function getArrayAllEngineers(){
        $query = $this->db->query("
                SELECT
                CONCAT(nombres, ' ', apellidos) AS name,
                id_usuario AS id
                FROM usuario WHERE rol LIKE 'ingeniero%'
            ");
        $ingenieros = [];
        for ($i=0; $i < count($query->result_array()); $i++) {
            $ingenieros[$i]['name'] = $query->result_array()[$i]['name'];
            $ingenieros[$i]['id'] = $query->result_array()[$i]['id'];
        }
        return $ingenieros;
    }

    //trae el usuario donde el usuario sea la concatenacion de nombre y apellido
    public function get_user_by_concat_name($name_lastname){
        $query = $this->db->query("
                SELECT id_usuario
                FROM
                usuario
                WHERE CONCAT_WS(' ', nombres, apellidos)
                LIKE '%$name_lastname';
            ");
        return $query->row();
    }

}
