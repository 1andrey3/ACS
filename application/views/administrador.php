<?php if ($_SESSION['role'] != 'administrador') {    header('location:'.base_url('user/principal/'.$_SESSION['role']));} ?>
<h1>vista administrador</h1>
