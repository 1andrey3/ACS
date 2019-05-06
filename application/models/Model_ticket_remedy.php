<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_ticket_remedy extends CI_Model
{
  function __construct(){
      parent:: __construct();
      $this -> load -> database();
  }

  public function ingenieros()
  {
    $query = $this->db->query("SELECT id_usuario, nombres, apellidos, rol  FROM usuario WHERE rol = 'ingeniero interno' OR rol = 'ingeniero externo'");
    return $query->result();
  }
  public function consulta($data)
  {
    $consulta = $this->db->query(
      "SELECT
        a.c_estado_notificacion,
        a.c_sub_estado,
        s.Estacion,
        e.sitio,
        s.Tecnologia,
        t.nombre_tecnologia,
        s.Banda,
        b.nombre_banda,
        a.id_tipo_trabajo,
        tt.nombre_tipo_trabajo
      FROM
        actividad a
      JOIN
        sitio s ON a.id_vm_zte = s.id_vm_zte
      JOIN
        estacion e ON s.Estacion = e.id_estacion
      JOIN
        Tecnologia t ON s.Tecnologia = t.id_tecnologia
      JOIN
        banda b ON s.Banda = b.id_banda
      JOIN
        tipo_trabajo tt ON a.id_tipo_trabajo = tt.id_tipo_trabajo
      WHERE
        a.id_apertura = '$data'"
    );

    return  $consulta->result();
  }

  public function CrearTicketRemedy($data)
  {
    $query = $this->db->query(
      "INSERT INTO
        ticket_remedy(
          id_apertura,
          incidente,
          estado_ticket,
          subestado_ticket,
          tipo_afectacion,
          tipo_falla_final_tk,
          ingeniero_apertura,
          estado_notificacion_tk,
          grupo_soporte,
          inicio_afectacion,
          responsable_oym,
          responsable_tk,
          summary_remedy,
          comentario_tk,
          fin_afectacion,
          ingeniero_cierre_tk
        )
      VALUES
      (
        '".$data['id_apertura']."',
        '".$data['numIncidente']."',
        '".$data['estadoTicket']."',
        '".$data['subEstadoTicket']."',
        '".$data['tipoAfectacion']."',
        '".$data['tipoFalla']."',
        '".$data['ingenieroApertura']."',
        '".$data['estadoNotificacion']."',
        '".$data['grupoSoporte']."',
        '".$data['inicioAfectacion']."',
        '".$data['responsableOyM']."',
        '".$data['responsableTicket']."',
        '".$data['summaryRemedy']."',
        '".$data['comentarioTicket']."',
        '".$data['finAfectacion']."',
        '".$data['ingenieroCierre']."'
      )"
    );
    print_r($this->db->last_query());
  }

}
?>
