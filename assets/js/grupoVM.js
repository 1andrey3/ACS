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
      estacion.addEventListener('click', () => {
        const estacion2 = estacion.value;
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
        console.log(estacionCampo);
      })
    }