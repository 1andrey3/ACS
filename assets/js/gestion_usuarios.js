`use strict`

//Funcion de cargar
$(document).ready(function(){


//Esquema
  var objeto = {

    //Inicializa las funciones escritas en este atributo
    init:function(){
      objeto.events();
    },
    //Aqui van las funciones que se activan por medio de eventos
    events:function(){

      $('.registrar').click(function(){
        if (validacion1($('.nombre').val()) == false ||
            validacion1($('.cedula').val()) == false ||
            validacion1($('.cargo').val()) == false ||
            validacion1($('.apellido').val()) == false ||
            validacion1($('.email').val()) == false ||
            validacion1($('.celular').val()) == false

          ){

        }else {

          $.post(
            baseurl+`/Usuarios/registrar_usuarios`,
            {
              nombre : $('.nombre').val() ,
              apellido : $('.apellido').val() ,
              cedula : $('.cedula').val() ,
              correo : $('.email').val(),
              cargo : $('.cargo').val(),
              celular : $('.celular').val(),
            },
            function(data){
              location.reload();
            }
          );
        }

      });

      $('.buscar').click(function(){
        $('.sds').remove();
        $('#usuario_generado').remove();
        $.post(
          baseurl+`/Usuarios/buscar_usuario`,
          {
            id : $('#no_documento').val() ,
          },
          function(data){
            $(`#lista`).css(`float`,`unset`);
            var obj = JSON.parse(data);
            for (var i = 0; i < obj.length; i++) {
            $('#lista').append(
              `<table id="usuario_generado">
              <tr id="titulos_tablas">
              <td class="titulo">No. de identificacion</td>
              <td class="titulo">Nombres</td>
              <td class="titulo">Apellidos</td>
              <td class="titulo">Cargo</td>
              <td class="titulo">Celular</td>
              <td class="titulo">Correo</td>
              <td class="titulo">Contraseña</td>
              <td class="titulo"></td>
              <td class="titulo"></td>

              </tr>
              <tr class="usuario_info">
              <td class="id_user info_tabla" data-id="${obj[i].id_usuario}">${obj[i].id_usuario}</td>
              <td class="info_tabla" >${obj[i].nombres}</td>
              <td class="info_tabla" >${obj[i].apellidos}</td>
              <td class="info_tabla" >${obj[i].rol}</td>
              <td class="info_tabla" >${obj[i].num_contacto}</td>
              <td class="info_tabla" >${obj[i].email}</td>
              <td class="info_tabla" >${obj[i].contrasena}</td>
              <td class="info_tabla" ><a id="modificar" href="#">Modificar</a></td>
              <td class="info_tabla" ><a id="eliminar" href="#">Eliminar</a></td>
              </tr>
              </table>`
            );
            }
            objeto.editar(obj);
            objeto.eliminar(obj);
          }
        );



      });

    },
    eliminar: function(){
      $('#eliminar').dblclick(function(){
      if (confirm('Seguro que quiere Eliminar el usuario?, se perderan los datos de este')) {

        var boton = document.querySelector(`.id_user`);
        var id = boton.dataset.id;
        $.post(
          baseurl+`/Usuarios/eliminar_usuario`,
          {id : id},function () {
            location.reload();
          }
        );

      }else {
        alert('no');
      }
    });

    },
    editar:     function(data) {
          $('#modificar').dblclick(function(){
            $('#usuario_generado').remove();
            $('#lista_para_editar').addClass('grid').css(`float`,`right`);
            for (var i = 0; i < data.length; i++) {
            $('#lista_para_editar').append(`
              <div class="sds">
              <div class="derecho">
              <p>apellidos</p>
              <input type="text" id="apellido_modificado" class="formu" name="" value="${data[i].apellidos}">
              <p>correo de contacto</p>
              <input type="email" class="formu" id="email_modificado" value="${data[i].email}">
              <p>Numero de celular</p>
              <input type="text" class="formu" id="celular_modificado" value="${data[i].num_contacto}">
              <p>Contraseña</p>
              <input class="formu" type="text" id="contrasena_modificado" value="${data[i].contrasena}">
              <button type="button" class="botoncito" id="guardar_usuario" name="button">Editar</button>
              </div>

              <div class="izquierdo">
                <p> nombres </p>
                <input type="text" id="nombre_modificado" class="formu" value="${data[i].nombres}">
                <p> cedula(No modificable) </p>
                <input type="text" id="cedula_modificado" class="formu" value="${data[i].id_usuario}" disabled>
                <p>cargo</p>
                <select id="cargo_modificado" class="formu">
                  <option value="${data[i].rol}">${data[i].rol}</option>
                  <option value="Ingeniero_Interno">Ingeniero Interno</option>
                  <option value="Ingeniero_Externo">Ingeniero Externo</option>
                  <option value="Administrador">Administrador</option>
                </select>
              </div>
            </div>
            `);
          }
          objeto.editar_usuario();
          });
        },
        editar_usuario: function() {
          $('#guardar_usuario').click(function(){
            if (validacion1($('#nombre_modificado').val()) == false ||
                validacion1($('#cedula_modificado').val()) == false ||
                validacion1($('#cargo_modificado').val()) == false ||
                validacion1($('#apellido_modificado').val()) == false ||
                validacion1($('#email_modificado').val()) == false ||
                validacion1($('#celular_modificado').val()) == false ||
                validacion1($('#contrasena_modificado').val()) == false

              ){

            }else {

              if (confirm('Seguro que quiere guardar la informacion modificada?')) {
                $.post(
                  baseurl+`/Usuarios/actualizar_usuario`,
                  {
                    cedula : $('#cedula_modificado').val() ,
                    nombre : $('#nombre_modificado').val() ,
                    apellido : $('#apellido_modificado').val() ,
                    cargo : $('#cargo_modificado').val() ,
                    telefono : $('#telefono_modificado').val(),
                    celular : $('#celular_modificado').val(),
                    correo : $('#email_modificado').val(),
                    contrasena : $('#contrasena_modificado').val(),
                  },
                  function(data){
                    location.reload();
                  }
                );

              }else {

              }
            }

          });
        },

  }
    objeto.init();


  });
