<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dao_temp_model extends CI_Model {

	public function __construct(){

	}

	// Obtiene el registro maximo de la tabla temp
	public function getTableTempMax(){
		$query = $this->db->query("
			SELECT id_temp, nombre, actualizada FROM temp
			ORDER BY id_temp DESC
		"); 
		return $query->row();
	}

	// Valida si una tabla existe en la base de datos
	// Retorna cantidad de tablñas con ese nombre
	public function m_exist_table($tabla){
		$query = $this->db->query("
				show tables like  '$tabla' 
			");
		return $query->result();
	}

	// retorna la cantidad de registros que tiene una tabla
	public function cant_registros($tabla){
		$query = $this->db->get($tabla, 1);
		return $query->num_rows();
	}

	// retorna todos los registros
	public function getAllTempFO($tabla){
		$query = $this->db->query("
						SELECT
						`Id-On Air` AS id_on_air, 
						`Nombre_Estación-EB` AS nombre_estacion, 
						Tecnologia, 
						Banda, 
						Subestado, 
						`Fecha ingreso On Air` AS fecha_ingreso_on_air, 
						Fechaultimarev, 
						Tipo_de_Trabajo, 
						Ciudad, 
						Regional_Ciudad, 
						correccionpendientes, 
						En_Prorroga
						FROM 
						$tabla
						WHERE 
						Estado = 'Seguimiento FO'
					");
		$error = $this->db->error();
		if($error['message']){
			// echo '<pre>'; print_r($error['message']); echo '</pre>';
			return false;
		} else {
			return $query;
		}
	}

	// Obtiene de la tab la dada el registro con el nombre ($name)
	public function get_name_in_table($name, $table){
		$query = $this->db->query("
				SELECT 
				id_$table AS id 
				FROM 
				$table 
				WHERE 
				nombre_$table =  '$name'
			");
		return $query->row();
	}

	// Inserta en la tabla dada el nuevo nombre
	public function insert_in_table($nombre, $tabla){
		$this->db->set("nombre_$tabla", $nombre);

		if($this->db->insert("$tabla")){
			return $this->db->insert_id();
		}  else {
			return 999999;
		}
	}

	// Inserta nuevo registro en la tabla temp
	public function insert_new_export($tabla, $fecha){
		$this->db->set("nombre", $tabla);
		$this->db->set("actualizada", $fecha);
		if ($this->db->insert('temp')) {
			return 1;
		} else {
			$error = $this->db->error();
			return $error['message'];
		}
	}

	// eliminar una tabla de la base de datos
	public function drop_table_temp($tabla){
		$this->load->dbforge();
		$this->dbforge->drop_table("$tabla",TRUE);
	}

	// actualiza eventos en la tabla malla.
	public function m_prueba($data){
		$this->db->where('id_temp', 1);
        if($this->db->update('temp', $data)){
        	print_r($this->db->affected_rows());
        }else {
			print_r($this->db->affected_rows());
		}
	}

	// inserta en tabla temp la ultima actualizacion de la data
	public function insert_last_update($fecha, $id, $error){
		$this->db->set("activo", $error);
		$this->db->set("actualizada", $fecha);
		$this->db->set("nombre", $id);
		$this->db->insert('temp');
	}

	



  
}
