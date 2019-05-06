<style media="screen">
body{
  padding: 0;
  margin: 0;
}
.footerF{
  position: relative;
}
.ComentarioCierre{
  background: linear-gradient(#084c6f,#03557f);
}
.ComentarioCierre label{
  color: white;
}
.boton-remedy{
  cursor: pointer;
  background: #054261;
  margin-left: 10px;
  border: 1px solid white;
}
.boton-remedy:hover{
  transition: .2s;
  background: #0d3246;
  box-shadow: 0 0 20px 2px #5de5ff;
}
.boton-remedy:active{
  transition: .2s;
  background: #0d1c44;
}
.boton-remedy p{
  margin: 10px 0 !important;
}
.headerInfo div select:focus{
  background:#7b4 !important;
  color:white !important;
}
.boton_acces{
  margin-left: 15%!important;
  margin-bottom: 0px;
  width: 300px;
  height: auto;
}
.contenedor_input_crear_ticket{
  border: 1px solid silver;
  text-align: center;
  margin: 5px 4px;
  padding: 5px;
  color: white;
  float: left;
  height:70px;
}
.contenedor_input_crear_ticket select,
.contenedor_input_crear_ticket input{
  background: #557788b3;
  border: 1px solid white;
  outline: unset;
  cursor:pointer;
}
.contenedor_input_crear_ticket select option
{
  background: #084c6f !important;
}
.xD{
  outline: none;
width: 100%;
border-radius: 8px;
height: 30px;
padding: 0 5px;
border: 1px solid #aaa;
}

</style>
<script type="text/javascript">
  var id_actividad  = '<?php echo($id_actividad); ?>';
</script>
<div class="row contentFormsAcces headerInfo" style="padding-bottom:20px;">
    <div class="col-sm-5 firstSection">
        <section class="titlex row">
            <h3 class="col-sm-6">Incidente Remedy</h3>
            <section class="col-sm-3 t-a-c idZTE">
                <i class="fa fa-barcode"></i>
                <label for="idZTE">Id ZTE</label><br>
                <span class="idZTEfill"></span>
            </section>
        </section>
        <div class="row">
            <div class="form-group col-sm-8 t-a-c">
                <span>
                    <i class="fa fa-map-marker" aria-hidden="true"></i> <label for="nombreEstacion">Estación</label>
                </span>
                <input disabled name="nombreEstacion" placeholder="&#xf041;" id="nombreEstacion" type="text" class="iconPlaceholder inputStyle" value="">
            </div>
            <div class="form-group col-sm-4 t-a-c">
                <span>
                    <label for="bandasFrecuencia">Banda</label> <i class="fa fa-podcast" aria-hidden="true"></i>
                </span>
                <input disabled name="bandasFrecuencia" placeholder="&#xf041;" id="bandasFrecuencia" type="text" class="iconPlaceholder inputStyle" value="">
            </div>
            <div class="form-group col-sm-4 t-a-c">
                <span>
                    <i class="fa fa-signal"></i> <label for="tecnologia">Tecnología</label>
                </span>
                <input disabled name="tecnologia" placeholder="&#xf041;" id="tecnologia" type="text" class="iconPlaceholder inputStyle" value="">
            </div>
            <div class="form-group col-sm-8 t-a-c">
                <span>
                    <label for="tipoTrabajo">Tipo de Trabajo</label> <i class="fa fa-sitemap"></i>
                </span>
                <input disabled name="tipoTrabajo" placeholder="&#xf041;" id="tipoTrabajo" type="text" class="iconPlaceholder inputStyle" value="">
            </div>
        </div>
    </div>
    <div class="col-sm-6 secondSection">
        <fieldset>
          <legend>Opciones</legend>
            <div class="row t-a-c" style="margin-top: -2em;">
                <span class="col-sm-4">
                    <label for="estadoActual">Estado Notificación</label>
                </span>
                <div class="col-sm-7">
                  <select id="estado" name="tecnoloia" style="width:100%;">
                  <option value="">Seleccione...</option>
                  <option value="si">SI</option>
                  <option value="no">NO</option>
                  <option value="na">N/A</option>
                  </select>
                </div>
            </div>
            <div class="row t-a-c">
                <span class="col-sm-4">
                    <label for="subEstado">Sub-Estado</label>
                </span>
                <div class="col-sm-7">
                  <select id="subEstado" name="tecnoloia" style="width:100%;">
                  <option value="">Seleccione...</option>
                  <option value="si">SI</option>
                  <option value="no">NO</option>
                  <option value="na">N/A</option>
                  </select>
                </div>
            </div>
        </fieldset>
    </div>
</div>

<div class="container">
  <div class="col-sm-4 cont_ticket">
    <h3 style="margin:0; line-height:1; margin-bottom:20px;">Tickets Remedy</h3>
  </div>
  <div style="display:flex; float:right;">
    <div class=""style=" width:250px;">
      <a id="NuevoTicket" href="#" class="boton_acces dt-button btn-cami_warning " >Nuevo Ticket</a>
    </div>
    <div class=""style=" width:250px;">
      <a data-toggle='modal' data-target='#creacion_ticket'id="GuardarTicket" href="#" class="boton_acces dt-button btn-cami_warning " target="_blank">Guardar TK</a>
    </div>
  </div>
<br>
<br>
<div class="" style="margin-bottom: 20px; padding:20px; box-shadow: 0px 2px 15px -5px grey;">
  <div class="col-sm-12 t-a-c" style="border-bottom:1px solid #ccc;">
    <h3>Ticket #1</h3>
  </div>
  <br>
  <div class="row" style="padding-top:60px;">

      <div class="form-group col-sm-4 t-a-c">
          <span>
            <label for="nombreEstacion">Número del incidente</label>
          </span>
          <select id="numIncidente" class="xD" name="tecnoloia" style="width:100%;">
          <option value="">Seleccione...</option>
          <option value="si">SI</option>
          <option value="no">NO</option>
          <option value="na">N/A</option>
          </select>
      </div>
      <div class="form-group col-sm-4 t-a-c">
          <span>
              <label for="bandasFrecuencia">Estado del Ticket</label>
          </span>
          <select id="estadoTicket" class="xD" name="tecnoloia" style="width:100%;">
          <option value="">Seleccione...</option>
          <option value="abierto">Abierto</option>
          <option value="cancelado">Cancelado</option>
          <option value="cerrado">Cerrado</option>
          </select>
      </div>
      <div class="form-group col-sm-4 t-a-c">
          <span>
            <label for="tecnologia xD">Sub Estado (Ticket)</label>
          </span>
          <select id="subEstadoTicket" class="xD" name="tecnoloia" style="width:100%;">
          <option value="">Seleccione...</option>
          <option value="Afectacion Activa">Afectacion Activa</option>
          <option value="Afectacion Finalizada">Afectacion Finalizada</option>
          <option value="Degradacion Activa">Degradacion Activa</option>
          <option value="Degradacion Superada">Degradacion Superada</option>
          <option value="Exitoso">Exitoso</option>
          <option value="No Exitoso">No Exitoso</option>
          <option value="Notificacion Activa">Notificacion Activa</option>
          <option value="Notificacion Finalizada">Notificacion Finalizada</option>
          </select>
      </div>


      <div class="form-group col-sm-6 t-a-c">
          <span>
              <label for="tipoTrabajo">Tipo de Afectación</label>
          </span>
          <select id="tipoAfectacion" class="mostrar_tecnologias xD" name="tecnoloia" style="width:100%;">
          <option value="">Seleccione...</option>
          <option value="Afectacion de servicio">Afectacion de servicio</option>
          <option value="Notificacion">Notificacion</option>
          <option value="Performance - Degradacion">Performance - Degradacion</option>
          </select>
      </div>
      <div class="form-group col-sm-6 t-a-c">
          <span>
            <label for="nombreEstacion">Tipo de Falla Final (Ticket)</label>
          </span>
          <select id="tipoFalla" class="mostrar_tecnologias xD" name="tecnoloia" style="width:100%;">
          <option value="">Seleccione...</option>
          <option value="Actividad Inconclusa">Actividad Inconclusa</option>
          <option value="Actividad No Ejecutada">Actividad No Ejecutada</option>
          <option value="Alarmas de Antenna Line Failure">Alarmas de Antenna Line Failure</option>
          <option value="Alarmas de Rx Sistema Radiante">Alarmas de Rx Sistema Radiante</option>
          <option value="Alarmas de Sincronismo">Alarmas de Sincronismo</option>
          <option value="Alarmas Externas">Alarmas Externas</option>
          <option value="Alarmas TX">Alarmas TX</option>
          <option value="Cableado E1">Cableado E1</option>
          <option value="Degradacion KPIs">Degradacion KPIs</option>
          <option value="Envio de Evidencias">Envio de Evidencias</option>
          <option value="Falla de equipo">Falla de equipo</option>
          <option value="Licencias">Licencias</option>
          <option value="N/A">N/A</option>
          <option value="Power">Power</option>
          <option value="RET Antenna Control Failure">RET Antenna Control Failure</option>
          <option value="Rollback">Rollback</option>
          <option value="Sin Conexión Remota">Sin Conexión Remota</option>
          <option value="Sin Trafico">Sin Trafico</option>
          <option value="Sincronismo">Sincronismo</option>
          <option value="Sitio Fuera de Servicio">Sitio Fuera de Servicio</option>
          <option value="TRX Fuera de servicio">TRX Fuera de servicio</option>

          </select>
      </div>


      <div class="form-group col-sm-6 t-a-c">
          <span>
            <label for="nombreEstacion">Ingeniero Apertura Ticket</label>
          </span>
          <select id="ingenieroApertura" class="mostrar_ingenieros xD" name="tecnoloia" style="width:100%;">
          <option value="">Seleccione...</option>
          </select>
      </div>
      <div class="form-group col-sm-6 t-a-c">
          <span>
            <label for="nombreEstacion">Estado Notificación (Ticket)</label>
          </span>
          <select id="estadoNotificacion" class="mostrar_tecnologias xD" name="tecnoloia" style="width:100%;">
          <option value="">Seleccione...</option>
          <option value="Actividad notificada">Actividad notificada</option>
          <option value="No notificable">No notificable</option>
          <option value="Pendiente Notificar">Pendiente Notificar</option>
          </select>
      </div>


      <div class="form-group col-sm-8 t-a-c">
          <span>
            <label for="nombreEstacion">Grupo Soporte</label>
          </span>
          <input  name="nombreEstacion" placeholder="" id="grupoSoporte" type="text" class="iconPlaceholder xD" value="">
      </div>
      <div class="form-group col-sm-4 t-a-c">
          <span>
            <label for="nombreEstacion">Inicio Afectación</label>
          </span>
          <input  name="nombreEstacion" placeholder="" id="inicioAfectacion" type="text" class="iconPlaceholder xD" value="">
      </div>


      <div class="form-group col-sm-8 t-a-c">
          <span>
            <label for="nombreEstacion">Responsable OyM</label>
          </span>
          <select id="responsableOyM" class="mostrar_ingenieros xD" name="tecnoloia" style="width:100%;">
          <option value="">Seleccione...</option>
          </select>
      </div>
      <div class="form-group col-sm-4 t-a-c">
          <span>
            <label for="nombreEstacion">Responsable de Ticket</label>
          </span>
          <select id="responsableTicket" class=" xD" name="tecnoloia" style="width:100%;">
          <option value="">Seleccione...</option>
          <option value="si">CLARO</option>
          <option value="no">NOKIA</option>
          </select>
      </div>


      <div class="form-group col-sm-6 t-a-c">
          <span>
            <label for="nombreEstacion">Summary Remedy</label>
          </span>
          <input  name="nombreEstacion" placeholder="" id="summaryRemedy" type="text" class="iconPlaceholder xD" value="" style="height:60px ;">

      </div>
      <div class="form-group col-sm-6 t-a-c">
          <span>
            <label for="nombreEstacion">Responsable de la Solucion</label>
          </span>
          <input  name="nombreEstacion" placeholder="FM Claro:" id="FMClaro" type="text" class="iconPlaceholder xD" value="">
          <input  name="nombreEstacion" placeholder="FM Nokia:" id="FMNokia" type="text" class="iconPlaceholder xD" value="">

      </div>


      <div class="form-group col-sm-12 t-a-c">
          <span>
            <label for="nombreEstacion">Comentario de Ticket</label>
          </span>
          <!-- <input  name="nombreEstacion" placeholder="&#xf041;" id="nombreEstacion" type="text" class="iconPlaceholder inputStyle" value=""> -->
          <textarea name="name" id="ComentarioTicket" class="" rows="8" cols="80" style="width:100%; padding:5px;"></textarea>
      </div>


      <div class="form-group col-sm-4 t-a-c">
          <span>
            <label for="nombreEstacion">Fin Afectación</label>
          </span>
          <input  name="nombreEstacion" placeholder="" id="FinAfectacion" type="text" class="iconPlaceholder xD" value="">
      </div>
      <div class="form-group col-sm-8 t-a-c">
          <span>
            <label for="nombreEstacion">Ingeniero Cierre de Ticket</label>
          </span>
          <select id="ingenieroCierre" class="mostrar_ingenieros xD" name="tecnoloia" style="width:100%;">
          <option value="">Seleccione...</option>
          </select>
      </div>

  </div>

</div>
</div>
