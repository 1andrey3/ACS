<?php if ($_SESSION['role'] != 'administrador') {    header('location:'.base_url('user/principal/'.$_SESSION['role']));} ?>

<div class="contenedor_u">
  <div class="contenedor_opciones">
    <li class="boton_crear modificado">Crear</a></li>
    <li class="boton_modificar">Modificar/Eliminar</a></li>
  </div>

  <div class="contenedor_formus">

<!-- CREAR USUARIOS -->
    <div class="crear">
      <div class="lado_izquierdo">
        <p> Nombre </p>
        <input type="text" class="nombre formu" name="" value="">
        <p> Cédula </p>
        <input type="text" class="cedula formu" name="" value="">
        <p>Cargo</p>
        <select class="cargo formu">
          <option value="">Ninguno seleccionado</option>
          <option value="Ingeniero_Interno">Ingeniero Interno</option>
          <option value="Ingeniero_Externo">Ingeniero Externo</option>
          <option value="Administrador">Administrador</option>
        </select>
      </div>
      <div class="lado_derecho">
        <p>Apellidos</p>
        <input type="text" class="apellido formu" name="" value="">
        <p>Correo de contacto</p>
        <input type="email" class="email formu" name="" value="">
        <p>Número de celular</p>
        <input type="text" class="celular formu" name="" value="">
        <button type="submit" class="registrar botoncito" name="button">Registrar</button>
      </div>
    </div>

<!-- MODIFICAR USUARIOS -->
    <div class="modificar" style="display:none">

      <div class="input_buscar_usuario">
        Documento:
        <input type="number" class="formu" id="no_documento" name="" value="">
        <button type="submit" class="buscar botoncito" name="button">Buscar</button>
      </div>
      <br>
      <div id="lista">

      </div>
      <div id="lista_para_editar">

      </div>
    </div>
  </div>
</div>
</div>
