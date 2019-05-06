`use strict`
$(document).ready(function() {



  //Esquema
    var Remedy = {

      //Inicializa las funciones escritas en este atributo
      init:function(){
        Remedy.actividades();
        Remedy.events();
        Remedy.ingenieros();
      },
      //Aqui van las funciones que se activan por medio de eventos
      events:function(){
        $('#GuardarTicket').on("click", Remedy.CrearTicket);
        // $('#inicioAfectacion')
        // .datetimepicker(
        //   {
        //     format: 'Y-m-d H:i',
        //     mask: true,
        //     timepicker: false,
        //     todayHighlight: true,
        //   }
        // );

      },
      actividades:function(){

      },
      CrearTicket:function(){

        // var nombreEstacion = $('#nombreEstacion').val();
        // var banda = $('#bandasFrecuencia').val();
        // var tecnologia = $('#tecnologia').val();
        // var tipoTrabajo = $('#tipoTrabajo').val();
        // var estado = $('#estado').val();
        // var subEstado = $('#subEstado').val();
        // var numIncidente = $('#numIncidente').val();
        // var estadoTicket = $('#estadoTicket').val();
        // var subEstadoTicket = $('#subEstadoTicket').val();
        // var tipoAfectacion = $('#tipoAfectacion').val();
        // var tipoFalla = $('#tipoFalla').val();
        // var ingenieroApertura = $('#ingenieroApertura').val();
        // var estadoNotificacion = $('#estadoNotificacion').val();
        // var grupoSoporte = $('#grupoSoporte').val();
        // var inicioAfectacion = $('#inicioAfectacion').val();
        // var responsableOyM = $('#responsableOyM').val();
        // var responsableTicket = $('#responsableTicket').val();
        // var summaryRemedy = $('#summaryRemedy').val();
        // var fmClaro = $('#FMClaro').val();
        // var fmNokia = $('#FMNokia').val();
        // var comentarioTicket = $('#ComentarioTicket').val();
        // var finAfectacion = $('#FinAfectacion').val();
        // var ingenieroCierre = $('#ingenieroCierre').val();

        // console.log(nombreEstacion+banda+tecnologia+tipoTrabajo+estado+subEstado+numIncidente+estadoTicket+tipoAfectacion+tipoFalla+ingenieroApertura+estadoNotificacion+grupoSoporte+inicioAfectacion+responsableOyM+responsableTicket+summaryRemedy+fmClaro+fmNokia+comentarioTicket+finAfectacion+ingenieroCierre);

        var datosRemedy = {
          'id_apertura' : id_actividad,
          'numIncidente' : $('#numIncidente').val(),
          'estadoTicket' : $('#estadoTicket').val(),
          'subEstadoTicket' : $('#subEstadoTicket').val(),
          'tipoAfectacion' : $('#tipoAfectacion').val(),
          'tipoFalla' : $('#tipoFalla').val(),
          'ingenieroApertura' : $('#ingenieroApertura').val(),
          'estadoNotificacion' : $('#estadoNotificacion').val(),
          'grupoSoporte' : $('#grupoSoporte').val(),
          'inicioAfectacion' : $('#inicioAfectacion').val(),
          'responsableOyM' : $('#responsableOyM').val(),
          'responsableTicket' : $('#responsableTicket').val(),
          'summaryRemedy' : $('#summaryRemedy').val(),
          'fmClaro' : $('#FMClaro').val(),
          'fmNokia' : $('#FMNokia').val(),
          'comentarioTicket' : $('#ComentarioTicket').val(),
          'finAfectacion' : $('#FinAfectacion').val(),
        'ingenieroCierre' : $('#ingenieroCierre').val()
        }
        console.log(datosRemedy);

        $.post(
          base_url+`Ticket_remedy/CrearTicketRemedy`,
          {datos:datosRemedy}
        ).done(function (data) {
          if (data == 'false') {
            alert('Por favor complete todos los campos e intente nuevamente');
          }else {
            location.reload();
          }
        });
      },
      ingenieros: function() {
        $.post(
          base_url+`Ticket_remedy/ingenieros`,
          {},
          function(data) {
            var obj = JSON.parse(data);
            for (var i = 0; i < obj.length; i++) {
              $('.mostrar_ingenieros').append(
                `<option class="opcion_banda" value="${obj[i].id_usuario}">${obj[i].nombres} ${obj[i].apellidos}</opption>`
              );
            }

          }
        );
      },
    }

      Remedy.init();


});

// $.post('url',{},function(){});
