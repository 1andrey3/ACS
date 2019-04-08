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
	public function get_pass_by_id($user){
		$query = $this->db->query("
				SELECT contrasena FROM usuario WHERE id_usuario = $user;
			");
		return $query->row();
	}
	public function m_Update_pass_or_email($user, $data){
		$this->db->where('id_usuario', $user);
		if($this->db->update('usuario', $data)){
			return 1;
		}
		else {
			return 0;
		}
    }

    // obtiene ingenieros que se encuentran agendados en la malla para la fecha que se pasa por parametro
    public function getMeshEngineersByDate($date) {
        $fecha = explode("-", $date);

        $query = $this->db->query("
			SELECT ma.id_usuario,
                            concat(us.nombres, ' ', us.apellidos) AS nombre,
                            (SELECT COUNT(id_ticket) FROM ticket WHERE usuario_asignado = ma.id_usuario AND fecha_programacion = '$date') cant,
                            `$fecha[2]`
                        FROM malla ma
                        INNER JOIN usuario us ON us.id_usuario = ma .id_usuario AND us.rol = 'ingeniero'
                        WHERE ano = $fecha[0]
                        AND mes = $fecha[1]
                        AND `$fecha[2]` IS NOT NULL
		");

        // print_r($this->db->last_query());
        return $query->result();
    }

    // Obtiene el usuario segun la cedula que le de
    public function getUserById($id_user){
        $query = $this->db->get_where('usuario', array('id_usuario'=> $id_user));
        return $query->row();
    }

    // retorna id de usuario segun su id
    public function get_user_by_name($name, $last_name){
        $query = $this->db->query("
            SELECT id_usuario FROM usuario
            WHERE nombres LIKE '%$name%' AND apellidos LIKE '%$last_name%'
        ");

        return $query->row();
    }


    // funcion que retorna los nombres de los ingenieros por id
    public function getNombreIngPerId($id)
    {
        $query = $this->db->query(
            "SELECT CONCAT(nombres,' ', apellidos) as ing FROM usuario WHERE id_usuario = $id ");
        return $query->row()->ing;
    }
}
