<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
            $this->load->helper('camilo');
            date_default_timezone_set("America/Bogota");
            $hoy = date("Y-m-d");
            ?>
    <!--   ICONO PAGINA    -->
    <link rel="icon" href="<?= base_url('assets/images/logo_zte.png'); ?>">
    <!-- STYLES HEADER FOOTER  -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styles_header.css?v=' . validarEnProduccion()); ?>">
    <!-- sidebar -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/sidebar.css?v=' . validarEnProduccion()); ?>">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>" />
     <!-- STYLES DATATABLES CAMILO -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/datatables_camilo.css?v=' . validarEnProduccion()); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styleModalCami.css?v=' . validarEnProduccion()); ?>">
    <!-- STYLES  FOOTER  -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styles_footer.css'); ?>">
    <!--stylos modal loadinformation-->
    <link rel="stylesheet" href="<?= base_url('assets/css/input_file/component.css?v=' . validarEnProduccion()) ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/input_file/demo.css?v=' . validarEnProduccion()) ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/plugins/font-awesome/css/font-awesome.min.css') ?>" />
    <!-- STYLES  FOOTER  -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styles_footer.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/estilos_gestion_usuarios.css') ?>">
</head>

<body data-base="<?= base_url() ?>">

    <!-- Sidebar -->

    <div class="style_container_slide w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-large boton_cerrar">
            <img class="logo2" src="<?= base_url('assets/images/logo2.png') ?>" alt="cerrar">
            <img src="<?= base_url('assets/images/espalda.png') ?>" alt="cerrar">

        <a href="<?= base_url('User/principal/' .$this->session->userdata('role')) ?>" class='w3-bar-item w3-button'><i class="fa fa-home"></i> Home</a>
        <a href="<?= base_url('Vm/index') ?>" class='w3-bar-item w3-button'><i class="fa fa-edit"></i>Actividades</a>
        <?php if ($this->uri->segment(2) == 'principal' && $_SESSION['role'] == "administrador") : ?>
        <a href="<?= base_url('Usuarios') ?>" class='w3-bar-item w3-button'><i class="fa fa-users"></i> Gestion de usuarios</a>
      <?php endif ?>
    </div>
    <!-- FIN SIDEBAR -->
    <div class="telmexVIP_header ">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid menu_nav_header">
                <div class="navbar-header">
                    <!-- Page Content -->
                    <span class="">
                        <span id="btn_menu_lateral" class="logo_header" onclick="w3_open()"><img class="m-t-10" src="<?= base_url('assets/images/LogoZTENav.png'); ?>" style="cursor:pointer;"> </span>
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
        </nav>
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
