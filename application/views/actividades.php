	<title>Actividades</title>
	<h1>Lista de actividades</h1>
						<form action="estadosVM" method="POST">
							<div id="envios_VM">
								<input type="text" id="id_zte_form" name="id_zte_form">
								<input type="text" id="estado_form" name="estado_form">
								<input type="text" id="id_apertura_estados" name="id_apertura_estados">
							</div>
		<!-- <div class="aviso_actividad">
			<p>Esta actividad proviene de la estacion:</p>
			<span>(Estacion)</span><p>Con banda de:</p><span>(banda)</span><p>Y de tecnologia:</p><span>(tecnologia)</span>
		</div> -->
		<button type='button' class='apertura btn btn-primary' data-toggle='modal' data-target='#proceso_apertura'><i class='fa fa-pencil-square-o'></i></button>
		<div class="container">
		<div class="container-m-b-10" id="tabla_de_actividades">
			<table class="table table-hover table-bordered table-striped dataTable_camilo fs-10" id="tabla_actividades">
				<thead>
					<tr>
						<th>ID ZTE</th>
						<th>ID Apertura</th>
						<th>Tipo de trabajo</th>
						<th>Ingeniero_Apertura</th>
						<th>Estado</th>
						<th>Resumen</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($actividades as $key=>$row): ?>
					<tr>
						<th><?php echo $row['id_vm_zte'] ?></th>
						<th><?php echo $row['id_apertura'] ?></th>
						<th><?php echo $row['id_tipo_trabajo'] ?></th>
						<th><?php echo $row['ap_ingeniero_apertura'] ?></th>
						<th><?php echo $row['estado_vm'] ?></th>
						<th>
							<button type="submit" id="resumen" class="btn btn-info"><i class="fa fa-file"></i></button>
							</form>
						</th>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
		</div>
	<div id="proceso_apertura" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
				<h3 class="modal-title" id="modal_title">Crear apertura</h3>
			</div>
			<form action="nuevaActividad" method="POST">
				<div class="modal-body">
					<div class="container_general">
						<div class="contenido-1">
								<h1>Apertura</h1>
							<div class="container-id_zte">
								<h2>ID ZTE</h2>
								<input type="number" name="id_zte" id="id_zte" value="">
							</div>
							<div class="Estacion">
								<h2>Estación:</h2>
								<input readonly type="text" name="estacion" id="estacion" value="">
							</div>
							<div class="Tecnologia">
								<h2>Tecnología:</h2>
								<input type="text" name="tecnologia" id="tecnologia" value="">
							</div>
							<div class="Banda">
								<h2>Banda:</h2>
								<input type="text" name="banda" id="banda" value="">
							</div>
							<div class="Tipo_trabajo">
								<h2>Tipo de trabajo</h2>
								<input type="text" name="tipo_trabajo" id="tipo_trabajo" value="">
							</div>
							<div class="Estado_VM">
								<h2>Estado de VM</h2>
								<select name="estado_vm" id="estado_vm">
									<option value="punto-control">cerrado</option>
									<option value="cierre">Punto de control</option>
								</select>
							</div>
							<div class="Motivo_del_estado">
								<h3>Motivo del estado</h3>
								<select name="motivo_estado">
									<option>actualizacion</option>
									<option>cambio</option>
									<option>nada</option>
								</select>
							</div>
							<div class="Ingeniero_apertura">
								<h3>Ingeniero_Apertura</h3>
								<select name="ing_apertura" id="ing_apertura">
									<option>1</option>
									<option>2</option>
									<option>3</option>
								</select>
							</div>
							<div class="img_ga">
								<img src="" name="ga" id="ga">
							</div>
							<div class="container_2">
								<div class="container_programado">
									<div class="Programacion_site">
										<h3>Inicio Programado SA</h3>
										<input type="date" name="inicio_p" id="inicio_p">
										<h3>Fin Programado SA</h3>
										<input type="date" name="fin_p" id="fin_p">
									</div>
								</div>
								<div class="Tecno_afec">
									<h3>Tecnologias Afectadas</h3>
									<select name="tec_afec" id="tec_afec">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
								<div class="Bandas_afec">
									<h3>Bandas Afectadas</h3>
									<select name="bandas_afec" id="bandas_afec">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
								<div class="Perso_solici">
									<h3>Persona que solicita la VM LC</h3>
									<input type="text" name="per_sol" id="per_sol">
								</div>
								<div class="Ente_ejecut">
									<h3>Ente Ejecutor</h3>
									<select name="ent_ejec" id="ent_ejec">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
								<div class="Fm_nokia">
									<h3>FM Nokia</h3>
									<input type="text" name="fm_nok" id="fm_nok">
								</div>
								<div class="Fm_claro">
									<h3>FM Claro</h3>
									<input type="text" name="fm_claro" id="fm_claro">
								</div>
								<div class="Tel_fm">
									<h3>Teléfono FM</h3>
									<input type="number" name="telef_fm" id="telef_fm">
								</div>
								<div class="WP">
									<h3>WP</h3>
									<input type="number" name="wp" id="wp">
								</div>
								<div class="CRQ">
									<h3>CRQ</h3>
									<input type="text" name="crq" id="crq">
								</div>
								<div class="ID_RF_TOOL">
									<h3>ID_RF_TOOL</h3>
									<input type="text" name="id_rf_tool" id="id_rf_tool">
								</div>
								<div class="BSC_NAME">
									<h3>BSC_NAME</h3>
									<input type="text" name="bsc_name" id="bsc_name">
								</div>
								<div class="RNC_NAME">
									<h3>RNC_NAME</h3>
									<input type="text" name="rnc_name" id="rnc_name">
								</div>
								<div class="servidor_mss">
									<h3>Servidor MSS</h3>
									<input type="text" name="serv_mss">
								</div>
								<div class="inte_backo">
									<h3>Integrador y/o backoffice</h3>
									<input type="text" name="int_back" id="int_back">
								</div>
								<div class="region_clust">
									<h3>Regional_Cluster</h3>
									<input type="text" name="reg_clu" id="reg_clu">
								</div>
								<div class="vistas_mm">
									<h3>VISTAS_MM</h3>
									<select name="vist_mm" id="vist_mm">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
								<div class="hora_aten">
									<h3>Hora atención VM</h3>
									<input type="time" name="hor_ate" id="hor_ate">
								</div>
								<div class="hora_ini_real_vm">
									<h3>Hora_Inicial_Real_VM</h3>
									<input type="time" name="hor_real" id="hor_real">
								</div>
								<div class="Contratista">
									<h3>Contratista</h3>
									<select name="contratista" id="contratista">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
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
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><i class='glyphicon glyphicon-remove'></i>&nbsp;Cancelar</button>
					<button type="submit" class="btn btn-success" id="modal_enviar"><i class='glyphicon glyphicon-send'></i>&nbsp;enviar</button>	
				</div>
			</form>
		</div>
	</div>
	<input type="text" id="id_zte_grupoVM" value="<?php echo $id_zte_grupoVM ?>">
	<script>
		// mini-formulario para envio de datos
		document.getElementById('envios_VM').style.display = 'none';
		var id_zte_grupoVM = document.getElementById('id_zte_grupoVM');
		id_zte_grupoVM.style.display = 'none';
		console.log(id_zte_grupoVM.value);
		$(document).ready( function () {
			const table = $('#tabla_actividades').DataTable({
				"search": {
      				"search": id_zte_grupoVM.value    
   				}
			});
			const data = table.rows().data();
			console.log(data);
			const btn_resumen = document.querySelectorAll('#resumen');
			console.log(btn_resumen);
			btn_resumen.forEach( (evt, index) =>{		
				evt.addEventListener('click', (a)=>{
					const id_zte = data[index][0];
					const id_apertura = data[index][1];
					const estado = data[index][3];
					console.log(estado,id_zte,id_apertura);
					document.getElementById('estado_form').value = estado;
					document.getElementById('id_zte_form').value = id_zte;
					document.getElementById('id_apertura_estados').value = id_apertura;
				})
			});	
		});
		// trae los datos de la tabla Sitio
		function llamadoTabla(url, data){
			const push = new FormData();
			push.append('id_zte_data', data);
			fetch(url,{
				method:'POST',
				body: push
			}).then(data => data.text()
			).then(data =>{
				data = JSON.parse(data);
				console.log(data);
				document.getElementById('estacion').value = data[0].Estacion;
				document.getElementById('banda').value = data[0].Banda;
				document.getElementById('tecnologia').value = data[0].Tecnologia;
				document.getElementById('tipo_trabajo').value = data[0].ente_ejecutor;
			})
		}
		const id_zte_modal = document.getElementById('id_zte');
		id_zte_modal.addEventListener('change', evt =>{
			llamadoTabla('llamadoSitio', id_zte_modal.value);	
		})
	</script>
