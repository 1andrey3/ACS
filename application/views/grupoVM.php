<?php
?>
<link rel="stylesheet" href="<?= base_url('assets/css/stylegrupoVM.css'); ?>">
<ul class="nav nav-tabs" style="margin: 30px 0px;">
    <li class="active"><a data-toggle="tab" href="#id_section_engineering">Sitios</a></li>
    <div style="display:flex; float:right;">
      <button data-toggle="modal" data-target="#nuevo_sitio" id="formulario" href="#" class="boton_acces dt-button btn-cami_warning " target="_blank" style="width: 214px;">Nuevo Sitio</button>
    </div>
</ul>

<table class="table table-striped dataTable_camilo" id ="tablaForm">
  <thead>
    <tr>
      <th>ID Site Access</th>
      <th>Fecha y hora de solicitud</th>
      <th>Estación</th>
      <th>Tecnología</th>
      <th>Banda</th>
      <th>Tipo de Trabajo</th>
      <th>Ente Ejecutor</th>
      <th>Nombre del Grupo Skype</th>
      <th>Persona Que Solicita</th>
      <th>Hora de Apertura</th>
      <th>Ingeniero Creador De G</th>
      <th>Incidente</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($grupoSitios as $key=>$row): ?>
    <tr id = "trs">
        <td id ="ths"> <?php echo $row['ID_Site_Access'] ?></td>
        <td id ="ths"> <?php echo $row['F_H_Solicitud'] ?></td>
        <td id ="ths"> <?php echo $row['Estacion'] ?></td>
        <td id ="ths"> <?php echo $row['Tecnologia'] ?></td>
        <td id ="ths"> <?php echo $row['Banda'] ?></td>
        <td id ="ths"> <?php echo $row['Ente_ejecutor'] ?></td>
        <td id ="ths"> <?php echo $row['Nombre_grupo_skype'] ?></td>
        <td id ="ths"> <?php echo $row['Regional_skype'] ?></td>
        <td id ="ths"> <?php echo $row['Persona_solicita'] ?></td>
        <td id ="ths"> <?php echo $row['Hora_apertura'] ?></td>
        <td id ="ths"> <?php echo $row['Ingeniero_CreadorG'] ?></td>
        <td id ="ths"> <?php echo $row['Incidente'] ?></td>
        <td id ="ths">
          <button class="btn btn-info" data-toggle="modal" data-target="#nuevo_sitio" id ="tomarDatos"><i class="fa fa-copy"></i></button>
          <a href="<?= base_url('Vm/index') ?>" class='btn btn-info'><i class="fa fa-list-alt"></i></i></a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<!-- Modal -->
<!-- <div id="nuevo_sitio" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title" align="center">Formulario creacion de Grupo de VM</h2>
      </div>

      <div class="modal-footer footerModal">
        <div clas="divEnvio">
          <input type="submit" class="btn btn-danger divBtnEnvio">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>

 -->



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
                <form action="<?= base_url('Welcome/datosGrupoVM') ?>" method="POST" >
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
                        <select class="form-control" name="tecnologia" id="tecnologia">
                          <?php foreach($tecnologia as $key=>$row):?>
                            <option  value="<?php echo $key ?>"><?php echo $row['nombre_tecnologia'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 mt-20">
                      <label for="">Banda:</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-scale"></i></span>
                        <select class="form-control" name="banda" id="banda">
                          <?php foreach( $banda as $key=>$row):?>
                            <option value="<?php echo $key+1 ?>"><?php echo $row['nombre_banda'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 mt-20">
                      <label for="">Ente Ejecutor:</label><br>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-text-size"></i></span>
                        <input type="text" class="form-control" name="enteEjecutor" id="enteEjecutor" aria-describedby="basic-addon1">
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
                        <input type="text" class="form-control rsky" name="rSkype" id="rSkype" aria-describedby="basic-addon1">
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


  <script src="<?=base_url('assets/js/grupoVM.js') ?>"></script>