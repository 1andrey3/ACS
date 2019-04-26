<style>
.contenedor{
    display: grid;
    height: 80vh;
    width: 100%;
    overflow: auto;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: repeat(3, 1fr);
    grid-gap: 8px;
    background-color: white;
}
.dos {
    display:none;
    padding: 20px;

}

.DivControl{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: repeat(2, 1fr);
    grid-gap: 2px;
    background-color: #084c6f;
    border:none;
    border-radius: 8px;
    color: #D2C9C9;
}
.caracteristicas{
    padding: 20px;
}
.DivInfo{
    display: block;
    grid-column: 1 / 2;
    padding-top: 10px; 
}
.pEstado{
    padding-left: 35px;
}
.pEstado > p {
    font-size: 40px;
}
.estadoVM{
    display: inline;
    grid-column: 1 / 3;
}
.DivInfo textarea{
    width: 75%;
}
.resultado{
   display: none;
   grid-column: 1 / 2;
   padding: 10px;
   grid-gap: 10px;

}
.resultado2 {
    display: none;
    padding: 10px;
}
.resultado2 textarea{
    width: 75%;
}
#selectorEstado{
    height: 25px;
    width: 80%;
}
</style>
<body>
    <form action="<?= base_url('Welcome/estadosActividades') ?>" method="POST">
        <div class="contenedor">
            <div class="DivControl">
                <div class="pEstado">
                    <p id="tituloControl">Punto De Control</p>
                    <div>
                        <p>ID ZTE</p><br>
                        <input type="number" name="id_zte" class="form-control">
                    </div>
                </div>
                <div class="caracteristicas">
                    <div>
                        <label for="">Estación</label><br>
                        <input type="text" name="Estacion"><br>
                    </div>
                    <div>
                        <label for="">Tecnologia</label><br>
                        <input type="text" name="Tecnologia"><br>
                    </div>
                    <div>
                        <label for="">Banda</label><br>
                        <input type="text" name="Banda"><br>
                    </div>
                    <div>
                        <label for="">Tipo De Trabajo</label><br>
                        <input type="text" name="tipoTrabajo"><br>
                    </div>
                </div>
                <div class="estadoVM">
                    <p>estado de VM:</p>
                    <select name="selectorEstado" id="selectorEstado" class="form-group">
                        <option value="puntoControl">Punto de Control</option>
                        <option value="cierre">Cierre</option>
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
                    <option value="1">a</option>
                    <option value="2">c</option>
                    <option value="3">b</option>
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
                    <option value="">1</option>
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
        <script>
            const clickEstado = document.querySelector('#selectorEstado');
            clickEstado.addEventListener('click', ()=>{
                const estado = document.getElementById('selectorEstado').value;
                if(estado == 'cierre'){
                    document.querySelector('#tituloControl').innerHTML = 'Cierre';
                    document.querySelector('.DivInfo').style.display = 'none';
                    document.querySelector('.dos').style.display = 'block';
                    document.querySelector('.resultado').style.display = 'block';
                    document.querySelector('.resultado2').style.display = 'block';
                }else{
                    document.querySelector('#tituloControl').innerHTML = 'Punto De Control';
                    document.querySelector('.dos').style.display = 'none';
                    document.querySelector('.DivInfo').style.display = 'block';
                    document.querySelector('.resultado').style.display = 'none';
                    document.querySelector('.resultado2').style.display = 'none';
                }
            })           
        </script>
</body>
</html>