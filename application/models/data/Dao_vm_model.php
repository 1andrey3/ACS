<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dao_vm_model extends CI_Model {

	public function __construct(){

	}
	/*public function obtener_actividades_sitio($id_site){
		$query=$this->db->query("
			SELECT 
			gv.ID_Site_Access,
			gv.
			")
	}*/
	public function obtener_tipos_trabajo(){
		$query=$this->db->query("
			SELECT
			tt.id_tipo_trabajo,
			tt.nombre_tipo_trabajo
			FROM tipo_trabajo tt
			");
		return $query->result();
	}

	

}