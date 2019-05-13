<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
<?php
  defined('BASEPATH') or exit('No direct script access allowed'); 
?>

<link rel="stylesheet" href="<?= base_url('assets/css/stylegrupoVM.css'); ?>">
<ul class="nav nav-tabs" style="margin: 30px 0px;">
    <li class="active"><a data-toggle="tab" href="#id_section_engineering">Sitios</a></li>
    <div style="display:flex; float:right;">
      <button data-toggle="modal" data-target="#nuevo_sitio" id="formulario" href="#" class="boton_acces dt-button btn-cami_warning " target="_blank" style="width: 214px;">Nuevo Sitio</button>
    </div>
</ul>

  <div id="nuevo_sitio" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
          <h3 class="modal-title" id="modal_title">Crear Nuevo Sitio</h3>
        </div>
        <div class="modal-body">
          <div class="container_general">
            <div class="contenido-1">
                <form action="<?= base_url('Welcome/datosGrupoVM') ?>" method="POST" autocomplete="off">
                  <div class="row">
                    <div class="col-lg-4 mt-20">
                      <label for="">Fecha y hora de solicitud:</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type="text" class="form-control"  name="fechaSolicitud" id="fechaSolicitud" aria-describedby="basic-addon1">
                      </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-4 mt-20">
                      <label for="">ID_Site_Access:</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><strong>ID</strong></span>
                        <input type="number" class="form-control" name="idSiteAccess" id="idSiteAccess" aria-describedby="basic-addon1">
                      </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-4 mt-20">
                      <label for="">Estación:</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <select class="form-control"  name="estacion" id ="estacion">
                          <option value=""></option>
                          <?php foreach($estacion as $key=>$row):?>
                          <option id ="posicion" value="<?php echo $key+1 ?>"><?php echo $row['sitio']?> </option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 mt-20">
                      <label for="">Tecnología:</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-flash"></i></span>
                        <select class="form-control" name="tecnologia" id="tecnologia" aria-describedby="basic-addon1">
                          <option value=""></option>
                          <?php foreach($tecnologia as $key=>$row):?>
                            <option  value="<?php echo $key+1 ?>"><?php echo $row['nombre_tecnologia'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 mt-20">
                      <label for="">Banda:</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-scale"></i></span>
                        <select class="form-control" name="banda" id="banda" aria-describedby="basic-addon1">
                          <option value=""></option>
                          <?php foreach( $banda as $key=>$row):?>
                            <option value="<?php echo $key+1 ?>"><?php echo $row['nombre_banda'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 mt-20">
                      <label for="">Ente Ejecutor:</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" ><i class="glyphicon glyphicon-text-size"></i></span>
                        <input type="number" class="form-control" name="enteEjecutor" id="enteEjecutor" aria-describedby="basic-addon1">
                      </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 mt-20">
                      <label for="">Nombre Del Grupo Skype</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-font"></i></span>
                        <input type="text" class="form-control" name="nGSkype" id="nGSkype" aria-describedby="basic-addon1">
                      </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 mt-20">
                      <label for="">Regional Skype</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-map-marker"></i></span>
                        <input type="text" class="form-control rsky" name="rSkype" id="rSkype" aria-describedby="basic-addon1" readonly>
                      </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 mt-20">
                      <label for="">Persona Que Solicita</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="personaSolicita" id="personaSolicita" aria-describedby="basic-addon1">
                      </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 mt-20">
                      <label for="">Hora De Apertura</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-time"></i></span>
                        <input type="text" class="form-control" name="horaApertura" id="horaApertura" aria-describedby="basic-addon1">
                      </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 mt-20">
                      <label for="">Ingeniero Creador De Grupo</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control"  name="ingenieroCreadorG" id="ingenieroCreadorG" aria-describedby="basic-addon1">
                      </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 mt-20">
                      <label for="">Incidente</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
                        <input type="text" class="form-control"  name="incidente" id="incidente" aria-describedby="basic-addon1">
                      </div>
                    </div><!-- /.col-lg-4 -->
                  </div><!-- /.row -->

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer modal-dialog modal-lg">
      <button type="button" class="btn btn-default" data-dismiss="modal"><i class='glyphicon glyphicon-remove'></i>&nbsp;Cancelar</button>
      <button type="submit" class="btn btn-success" ><i class='glyphicon glyphicon-send'></i>&nbsp;Crear</button>
    </div>
    </form>
  </div>
  <?php
  // $this->datatables->generate('dt_authors');
  // $this->datatables->jquery('dt_authors');
?>
<form action="Vm/index" method="POST">
  <input type="text" id="idZteFila" name="idZteFila">
  <div id="section_tabla_sitios">
    <table class="table table-striped dataTable_camilo" id ="tabla_sitios">
      <thead>
        <tr>      
          <th>ID vm zte</th>
          <th>ID Site Access</th>
          <th>Fecha y hora de solicitud</th>
          <th>Estación</th>
          <th>Tecnología</th>
          <th>Banda</th>
          <th>Ente Ejecutor</th>
          <th>Nombre del Grupo Skype</th>
          <th>Regional Skype</th>
          <th>Persona Que Solicita</th>
          <th>Hora de Apertura</th>
          <th>Ingeniero Creador De Grupo</th>
          <th>Incidente</th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>
</form>
<script>
  var base_url = "<?= base_url(); ?>";
  document.getElementById('idZteFila').style.display = "none";

  $(document).ready(function() {
    listar();
    });

    const listar = function(){
      const tabla = $('#tabla_sitios').DataTable( { 
        ajax: base_url + "Sitios/mostrar_sitios",
        columns: [
            { "data": "id_vm_zte" },
            { "data": "ID_Site_Access" },
            { "data": "F_H_Solicitud" },
            { "data": "Estacion" },
            { "data": "Tecnologia" },
            { "data": "Banda" },
            { "data": "Ente_ejecutor" },
            { "data": "Nombre_grupo_skype" },
            { "data": "Regional_skype" },
            { "data": "Persona_solicita" },
            { "data": "Hora_apertura" },
            { "data": "Ingeniero_CreadorG" },
            { "data": "Incidente" },
            {"defaultContent": "<button type='button' class='btn btn-info' data-toggle= modal  data-target='#nuevo_sitio' id ='tomarDatos' title='Tomar Datos'><i class='fa fa-copy'></i></button><button type='' id='vista_actividades' title ='Estados' class='btn btn-info'><i class='fa fa-list-alt'></i></i></button>"}
        ],
      });
      obtener_data_fila('#tabla_sitios tbody', tabla)
      enviar_dato('#tabla_sitios tbody', tabla)
    }
    const obtener_data_fila = function(tbody, table){
			$(tbody).on('click','button#tomarDatos', function(){
				const data = table.row($(this).parents('tr')).data();
        console.log(data);
        document.getElementById('fechaSolicitud').value = data.F_H_Solicitud;
        let estacionCampo = document.getElementById('estacion').value = 3;
        let tecnologia = document.getElementById('tecnologia').value = parseInt(data.Tecnologia);
        let banda = document.getElementById('banda').value = parseInt(data.Banda);
        document.getElementById('enteEjecutor').value = data.Ente_ejecutor;
        document.getElementById('nGSkype').value = data.Nombre_grupo_skype;
        document.getElementById('rSkype').value = data.Regional_skype;
        document.getElementById('personaSolicita').value = data.Persona_solicita;
        document.getElementById('horaApertura').value = data.Hora_apertura;
        document.getElementById('ingenieroCreadorG').value = data.Ingeniero_CreadorG;
        document.getElementById('incidente').value = data.Incidente;
        // $("#estacion option[value='" + estacionCampo + "']").attr("selected",true);
        // $("#banda option[value=" + banda + "]").attr("selected",true);
        // $("#tecnologia option[value="+ tecnologia +"]").attr("selected",true);
			})
    }
    
    const enviar_dato = function(tbody, table){
      $(tbody).on('click','button#vista_actividades', function(){
				const data = table.row($(this).parents('tr')).data();
        console.log(data.id_vm_zte);
        document.getElementById('idZteFila').value = data.id_vm_zte;
			})
    }
</script>
  <!-- <script src="<?=base_url('assets/js/grupoVM.js') ?>"></script> -->
