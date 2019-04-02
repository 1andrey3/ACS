<?php
class UserTable extends CI_Model{
    function __construct(){
        parent:: __construct();
        $this -> load -> database();
    }
    function Mostrar(){
        $DataT = $this->db->get('usuario');
        return $DataT->result_array();
    }
    function Insertar($data){
        var_dump($data);
        $this->db->query('INSERT INTO usuario(id_usuario,nombres,apellidos,email,num_contacto,rol) VALUES("'.$data[0].'","'.$data[1].'","'.$data[2].'","'.$data[3].'","'.$data[4].'","'.$data[5].'")');
    }
    public function actualizarCI($datos){   
        $this->db->query("UPDATE usuario SET nombres='$datos[1]', apellidos ='$datos[2]', email ='$datos[3]', num_contacto= '$datos[4]', rol = '$datos[5]'  WHERE id_usuario = $datos[0]");             
    }    
}
