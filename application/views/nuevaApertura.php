<link rel="stylesheet" href="<?= base_url('assets/css/proceso_apertura_vm.css'); ?>">
<form action="nuevaActividad" method="POST">
    <div class="modal-body">
        <div class="container_general">
            <div class="contenido-1">
                <div class="row contenidoCabecera">
                    <div class="parte_uno_cc col-md-5">
                        <h1>Apertura</h1>
                        <div class="container-id_zte">
                            <h2>ID ZTE</h2>
                            <input type="number" name="id_zte" id="id_zte" value="">
                        </div>
                    </div>
                    <div class="parte_dos_cc col-md-7">
                        <div class="Estacion">
                            <h2>Estación:</h2>
                            <div class="input-group">
                                <input readonly type="text" name="estacion" id="estacion" value="">
                            </div>
                        </div>
                        <div class="Tecnologia">
                            <h2>Tecnología:</h2>
                            <input readonly type="text" name="tecnologia" id="tecnologia" value="">
                        </div>
                        <div class="Banda">
                            <h2>Banda:</h2>
                            <input readonly type="text" name="banda" id="banda" value="">
                        </div>
                        <div class="Tipo_trabajo">
                            <h2>Tipo de trabajo</h2>
                            <input readonly type="text" name="tipo_trabajo" id="tipo_trabajo" value="">
                        </div>
                        <div class="Estado_VM">
                            <h2>Estado de VM</h2>
                            <select name="estado_vm" id="estado_vm">
                                <option value="punto-control">Punto de control</option>
                                <option value="cierre">cierre</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="cuerpo">
                    <div class="Motivo_del_estado">
                        <h3>Motivo del estado</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span>
                            <select name="motivo_estado" class="form-control">
                                <option>actualizacion</option>
                                <option>cambio</option>
                                <option>nada</option>
                            </select>
                        </div>
                    </div>
                    <div class="Ingeniero_apertura">
                        <h3>Ingeniero_Apertura</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                            <select name="ing_apertura" id="ing_apertura" class="form-control">
                            <?php foreach($usuarios as $key=>$row): ?>
                                <option value="<?php echo $row['id_usuario'] ?>"> <?php echo $row['nombres']." ". $row['apellidos'] ?></option>
                            <?php endforeach ?>
                            </select>
                        </div>
                    </div>								
                    <div class="container_programado_inicio">
                        <div class="Programacion_site">
                            <h3>Inicio Programado SA</h3>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input type="date" name="inicio_p" id="inicio_p" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="container_programado_fin">
                        <h3>Fin Programado SA</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="date" name="fin_p" id="fin_p" class="form-control">
                        </div>
                    </div>
                    <div class="Tecno_afec">
                        <h3>Tecnologias Afectadas</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-flash"></i></span>
                            <select name="tec_afec" id="tec_afec" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="Bandas_afec">
                        <h3>Bandas Afectadas</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-scale"></i></span>
                            <select name="bandas_afec" id="bandas_afec" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="Perso_solici">
                        <h3>Psn solicitante VM</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="per_sol" id="per_sol" class="form-control">
                        </div>
                    </div>
                    <div class="Ente_ejecut">
                        <h3>Ente Ejecutor</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-text-size"></i></span>
                            <select name="ent_ejec" id="ent_ejec" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="Fm_nokia">
                        <h3>FM Nokia</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-floppy-open"></i></span>
                            <input type="text" name="fm_nok" id="fm_nok" class="form-control">
                        </div>
                    </div>
                    <div class="Fm_claro">

                        <h3>FM Claro</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-floppy-open"></i></span>
                            <input type="text" name="fm_claro" id="fm_claro" class="form-control">
                        </div>
                    </div>
                    <div class="Tel_fm">
                        <h3>Teléfono FM</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-phone-alt"></i></span>
                            <input type="number" name="telef_fm" id="telef_fm" class="form-control">
                        </div>
                    </div>
                    <div class="WP">
                        <h3>WP</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-ok-circle"></i></span>
                            <input type="number" name="wp" id="wp" class="form-control">
                        </div>
                    </div>
                    <div class="CRQ">
                        <h3>CRQ</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-eye-open"></i></span>
                            <input type="text" name="crq" id="crq" class="form-control">
                        </div>
                    </div>
                    <div class="ID_RF_TOOL">
                        <h3>ID_RF_TOOL</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-wrench"></i></span>
                            <input type="text" name="id_rf_tool" id="id_rf_tool" class="form-control">
                        </div>
                    </div>
                    <div class="BSC_NAME">
                        <h3>BSC_NAME</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-tower"></i></span>
                            <input type="text" name="bsc_name" id="bsc_name" class="form-control">
                        </div>
                    </div>
                    <div class="RNC_NAME">
                        <h3>RNC_NAME</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-tower"></i></span>
                            <input type="text" name="rnc_name" id="rnc_name" class="form-control">
                        </div>
                    </div>
                    <div class="servidor_mss">
                        <h3>Servidor MSS</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-log-in"></i></span>
                            <input type="text" name="serv_mss" class="form-control">
                        </div>
                    </div>
                    <div class="inte_backo">
                        <h3>Integrador y/o backoffice</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-upload"></i></span>
                            <input type="text" name="int_back" id="int_back" class="form-control">
                        </div>
                    </div>
                    <div class="region_clust">
                        <h3>Regional_Cluster</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-road"></i></span>
                            <input type="text" name="reg_clu" id="reg_clu" class="form-control">
                        </div>
                    </div>
                    <div class="vistas_mm">
                        <h3>VISTAS_MM</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-eye-open"></i></span>
                            <select name="vist_mm" id="vist_mm" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="hora_aten">
                        <h3>Hora atención VM</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="time" name="hor_ate" id="hor_ate" class="form-control">
                        </div>
                    </div>
                    <div class="hora_ini_real_vm">
                        <h3>Hora_Inicial_Real_VM</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-time"></i></span>
                            <input type="time" name="hor_real" id="hor_real" class="form-control">
                        </div>
                    </div>
                    <div class="Contratista">
                        <h3>Contratista</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-piggy-bank"></i></span>
                            <select name="contratista" id="contratista" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="Comentario">
                        <h3>Comentario</h3>
                        <textarea rows="4" cols="50" name="coment" id="coment"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class='glyphicon glyphicon-remove'></i>&nbsp;Cancelar</button>
        <button type="submit" class="btn btn-success" id="modal_enviar"><i class='glyphicon glyphicon-send'></i>&nbsp;enviar</button>	
    </div>
</form>