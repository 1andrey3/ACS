<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
            // $this->load->helper('camilo');
            date_default_timezone_set("America/Bogota");
            $hoy = date("Y-m-d");
    ?>
    <!--   ICONO PAGINA    -->
    <!-- <link rel="icon" href="<?= base_url('assets/img/logo_zte.png'); ?>"> -->
    <!-- STYLES HEADER FOOTER  -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styles_header.css?v=' . validarEnProduccion()); ?>"> -->
    <!-- sidebar -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/sidebar.css?v=' . validarEnProduccion()); ?>"> -->
    <!-- BOOTSTRAP -->
    <!-- <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>" /> -->
    <!-- <link rel="stylesheet" href="<?= base_url('assets/plugins/font-awesome/css/font-awesome.min.css') ?>" /> -->
    <!-- STYLES  FOOTER  -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styles_footer.css'); ?>"> -->
    
</head>

<body data-base="<?= base_url() ?>">

    <!-- Sidebar -->

    <div class="style_container_slide w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-large boton_cerrar">
            <img class="logo2" src="<?= base_url('assets/img/logo2.png') ?>" alt="cerrar">
            <img src="<?= base_url('assets/img/espalda.png') ?>" alt="cerrar">
        </button>
        <a href="<?= base_url('User/principal/' . $this->session->userdata('role')) ?>" class='w3-bar-item w3-button'><i class="fa fa-home"></i> Home</a>

        <div class="telmexVIP_header ">

            <nav class="navbar navbar-inverse" role="navigation">
                <div class="container-fluid menu_nav_header">
                    
                    <div class="navbar-header">
                        <!-- Page Content -->
                        <span class="">
                            <span id="btn_menu_lateral" class="logo_header" onclick="w3_open()"><img class="m-t-10" src="<?= base_url('assets/img/LogoZTENav.png'); ?>" style="cursor:pointer;"> </span>
                        </span>
                    </div>


                    <ul class="nav navbar-nav menu_nav_header">
                        <h2 style="color: #fff;" id="hora_actualizacion" class="style_title-nav_hora"></h2>
                    </ul>

                    <ul class="nav navbar-nav menu_nav_header">
                        <!-- <h2 class="style_title-nav"><?php echo $title ?></h2> -->
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span><b> Welcome <?php $cargo = $this->session->userdata('role');
                    if ($cargo == 'lider') {
                        echo 'lìder ' . $this->session->userdata('name');
                    } else {
                        echo $this->session->userdata('role') . ' ' . $this->session->userdata('name');
                    } ?> </b> </a></li>
                    <li><a href="<?= base_url('User/logout') ?>"><span class="glyphicon glyphicon-log-in"></span> Sign out</a></li>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
    </div>
        <div class="container" style="min-height: 513px ;">
            <!-- modal para configuracion de password e email -->
            <div class="modales_cami">
                <div id="mdl_conf_user" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header font_modal_conf">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                                <h3 class="modal-title" id="modal_title">Configuracion de cuenta</h3>
                            </div>

                            <div class="modal-body p-35">
                                <div class="div_mdl_conf_user_style_1">
                                    <h4>¿Qué desea actualizar?</h4>
                                    <h4><span>E-mail</span></h4>
                                    <label class="label">
                                        <input type="checkbox" id="mail_check" class="label__checkbox mdl_config_checks" value="mail_check">
                                        <span class="label__text">
                                            <span class="label__check">
                                                <i class="fa fa-check icon"></i>
                                            </span>
                                        </span>
                                    </label>
                                    <h4><span>Password</span></h4>
                                    <label class="label">
                                        <input type="checkbox" id="pass_check" class="label__checkbox mdl_config_checks" value="pass_check">
                                        <span class="label__text">
                                            <span class="label__check">
                                                <i class="fa fa-check icon"></i>
                                            </span>
                                        </span>
                                    </label>
                                </div>


                                <form id="mdl_update_config_user" action="<?= base_url('User/Update_pass_or_email') ?>" method="POST">
                                    <!-- este es el input para la validacion de la contraseña para poder cambiar lo que necesita -->
                                    <div class="last_pass">
                                        <h4><span>Contraseña Actual</span></h4>
                                        <input class="form-control inputs_mdl_update" type="password" name="last_pass" id="last_pass" placeholder="Contraseña">
                                    </div>
                                    <!-- valida si la contraseña es la correcta -->
                                    <div class="alert alert-danger alert-dismissible fade in">
                                        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Danger!</strong> Primero debe ingresar su contraseña actual
                                    </div>
                                    <button id="valid_pss" type="button" class="title_mdl_update btn btn-success">validar</button>
                                    <div class="div_mdl_conf_user_style">
                                        <div class="new_email_div">
                                            <h4><span class="title_mdl_update">Email</span></h4>
                                            <input class="form-control inputs_mdl_update" type="text" id="new_email" name="new_email" value="<?php echo $this->session->userdata('email') ?>">
                                        </div>
                                        <div class="update_data_user">
                                            <h4><span class="title_mdl_update">Nueva Contraseña</span></h4>
                                            <input class="form-control inputs_mdl_update" type="password" id="new_pass" name="new_pass" minlength="5">
                                        </div>
                                        <div class="update_data_user">
                                            <h4><span class="title_mdl_update">Confirmar Contraseña</span></h4>
                                            <input class="form-control inputs_mdl_update" type="password" id="confir_pss_mdl_confg" minlength="5">
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer font_modal_conf">
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="modal_cancelar"><i class='glyphicon glyphicon-remove'></i>&nbsp;Cancelar</button>
                            <button type="button" form="mdl_update_config_user" class="btn btn-success" id="modal_enviar"><i class='glyphicon glyphicon-send'></i>&nbsp;enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            document.addEventListener('keypress', function(e) {
                var comb = e.keyCode;

                if (comb == 10 && e.ctrlKey == true) {
                    $('#btn_menu_lateral').click();
                }
                (function(e, t, n) {
                    var r = e.querySelectorAll("html")[0];
                    r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
                })(document, window, 0);
            });
        </script>