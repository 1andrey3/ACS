// ******************************************* Abrir el modal para cambiar los datos ***************************
$(function(){
        config_user = {
        init: function () {
            config_user.events();
         
        },
          //Eventos de la ventana.
        events: function () {
            // al darle clic al boton para abrir el modal y poder actualizar los datos
            $('#a_mdl_conf_user').on('click', config_user.showModalConfigUser);  
            //este clic valida si la contraseña del usuario en sesion coinside con la de db
            $('#valid_pss').on('click', config_user.showOtherInput);
            //valida los datos que hay en la pantalla
            // $('#mdl_update_config_user').on('submit', config_user.validate_information);
            //valida cual esta seleccionado si email o pass
            $( '.mdl_config_checks' ).on( 'click', config_user.config_checks);
            //valida que no se vayan sin caracteres los inputs
            $('#modal_enviar').on('click', config_user.update_config_user_send);


        },

        showModalConfigUser: function(){
            //Abrir el modal
            $('#mdl_update_config_user')[0].reset();
            $('#mdl_conf_user').modal('show');
            $('.div_mdl_conf_user_style').hide();
            $('#mail_check').attr('disabled', false);
            $('#pass_check').attr('disabled', false);
            $( '#mail_check' ).prop('checked', false); 
            $( '#pass_check' ).prop('checked', false);
            //oculta los inputs apenas se abre el modal
            $('.update_data_user').hide();
            $('#new_pass_comfirm').hide();
            $('#valid_pss').hide();
            $('.alert').hide();
            $('.last_pass').hide();
            $('.new_email_div').hide();
        },

        config_checks: function(){
            const mail = $( '#mail_check' ).is(':checked');
            const pass = $( '#pass_check' ).is(':checked');

            if (mail || pass) {
                $('.last_pass').show(500);
                $('.alert').show(500);
                $('#valid_pss').show(500);
            }

            if (!mail && !pass) {
             $('.last_pass').hide(500);
                $('.alert').hide(500);
                $('#valid_pss').hide(500);
                $('.new_email_div').hide(500);
                $('.update_data_user').hide(500);
            }



        },

        showOtherInput: function(){

            const url = base_url+'User/validate_pass';
            $('#mail_check').attr('disabled', true);
            $('#pass_check').attr('disabled', true);
            if ($('#last_pass').val() != "") {
                $.post(url, 
                {
                    pass :  $('#last_pass').val()
                },
                function(data){
                    res = JSON.parse(data);
                    console.log(res);
                    if (res) {
                        if ($( '#mail_check' ).is(':checked')) {
                            $('.div_mdl_conf_user_style').show();
                            $('.new_email_div').show(500);
                        }else{
                            $('.new_email_div').hide(500);
                        }
                        if ($( '#pass_check' ).is(':checked')) {    
                            $('.div_mdl_conf_user_style').show();
                            $('.update_data_user').show(500);
                        }else{
                            $('.update_data_user').hide(500);
                        }    
                    }else {
                        helper.miniAlert('La contraseña no coinside con su contraseña actual');
                    }
                });
            }else{
                helper.miniAlert('Ingrsere su contraseña');
            }

        },
        update_config_user_send: function(){
            if ($( '#pass_check' ).is(':checked')) {
                $('#new_pass').attr('required', true);
                $('#new_pass').attr('minlength', 5);
                if ($('#new_pass').val() != "") {
                    if ($('#confir_pss_mdl_confg').val() != $('#new_pass').val()) {
                        helper.miniAlert('las contraseñas no coinciden');
                        // $('#new_pass').css('box-shadow', '5px 5px 15px red');
                        $('#confir_pss_mdl_confg').css('box-shadow', '1px 1px 17px 2px #ff0000b5');
                        return false;
                    }else{
                        swal({
                          title: '¿Esta seguro?',
                          text: "la contraseña actual cambiará",
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'Continuar',
                          cancelButtonColor: '#d33',
                          cancelButtonText: 'Cancelar'
                        }).then((result) => {
                          if (result.value) {
                            $('#mdl_update_config_user').submit();
                          } else {
                            helper.miniAlert("Se cancelo la actualización");
                            // alert('cancelado')
                          }
                        })
                    }
                }else{
                    helper.miniAlert('no ingreso ninguna contraseña')
                }
            }
            if ($( '#mail_check' ).is(':checked') && !$( '#pass_check' ).is(':checked')) {
                const mail = $('#new_email').val();
                const expresiones = /\w+@\w+\.+[a-z]/;
                /*validar el formato del correo*/
                if (!expresiones.test(mail)) {
                    helper.miniAlert('El formato del correo no es valido');
                    return false;
                }else{
                    swal({
                          title: '¿Esta seguro?',
                          text: "El correo "+ mail + " Se actualizara",
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'Continuar',
                          cancelButtonColor: '#d33',
                          cancelButtonText: 'Cancelar'
                        }).then((result) => {
                          if (result.value) {
                            $('#new_pass').val($('#last_pass').val());
                            $('#mdl_update_config_user').submit();
                          } else {
                            helper.miniAlert("Se cancelo la actualización");
                          }
                        })
                    }
            }
            if ($( '#mail_check' ).is(':checked') && $( '#pass_check' ).is(':checked')) {
                const mail = $('#new_email').val();
                const expresiones = /\w+@\w+\.+[a-z]/;
                $('#new_pass').attr('required', true);
                $('#new_pass').attr('minlength', 5);
                if ($('#confir_pss_mdl_confg').val() != $('#new_pass').val()) {
                    helper.miniAlert('las contraseñas no coinciden');
                    $('#confir_pss_mdl_confg').css('box-shadow', '1px 1px 17px 2px #ff0000b5');
                    return false;
                }else{
                    if (!expresiones.test(mail)) {
                        helper.miniAlert('El formato del correo no es valido');
                        return false;
                    }else{
                        swal({
                              title: '¿Esta seguro?',
                              text: "El correo "+ mail + " Se actualizara y la contraseña cambiara",
                              type: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              confirmButtonText: 'Continuar',
                              cancelButtonColor: '#d33',
                              cancelButtonText: 'Cancelar'
                            }).then((result) => {
                              if (result.value) {
                                $('#mdl_update_config_user').submit();
                              } else {
                                helper.miniAlert("Se cancelo la actualización");
                              }
                            })
                    }
                }

            }
        }

    };
    config_user.init();
});
