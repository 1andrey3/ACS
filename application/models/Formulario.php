<?php
class Formulario extends CI_Model{
    function __construct(){
        parent:: __construct();
        $this -> load -> database();

    }
    function recorridoEstacion(){
         $data= $this->db->query('SELECT * FROM estacion');
         return $data->result_array();
    }
    function recorridoTecnologia(){
        $data= $this->db->query('SELECT * FROM tecnologia');
         return $data->result_array();
    }
    function recorridoBanda(){
        $data= $this->db->query('SELECT * FROM  banda');
        return $data->result_array();
    }
    function recorridoGrupoVM(){
        $this->db->select('g.id_vm_zte, g.ID_Site_Access, g.F_H_Solicitud  , est.sitio AS Estacion, b.nombre_banda AS Banda, t.nombre_tecnologia AS Tecnologia, g.Ente_ejecutor, g.Nombre_grupo_skype, g.Regional_skype, g.Persona_solicita, g.Hora_apertura, g.Ingeniero_CreadorG, g.Incidente');
        $this->db->from('sitio g');
        $this->db->join('estacion est', 'g.Estacion = est.id_estacion');
        $this->db->join('banda b', 'g.Banda = b.id_banda');
        $this->db->join('tecnologia t', 'g.Tecnologia = t.id_tecnologia');
        $data = $this->db->get();
        return $data->result_array();
    }
    function guardarDatos($data){
        var_dump($data);
        $base = $this->db->query('INSERT INTO sitio (ID_Site_Access, F_H_Solicitud, Estacion, Tecnologia, Banda, Ente_ejecutor, Nombre_grupo_skype, Regional_skype, Persona_solicita, Hora_apertura, Ingeniero_CreadorG, Incidente) VALUES ("'.$data[0].'","'.$data[1].'","'.$data[2].'","'.$data[3].'","'.$data[4].'","'.$data[5].'","'.$data[6].'","'.$data[7].'","'.$data[8].'","'.$data[9].'","'.$data[10].'","'.$data[11].'")');
        var_dump($base);
    }
}