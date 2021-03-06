<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_gestion_usuarios extends CI_Model
{

  // CREA USUARIOS
  public function crear_usuario($data,$data2,$data3,$data4,$data5,$data6,$data7)
  {
    echo $data.$data2.$data3.$data4.$data5.$data6.$data7 ;
    $query = $this->db->query("INSERT INTO usuario(
      id_usuario,
      nombres,
      apellidos,
      rol,
      num_contacto,
      email,
      contrasena
    )
    VALUES(
      '$data',
      '$data2',
      '$data3',
      '$data4',
      '$data5',
      '$data6',
      '$data7'
    )
    ");
  }

  // BUSCA UN USUARIO POR SU ID
  public function buscar_usuario($data)
  {
    $query = $this->db->query("
      SELECT

        id_usuario,
        nombres,
        rol,
        apellidos,
        email,
        contrasena,
        num_contacto

      FROM
        usuario

      WHERE
        id_usuario = '$data'
    ");
    return $query->result();
  }

  // ACTUALIZA LA INFO DE UN USUARIO EN LA BASE DE DATOS
  public function actualizar_usuario($data,$data2,$data3,$data4,$data5,$data6,$data7)
  {
    $query = $this->db->query("
      UPDATE
        usuario
      SET
        nombres = '$data2',
        apellidos = '$data3',
        rol = '$data4',
        num_contacto = '$data5',
        email = '$data6',
        contrasena = '$data7'
      WHERE
        id_usuario = '$data'
    ");
  }
  // ELIMINA UN USUARIO DE LA BASE DE DATOS
  public function eliminar_usuario($data)
  {
    $query = $this->db->query("DELETE FROM usuario WHERE id_usuario = '$data'");

  }

  //Funcion que obtine los datos para poblar la tabla de la vista de actividades
  public function obtener_actividades(){
    $query=$this->db->query("
      SELECT
        aper.id_apertura,
        aper.id_zte AS id_zte,
        aper.id_tipo_trabajo,
        aper.id_usuario,
        CONCAT(tt.nombre_tipo_trabajo) AS tipo_de_trabajo,
        CONCAT(us.nombres,' ', us.apellidos) AS ingeniero_apertura 
        FROM apertura aper
        INNER JOIN tipo_trabajo tt
        ON
        aper.id_tipo_trabajo = tt.id_tipo_trabajo
        INNER JOIN usuario us
        ON 
        aper.id_usuario = us.id_usuario 
      ");
     // echo '<pre>';print_r($query->result());echo '</pre>';
    return $query->result();
  }
}
?>
