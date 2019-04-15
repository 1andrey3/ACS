<?php
?>
<style>
  .formularioVM{
    display:grid;
    height: 350px;
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
  .footerModal{
    display:inline;
    padding-left: 30px;
  }
</style>
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

<script>
  $(document).ready(function() {
    $('#tablaForm').DataTable( {
    } );

  }); 
//llamado a la base de datos
(async function load(){
  async function baseDatos(url){
    const base = await fetch(url).then( response => response.text());
    const data = await JSON.parse(base);
    return data;
  }
  // llamado a las tablas
  const objEstacion = await baseDatos('tablaJson');

  //boton Formulario
  const btn = document.querySelector('#formulario');
  btn.addEventListener('click', () => {
      const estacion = document.querySelector('#estacion');
      console.log(estacion);
      estacion.addEventListener('click', () => {
        const estacion2 = estacion.value;
        console.log(estacion2);
        for(let x = 0; x < objEstacion.length; x++){
          if(objEstacion[x].id_estacion == estacion2){
            document.getElementById('rSkype').value = objEstacion[x].region;
          }
        }
      });
    });
})();
  //botones 'tomar'
    const tomarDatos = document.querySelectorAll('#tomarDatos');
    for(tomar of tomarDatos){
      tomar.addEventListener('click', (evt) => {
        const boton = evt.target;
        console.log(boton.innerHTML);
        const d = boton.parentNode;
        const x = d.parentNode;
        console.log(x.childNodes[5].innerHTML);

        // enviar datos de la tabla a el modal
        //  document.getElementById('idSiteAccess').value = parseInt(x.childNodes[1].innerHTML);
        document.getElementById('fechaSolicitud').value = x.childNodes[3].innerHTML;
        let estacionCampo = document.getElementById('estacion').value = x.childNodes[5].innerHTML;
        let tecnologia = document.getElementById('tecnologia').value = parseInt(x.childNodes[7].innerHTML);
        let banda = document.getElementById('banda').value = parseInt(x.childNodes[9].innerHTML);
        document.getElementById('enteEjecutor').value = x.childNodes[11].innerHTML;
        document.getElementById('nGSkype').value = x.childNodes[13].innerHTML;
        document.getElementById('rSkype').value = x.childNodes[15].innerHTML;
        document.getElementById('personaSolicita').value = x.childNodes[17].innerHTML;
        document.getElementById('horaApertura').value = x.childNodes[19].innerHTML;
        document.getElementById('ingenieroCreadorG').value = x.childNodes[21].innerHTML;
        document.getElementById('incidente').value = x.childNodes[23].innerHTML;

        $("#estacion option[value="+ estacionCampo +"]").attr("selected",true);
        $("#banda option[value="+ banda +"]").attr("selected",true);
        $("#tecnologia option[value="+ tecnologia +"]").attr("selected",true);
        const estacion = document.querySelector('#estacion');
        console.log(x.childNodes[5].innerHTML);
      })
    }
    console.log(tomarDatos);
</script>