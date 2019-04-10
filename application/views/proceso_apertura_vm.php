<!DOCTYPE html>
<html>
<head>
	<title>Proceso apertura VM</title>
</head>
<body>
	<div class="container_general">
		<div class="container-1">
			<div class="container-id_zte">
				<h1>Apertura</h1>
				<h2>ID ZTE</h2>
				<input type="number" name="id_zte" id="id_zte" value="" readonly>
			</div>
			<div class="Estacion">
				<h2>Estación:</h2>
				<input type="text" name="estacion" id="estacion" value="" readonly>
			</div>
			<div class="Tecnologia">
				<h2>Tecnología:</h2>
				<input type="text" name="tecnologia" id="tecnologia" value="" readonly="">
			</div>
			<div class="Banda">
				<h2>Banda:</h2>
				<input type="text" name="banda" id="banda" value="" readonly>
			</div>
			<div class="Tipo_trabajo">
				<h2>Tipo de trabajo</h2>
				<input type="text" name="tipo_trabajo" id="tipo_trabajo" value="" readonly>
			</div>
			<div class="Estado_VM">
				<h2>Estado de VM</h2>
				<select name="estado_vm" id="estado_vm">
				</select>
			</div>
			<div class="Motivo_del_estado">
				<h3>Motivo del estado</h3>
				<select name="motivo_estado">
			
				</select>
			</div>
			<div class="Ingeniero_apertura">
				<h3>Ingeniero_Apertura</h3>
				<select name="ing_apertura" id="ing_apertura">
					
				</select>
			</div>
			<div class="img_ga">
				<img src="" name="ga" id="ga">
			</div>
			<div class="container_2">
				<div class="container_programado">
					<div class="Programacion_site">
						<h3>DATOS SITE ACCESS:</h3>
						<input type="number" name="datos_sa" id="datos_sa" readonly>
						<h3>Inicio Programado SA</h3>
						<input type="date" name="inicio_p" id="inicio_p">
						<h3>Fin Programado SA</h3>
						<input type="date" name="fin_p" id="fin_p">
					</div>
				</div>
				<div class="Tecno_afec">
					<h3>Tecnologias Afectadas</h3>
					<select name="tec_afec" id="tec_afec">
					</select>
				</div>
				<div class="Bandas_afec">
					<h3>Bandas Afectadas</h3>
					<select name="bandas_afec" id="bandas_afec">
						
					</select>
				</div>
				<div class="Perso_solici">
					<h3>Persona que solicita la VM LC</h3>
					<input type="text" name="per_sol" id="per_sol" readonly>
				</div>
				<div class="Ente_ejecut">
					<h3>Ente Ejecutor</h3>
					<select name="ent_ejec" id="ent_ejec">
						
					</select>
				</div>
				<div class="Fm_nokia">
					<h3>FM Nokia</h3>
					<input type="text" name="fm_nok" id="fm_nok" readonly>
				</div>
				<div class="Fm_claro">
					<h3>FM Claro</h3>
					<input type="text" name="fm_claro" id="fm_claro" readonly>
				</div>
				<div class="Tel_fm">
					<h3>Teléfono FM</h3>
					<input type="number" name="telef_fm" id="telef_fm" readonly>
				</div>
				<div class="WP">
					<h3>WP</h3>
					<input type="number" name="wp" id="wp" readonly>
				</div>
				<div class="CRQ">
					<h3>CRQ</h3>
					<input type="text" name="crq" id="crq" readonly>
				</div>
				<div class="ID_RF_TOOL">
					<h3>ID_RF_TOOL</h3>
					<input type="text" name="id_rf_tool" id="id_rf_tool" readonly>
				</div>
				<div class="BSC_NAME">
					<h3>BSC_NAME</h3>
						<input type="text" name="bsc_name" id="bsc_name" readonly>
				</div>
				<div class="RNC_NAME">
					<h3>RNC_NAME</h3>
					<input type="text" name="rnc_name" id="rnc_name" readonly>
				</div>
				<div class="servidor_mss">
					<h3>Servidor MSS</h3>
					<input type="text" name="serv_mss" readonly>
				</div>
				<div class="inte_backo">
					<h3>Integrador y/o backoffice</h3>
					<input type="text" name="int_back" id="int_back" readonly>
				</div>
				<div class="region_clust">
					<h3>Regional_Cluster</h3>
					<input type="text" name="reg_clu" id="reg_clu" readonly>
				</div>
				<div  class="lider_cua">
					<h3>Lider de Cuadrilla_VM</h3>
					<input type="text" name="lid_cua" id="lid_cua" readonly>
				</div>
				<div class="tele_lid_cuad">
					<h3>Teléfono Lider de Cuadrilla</h3>
					<input type="number" name="tel_lid_cuad" id="tel_lid_cuad" readonly>
				</div>
				<div class="vistas_mm">
					<h3>VISTAS_MM</h3>
					<select name="vist_mm" id="vist_mm">
						
					</select>
				</div>
				<div class="hora_aten">
					<h3>Hora atención VM</h3>
					<input type="time" name="hor_ate" id="hor_ate" readonly>
				</div>
				<div class="hora_ini_real_vm">
					<h3>Hora_Inicial_Real_VM</h3>
					<input type="time" name="hor_real" id="hor_real" readonly>
				</div>
				<div class="Contratista">
					<h3>Contratista</h3>
					<select name="contratista" id="contratista">
						
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

</body>
</html>