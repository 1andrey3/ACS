<?php
class ContrasenaNueva extends CI_Model{
    function __construct(){
        parent:: __construct();
        $this -> load -> database();
    }
    function cambiar($id, $data){
        $this->db->query("UPDATE usuario SET contrasena = '$data'  WHERE id_usuario = $id");
    }
}