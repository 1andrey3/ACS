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
        var_dump($datos);
        $this->db->query("UPDATE actividad SET pc_ingeniero_control='$datos[1]', pc_hora_revision='$datos[2]', pc_comentarios_control='$datos[3]', estado_vm='$datos[4]' WHERE id_apertura='$datos[0]'");
    }
    public function enviarCierre($datos){
        $this->db->query("UPDATE actividad SET c_ret='$datos[1]', c_ampliacion_dualbeam='$datos[2]', c_sectores_dualbeam='$datos[3]', c_tipo_solucion='$datos[4]', c_estadoVM='$datos[5]', c_sub_estado='$datos[6]', c_inicio_vm_encontro='$datos[7]', c_fallla_final='$datos[8]', c_tipo_falla_final='$datos[9]', c_vista_mm='$datos[10]', c_estado_notificacion='$datos[11]', c_ingeniero_cierre='$datos[12]', c_hora_atencion_cierre='$datos[13]',  c_hora_cierre_confirmado='$datos[14]', c_comentario_cierre='$datos[15]', estado_vm='$datos[16]' WHERE id_apertura='$datos[0]'");
    }
    public function tableActividades(){
        $data = $this->db->query('SELECT * FROM actividad');
        return $data->result_array();
    } 
    public function gruposDeVM($data){
        // var_dump('<br>'. $data);
         $grupoVM = $this->db->query("SELECT Estacion, Tecnologia, Banda,Ente_ejecutor FROM sitio WHERE id_vm_zte='$data'");
         return $grupoVM->result_array();
    } 
    public function estados_modal_actividades($data_zte){ 
        // var_dump('<br>'. $data);
         $grupoVM = $this->db->query("SELECT s.id_vm_zte, e.sitio as Estacion, t.nombre_tecnologia as Tecnologia, b.nombre_banda as Banda, tt.nombre_tipo_trabajo as Ente_ejecutor
         FROM sitio s
         INNER JOIN estacion e ON s.Estacion = e.id_estacion
         INNER JOIN tecnologia t ON s.Tecnologia = t.id_tecnologia
         INNER JOIN banda b ON s.Banda = b.id_banda
         INNER JOIN actividad a ON a.id_vm_zte = s.id_vm_zte
         INNER JOIN tipo_trabajo tt ON tt.id_tipo_trabajo = a.id_tipo_trabajo
         WHERE s.id_vm_zte = '$data_zte'");
         return $grupoVM->result_array();
    } 
    public function modal_Actividades($data){ 
        // var_dump('<br>'. $data);
         $grupoVM = $this->db->query("SELECT s.id_vm_zte, e.sitio as Estacion, t.nombre_tecnologia as Tecnologia, b.nombre_banda as Banda, s.Ente_ejecutor as ente_ejecutor
         FROM sitio s
         INNER JOIN estacion e ON s.Estacion = e.id_estacion
         INNER JOIN tecnologia t ON s.Tecnologia = t.id_tecnologia
         INNER JOIN banda b ON s.Banda = b.id_banda
         WHERE s.id_vm_zte = '$data'");
         return $grupoVM->result_array();
    } 
    public function insertar_actividades($data){
        $this->db->query('INSERT INTO actividad(id_vm_zte, estado_vm, ap_motivo_estado, ap_ingeniero_apertura, ap_inicio_programado_sa, ap_fin_programado_sa, ap_tecnologias_afectadas, ap_bandas_afectadas, ap_persona_solici_vm_lc, ap_ente_ejecutor, ap_fm_nokia, ap_fm_claro, ap_telefono_fm, ap_wp, ap_crq, ap_id_rf_tool, ap_bsc_name, ap_rnc_name, ap_servidor_mss, ap_integrador_backoffice, ap_regional_cluster, ap_vistas_mm, ap_hora_atencion_vm, ap_hora_inicio_real_vm, ap_contratista, ap_comentarios_apertura, id_tipo_trabajo) VALUES("'.$data[0].'","'.$data[1].'","'.$data[2].'","'.$data[3].'","'.$data[4].'","'.$data[5].'","'.$data[6].'","'.$data[7].'","'.$data[8].'","'.$data[9].'","'.$data[10].'","'.$data[11].'","'.$data[12].'","'.$data[13].'","'.$data[14].'","'.$data[15].'","'.$data[16].'","'.$data[17].'","'.$data[18].'","'.$data[19].'","'.$data[20].'","'.$data[21].'","'.$data[22].'","'.$data[23].'","'.$data[24].'","'.$data[25].'","'.$data[26].'")');
        print_r($this->db->last_query());exit('asta');
    }
}
