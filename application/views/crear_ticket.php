<title>Ticket</title>
<legend><b>Tickets Remedy</b></legend>
<div class="container">
	<form action="#" method="POST">
		<div class="formulario_general">
			<h1>Incidente Remedy</h1>
			<div class="id-zte">
				<p>ID ZTE</p>
				<input type="number" name="id_zte" id="id_zte" value="" readonly disabled>
			</div>
			<div class="Estacion">
				<p>Estación:</p>
				<input type="text" name="estacion" id="estacion" readonly disabled>
			</div>
			<div class="Tecnologia">
				<p>Tecnología:</p>
				<input type="text" name="tecno" id="tecno" readonly disabled>
			</div>
			<div class="Banda">
				<p>Banda:</p>
				<input type="text" name="banda" id="banda" readonly disabled>
			</div>
			<div class="Tipo_t">
				<p>Tipo de Trabajo:</p>
				<input type="text" name="tt" id="tt" readonly disabled>
			</div>
			<div class="Estado_n">
				<p>Estado Notificación</p>
				<select>
					<option>Actividad notificada</option>
				</select>
			</div>
			<div class="subestado">
				<p>Sub-Estado</p>
				<select>
					<option>Exitoso</option>
					<option>No exitoso</option>
				</select>
			</div>
			<div class="Incidente">
				<p>Número de incidente:</p>
				<input type="text" name="num_inc" id="num_inc">
			</div>
			<div class="Est_tick">
				<p>Estado de Ticket:</p>
				<select></select>
			</div>
			<div class="Subest_tick">
				<p>Subestado(Ticket):</p>
				<select></select>
			</div>
			<div class="Tipo_afec">
				<p>Tipo de Afectación</p>
				<select></select>
			</div>
			<div class="Tipo_falla_fin">
				<p>Tipo de Falla Final(Ticket):</p>
				<select></select>
			</div>
			<div class="Ing_aper_tick">
				<p>Ingeniero Apertura Ticket:</p>
				<select></select>
			</div>
			<div class="Estado_not">
				<p>Estado Notificación(Ticket):</p>
				<select></select>
			</div>
			<div class="Grupo_soporte">
				<p>Grupo Soporte:</p>
				<input type="text" name="grupo_soporte" id="grupo_soporte">
			</div>
			<div class="Inicio_afectacion">
				<p>Inicio Afectación:</p>
				<input type="text" name="ini_afec" id="ini_afec">
			</div>
			<div class="Responsa_oym">
				<p>Responsable OyM:</p>
				<select></select>
			</div>
			<div class="Respon_ticket">
				<p>Responsable de Ticket:</p>
				<select></select>
			</div>
			<div class="Summary_remedy">
				<p>Summary Remedy:</p>
				<textarea name="summ_rem" id="summ_rem" rows="5" cols="50"></textarea>
			</div>
			<div class="respons_solu">
				<div class="Fm_claro">
					<p>-FM Claro:</p>
					<input type="text" name="fm_claro" id="fm_claro">
				</div>
				<div class="Fm_nokia">
					<p>-FM Nokia:</p>
					<input type="text" name="fm_nokia" id="fm_nokia">
				</div>
			</div>
			<div class="Coment_ticket">
				<p>Comentario de Ticket</p>
				<textarea name="com_ticket" id="com_ticket" rows="10" cols="70"></textarea>
			</div>
			<div class="Fin_afec">
				<p>Fin Afectación</p>
				<input type="text" name="fin_afec" id="fin_afec">
			</div>
			<div class="Ing_cierre_ticket">
				<p>Ingeniero Cierre de Ticket:</p>
				<input type="text" name="ing_cierre_tick" id="ing_cierre_tick">
			</div>
		</div>
		<button class="btn btn-success">Guardar TK</button>
		<button class="btn btn-primary">Nuevo Ticket</button>
	</form>
</div>