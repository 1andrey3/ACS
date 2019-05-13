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
