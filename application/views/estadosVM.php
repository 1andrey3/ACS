<link rel="stylesheet" href="<?= base_url('assets/css/styleEstadosVM.css'); ?>">
<body>
    <form action="<?= base_url('Welcome/estadosActividades') ?>" method="POST">
        <div class="contenedor">
            <div class="DivControl">
                <div class="pEstado">
                    <p id="tituloControl">Punto De Control</p>
                    <div>
                        <p>ID ZTE</p><br>
                        <input type="number" name="id_zte" id="id_zte" class="form-control" value = "<?php echo $id_zte ?>">
                    </div>
                </div>
                <div class="caracteristicas">
                    <div>
                        <label for="">Estación</label><br>
                        <input type="text" name="Estacion" value="<?php echo $estacion ?>"><br>
                        <input style="display:none" type="text" name="id_apertura_estados" value="<?php echo $id_apertura ?>"><br>
                    </div>
                    <div>
                        <label for="">Tecnologia</label><br>
                        <input type="text" name="Tecnologia" value="<?php echo $tecnologia ?>"><br>
                    </div>
                    <div>
                        <label for="">Banda</label><br>
                        <input type="text" name="Banda" value="<?php echo $banda ?>"><br>
                    </div>
                    <div>
                        <label for="">Tipo De Trabajo</label><br>
                        <input type="text" name="tipoTrabajo" value="<?php echo $ente ?>"><br>
                        <input type="text" id="estados" value="<?php echo $estado ?>"><br>
                    </div>
                </div>
                <div class="estadoVM">
                    <p>estado de VM:</p>
                    <select name="selectorEstado" id="selectorEstado" class="form-group">
                        <option id ="puntoControl" value="puntoControl">Punto de Control</option>
                        <option id="cierre" value="cierre">Cierre</option>
                    </select>
                </div>
            </div>
            <div class = "dos">
                <label for="">RET:</label>
                <select name="RET" id="" class="form-control">
                    <option value="">a</option>
                </select><br>
                <label for="">Ampleación Dualbeam:</label>
                <select name="ampliacionDual" id="" class="form-control">
                    <option value="">b</option>
                </select><br>
                <label for="">Selectores Dualbeam</label>
                <select name="selectorDual" id="" class="form-control">
                    <option value="">c</option>
                </select><br>
                <label for="">Tipo de Solución:</label>
                <select name="tipoSolucion" id="" class="form-control">
                    <option value="">d</option>
                </select>
            </div>
            <div class="DivInfo">
                <label> Ingeniero Control: </label>
                <select name="ingenieroControl" id="" class="form-control">
                <?php foreach($usuarios as $key=>$row): ?>
                    <option value="<?php echo $row['id_usuario'] ?>"><?php echo $row['nombres']." ".$row['apellidos'] ?></option>
                <?php endforeach ?>
                </select> <br>
                <label for="">Hora Revisión:</label>
                <input type="time" name="horaRevision" placeholder="ej: 14:00"> <br><br>
                <label for="">Comentarios Punto De Control:</label><br>
                <textarea name="comentarioPC" id="" cols="20" rows="5">        
                </textarea><br>
                <input type="submit" value="Enviar">
            </div>
            <div class="resultado">
                <label for="">Estado VM</label>
                <select name="estadoVM" id="" class="form-control">
                    <option value="">cerrado</option>
                </select><br>     
                <label for="">Sub-estado</label>
                <select name="subEstado" id="" class="form-control">
                    <option value="">a</option>
                </select><br>  
                <label for="">al iniciar VM se encontro:</label>
                <select name="inicioVM" id="" class="form-control">
                    <option value="">b</option>
                </select><br>  
                <label for="">¿Presento falla final?</label>
                <select name="fallaFinal" id="" class="form-control">
                    <option value="">no</option>
                </select><br> 
                <label for="">Tipo de falla Final</label>
                <select name="tipoFalla" id="" class="form-control">
                    <option value="">ninguna</option>
                </select><br>  
                <label for="">VISTAS_MM</label>
                <select name="vistasMM" id="" class="form-control">
                    <option value="">0</option>
                </select><br>
            </div>
            <div class="resultado2">
                <label for="">Estado Notificación</label>
                <select name="estadoNotificacion" id="" class="form-control">
                    <option value="">activo</option>
                </select><br>  
                <label for="">Ingeniero Cierre</label>
                <select name="ingenieroCierre" id="" class="form-control">
                <?php foreach($usuarios as $key=>$row): ?>
                    <option value="<?php echo $row['id_usuario'] ?>"><?php echo $row['nombres']." ".$row['apellidos'] ?></option>
                <?php endforeach ?>
                </select><br>  
                <label for="">Hora Atención Cierre</label>
                <input type="time" name="horaAtencionCierre" class="form-control">  
                <label for="">Hora de Cierre Confirmado</label>
                <input type="time" name="horaConfirmacionCierre" class="form-control"> 
                <label for="">Comentarios Cierre:</label> <br>
                <textarea  id="" name="comentariosCierre" cols="30" rows="10">
                </textarea>
                <input type="submit" value="Enviar">  
            </div>  
            
        </div>
    </form> 
    <script src="<?=base_url('assets/js/estadosVM.js') ?>"></script>      
</body>
</html>