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

    public function enviarPuntoControl($datos){
        $this->db->query("UPDATE apertura SET pc_ingeniero_control='$datos[1]' pc_hora_revision='$datos[2]' oc_comentarios_control='$datos[3]' WHERE id_apertura='$datos[0]'");
    }
    public function enviarCierre($datos){
        $this->db->query("UPDATE apertura SET c_ret='$datos[1]' c_ampliacion_dualbeam='$datos[2]' c_sectores_dualbeam='$datos[3]' c_tipo_solucion='$datos[4]' c_estadoVM='$datos[5]' c_sub_estado='$datos[6]' c_inicio_vm_encontro='$datos[7]' c_falla_final='$datos[8]' c_tipo_falla_final='$datos[9]' c_vista_mm='$datos[10]' c_estado_notificacion='$datos[11]' c_ingeniero_cierre='$datos[12]' c_hora_atencion_cierre='$datos[13]'  c_hora_cierre_confirmado='$datos[14]' c_comentario_cierre='$datos[15]' WHERE id_apertura='$datos[0]'");
    }
}
