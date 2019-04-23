<?php
?>
<link rel="stylesheet" href="<?= base_url('assets/css/stylegrupoVM.css'); ?>">
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" id ="formulario">formulario</button><br><br>
<table class="table table-striped dataTable_camilo" id ="tablaForm">
  <thead>
    <tr>
      <th>ID_Site_Access</th>
      <th>Fecha y hora de solicitud</th>
      <th>ESTACIÓN</th>
      <th>TECNOLOGIA</th>
      <th>Banda</th>
      <th>Tipo De Trabajo</th>
      <th>Ente Ejecutor</th>
      <th>Nombre Del Grupo Skype</th>
      <th>Persona Que Solicita</th>
      <th>Hora De Apertura</th>
      <th>Ingeniero Creador De G</th>
      <th>Incidente</th>
      <th>Tomar Datos</th>
      <th>Ver Estado</th>
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
        <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal" id ="tomarDatos">tomar</button></td>
        <td><button class="btn btn-info"> </button></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title" align="center">Formulario creacion de Grupo de VM</h2>
      </div>
      <form action="<?= base_url('Welcome/datosGrupoVM') ?>" method="POST" >
      <div class="modal-body formularioVM" id="">
        <div class="botonesLaterales">
        </div>
        <div class="contenidoVM">
          <div class="navAsig">
          <ul class="nav nav-pills">
            <li class="active lin"><a href="#">Creación De Ventanas</a></li>
          </ul>
          </div>
          <div>
            <label for="">Fecha y hora de solicitud:</label><br>
            <input type="text" class="form-control" name="fechaSolicitud" id="fechaSolicitud">
          </div>
          <div>
            <label for="">ID_Site_Access:</label><br>
            <input type="number" class="form-control" name="idSiteAccess" id="idSiteAccess">
          </div>
          <div class="form-group">
            <label for="">ESTACIÓN:</label><br>
            <select class="form-control"  name="estacion" id ="estacion">
            <?php foreach($estacion as $key=>$row):?>
            <option id ="posicion" value="<?php echo $key+1 ?>"><?php echo $row['sitio']?> </option>
            <?php endforeach ?>
          </select>
          </div>
          <div class="form-group">
          <label for="">TECNOLOGIA:</label><br>
          <select class="form-control" name="tecnologia" id="tecnologia">
          <?php foreach($tecnologia as $key=>$row):?>
            <option  value="<?php echo $key ?>"><?php echo $row['nombre_tecnologia'] ?></option>
            <?php endforeach ?>
          </select>
          </div>
          <div class="form-group">
          <label for="">Banda:</label><br>
          <select class="form-control" name="banda" id="banda">
          <?php foreach( $banda as $key=>$row):?>
            <option value="<?php echo $key+1 ?>"><?php echo $row['nombre_banda'] ?></option>
            <?php endforeach ?>
          </select>
          </div>
          <div>
            <label for="">Ente Ejecutor:</label><br>
            <input type="text" class="form-control" name="enteEjecutor" id="enteEjecutor">
          </div>
          <div>
            <label for="">Nombre Del Grupo Skype</label><br>
            <input type="text" class="form-control" name="nGSkype" id="nGSkype">
          </div>
          <div class="form-group">
            <label for="">Regional Skype</label><br>
            <input type="text" class="form-control rsky" name="rSkype" id="rSkype">
          </select>
          </div>
          <div>
            <label for="">Persona Que Solicita</label><br>
            <input type="text" class="form-control" name="personaSolicita" id="personaSolicita">
          </div>
          <div>
            <label for="">Hora De Apertura</label><br>
            <input type="text" class="form-control" name="horaApertura" id="horaApertura">
          </div>
          <div>
            <label for="">Ingeniero Creador De G</label><br>
            <input type="text" class="form-control" name="ingenieroCreadorG" id="ingenieroCreadorG">
          </div>
          <div>
            <label for="">Incidente</label><br>
            <input type="text" class="form-control" name="incidente" id="incidente">
          </div>
        </div>
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
<script src="<?=base_url('assets/js/grupoVM.js') ?>"></script>