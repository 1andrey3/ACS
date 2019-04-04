<?php
?>
<style>
  .formularioVM{
    display:grid;
    height: 450px;
    width: 100%
    grid-template-columns: repeat(5, 1fr);
    grid-template-rows: repeat(2, 1fr);
    grid-gap: 10px;
    background-color: blue;
  }
  .botonesLaterales{
    grid-column: 1 / 2;
    grid-row: 1 / 3;
  }
  .btnLat{
    display: block;
    margin:  10px auto;
    width: 100%;
    height: 20%;
  }
  .contenidoVM{
    grid-column: 2 / 6;
    grid-row: 1 / 3;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: repeat(8, 1fr);
    grid-gap: 5px;
    font-size: 12px;
    color:white;
  }
  .BnuevoVM{
    grid-column: 1 / 2;
    grid-row: 2 / 7;
    padding-top: 10px;
    color: #333;
  }
  .btnNuevo{
    height: 90%;
    width: 100%;

  }
  .navAsig{
    grid-column: 1 / 5;
    display: inline;
    color: white;
  }
  .divEnvio{
    grid-column: 3 / 5;
    grid-row: 6 / 7;
  }
  .divBtnEnvio{
    background: #34495e;
    align-self: center;
    width: 220px;
    height: 100%;
  }
  .lin{
    color: black;
  }
</style>
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">formulario</button>
<table class="table table-striped">
  <thead>
    <th>Fecha y hora de solicitud</th>
    <th>ID_Site_Access</th>
    <th>ESTACIÓN</th>
    <th>TECNOLOGIA</th>
    <th>Banda</th>
    <th>Tipo De Trabajo</th>
    <th>Ente Ejecutor</th>
    <th>Nombre Del Grupo Skype</th>
    <th>Regional Skype</th>
    <th>Persona Que Solicita</th>
    <th>Hora De Apertura</th>
    <th>Ingeniero Creador De G</th>
    <th>Incidente</th>
  </thead>
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
            <button class="btnLat">Realizar Apertura VM</button>
            <button class="btnLat">Realizar Punto De Control</button>
            <button class="btnLat">Realizar Cierre de VM</button>
            <button class="btnLat">Tickets Remedy</button>
        </div>
        <div class="contenidoVM">
          <div class="BnuevoVM">
            <button class="btnNuevo">Realizar Nueva VM</button>
          </div>
          <div class="navAsig">
          <ul class="nav nav-pills">
            <li class="active lin"><a href="#">Creación De Ventanas</a></li>
            <li><a href="#" class="lin">Asignar Ingenieros / Rechazar VM</a></li>
          </ul>
          </div>
          <div>
            <label for="">Fecha y hora de solicitud:</label><br>
            <input type="date" class="form-control" name="fechaSolicitud">
          </div>
          <div>
            <label for="">ID_Site_Access:</label><br>
            <input type="text" class="form-control" name="idSiteAccess">
          </div>
          <div>
            <label for="">ESTACIÓN:</label><br>
            <input type="text" class="form-control" name="estacion" >
          </div>
          <div class="form-group">
          <label for="">TECNOLOGIA:</label><br>
          <select class="form-control" name="tecnologia">
            <option>2G</option>
            <option>2G/3G</option>
            <option>2G/3G/LTE</option>
            <option>3G/LTE</option>
            <option>LTE</option>
          </select>
          </div>
          <div class="form-group">
          <label for="">Banda:</label><br>
          <select class="form-control" name="banda">
            <option>1900MHz</option>
            <option>1900MHz/2600MHz</option>
            <option>2600MHz</option>
            <option>850MHz</option>
            <option>850MHz/1900MHz</option>
            <option>850MHz/1900MHz/2600MHz</option>
            <option>850MHz/2600MHz</option>
          </select>
          </div>
          <div>
            <label for="">Tipo De Trabajo:</label><br>
            <input type="text" class="form-control" name="typeTrabajo">
          </div>
          <div>
            <label for="">Ente Ejecutor:</label><br>
            <input type="text" class="form-control" name="enteEjecutor">
          </div>
          <div>
            <label for="">Nombre Del Grupo Skype</label><br>
            <input type="text" class="form-control" name="nGSkype">
          </div>
          <div class="form-group">
            <label for="">Regional Skype</label><br>
            <select class="form-control" name="rSkype">
            <option>Centro</option>
            <option>Costa</option>
            <option>Nor Occidente</option>
            <option>Oriente</option>
            <option>Sur Occidente</option>
          </select>
          </div>
          <div>
            <label for="">Persona Que Solicita</label><br>
            <input type="text" class="form-control" name="personaSolicita">
          </div>
          <div>
            <label for="">Hora De Apertura</label><br>
            <input type="text" class="form-control" name="horaApertura">
          </div>
          <div>
            <label for="">Ingeniero Creador De G</label><br>
            <input type="text" class="form-control" name="ingenieroCreadorG">
          </div>
          <div>
            <label for="">Incidente</label><br>
            <input type="text" class="form-control" name="incidente">
          </div>
          <div clas="divEnvio">
            <input type="submit" class="btn btn-danger divBtnEnvio">
          </div>
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>    
