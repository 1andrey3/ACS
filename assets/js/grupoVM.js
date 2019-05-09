$(document).ready(function(){
 
  const table =  $('#tablaForm').DataTable({  
    "language": {
      "lengthMenu": "Mostrar _MENU_ registros por pagina",
        //"info": "Mostrando pagina _PAGE_ de _PAGES_ / Mostrados: _START_ de _END_ ",
      "sInfo": "Mostrando: _START_ de _END_ - Total registros: _TOTAL_ ",
      "infoEmpty": "No hay registros disponibles",
      "infoFiltered": "(filtrada de _MAX_ registros)",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "No se encontraron registros coincidentes",
      "paginate": {
        "next": "Siguiente",
        "previous": "Anterior"
      },
    },
  });
  document.getElementById('idZteFila').style.display = 'none';
  const data = table.rows().data();
  console.log(data);
  const btn_resumen = document.querySelectorAll('#vista_actividades');
  console.log(btn_resumen);
  btn_resumen.forEach( (evt, index) =>{		
    evt.addEventListener('click', (a)=>{
      const id_zte = data[index][0];
      console.log(id_zte);
      document.getElementById('idZteFila').value = id_zte;
    })
  });
});

$(document).ready(function() {
  $( "#fechaSolicitud" ).datetimepicker({
    dateFormat: 'yy-mm-dd',
    timeFormat: 'HH:mm:ss'});
    $('#horaApertura').timepicker({'timeFormat':'H:i'});
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
  btn.addEventListener('blur', () => {
      const estacion = document.querySelector('#estacion');
      estacion.addEventListener('change', () => {
        const estacion2 = estacion.value;
        for(let x = 0; x < objEstacion.length; x++){
          if(objEstacion[x].id_estacion == estacion2){
            document.getElementById('rSkype').value = objEstacion[x].region;
          }
        }
      });
    });

    $( "#fechaSolicitud" ).on('click', function() {
      $("#ui-datepicker-div").css("z-index", "9999");
    });
})();
console.log("aqui");
$('#nuevo_sitio').on('shown.bs.modal', function (e) {
  console.log("holaaa");
})
$('#nuevo_sitio').on('shown.bs.modal', function () {
  alert('hi');
});
  //botones 'tomar'
    const tomarDatos = document.querySelectorAll('#tomarDatos');
    for(tomar of tomarDatos){
      tomar.addEventListener('click', (evt) => {
        const boton = evt.target;
        console.log(boton.innerHTML);
        const d = boton.parentNode;
        const x = d.parentNode;
        // console.log(x.childNodes[5].innerHTML);

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

        $("#estacion option[value='" + estacionCampo + "']").attr("selected",true);
        $("#banda option[value=" + banda + "]").attr("selected",true);
        $("#tecnologia option[value="+ tecnologia +"]").attr("selected",true);
        const estacion = document.querySelector('#estacion');
        console.log(estacionCampo);
      })
    }
    console.log(tomarDatos);
    
