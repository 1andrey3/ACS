<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sitios extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
        $this->load->model('Formulario');
	}

	public function index() {
        $this->load->library('Datatables');
        $dt_authors = $this->datatables->init();
        $dt_authors->select('g.ID_Site_Access, g.F_H_Solicitud  , est.sitio AS Estacion, b.nombre_banda AS Banda, t.nombre_tecnologia AS Tecnologia, g.Ente_ejecutor, g.Nombre_grupo_skype, g.Regional_skype, g.Persona_solicita, g.Hora_apertura, g.Ingeniero_CreadorG, g.Incidente')->from('sitio g')->join('estacion est', 'g.Estacion = est.id_estacion')->join('banda b', 'g.Banda = b.id_banda')->join('tecnologia t', 'g.Tecnologia = t.id_tecnologia');
        $dt_authors
            ->style(array(
            'class' => 'table table-striped table-bordered',
            ))
            ->column('ID_Site_Access', 'ID_Site_Access')
            ->column('F_H_Solicitud', 'F_H_Solicitud')
            ->column('Estacion', 'Estacion')
            ->column('Banda', 'Banda')
            ->column('Tecnologia', 'Tecnologia')
            ->column('Ente_ejecutor', 'Ente_ejecutor')
            ->column('Nombre_grupo_skype', 'Nombre_grupo_skype')
            ->column('Regional_skype', 'Regional_skype')
            ->column('Persona_solicita', 'Persona_solicita')
            ->column('Ingeniero_CreadorG', 'Ingeniero_CreadorG')
            ->column('Incidente', 'Incidente');
        $this->datatables->create('dt_authors', $dt_authors);


        $data['title'] = "Listado de sitios";
        $data['estacion'] = $this->Formulario->recorridoEstacion();
		$data['tecnologia'] = $this->Formulario->recorridoTecnologia();
		$data['banda'] = $this->Formulario->recorridoBanda();
 		$this->load->view('parts/header',$data);
		$this->load->view('sitios');
		$this->load->view('parts/footer');
    }

    public function mostrar_sitios() {
        $data = $this->Formulario->recorridoGrupoVM();
        echo json_encode(array('data' => $data));
    }
}
