<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dao_temp_model extends CI_Model {

    public function __construct() {

    }

    // Valida si una tabla existe en la base de datos
    // Retorna cantidad de tablñas con ese nombre
    public function m_exist_table($tabla) {
        $query = $this->db->query("
				show tables like  '$tabla'
			");
        return $query->result();
    }

    // retorna la cantidad de registros que tiene una tabla
    public function cant_registros($tabla) {
        $query = $this->db->get($tabla, 1);
        return $query->num_rows();
    }

    // Obtiene de la tab la dada el registro con el nombre ($name)
    public function get_name_in_table($name, $table) {
        $condicion = ($table == 'estacion') ? 'sitio' : "nombre_$table";

        $query = $this->db->query("
				SELECT
				id_$table AS id
				FROM
				$table
				WHERE
				$condicion =  '$name'
			");
        return $query->row();
    }

}
