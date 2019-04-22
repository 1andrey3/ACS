<style>
.contenedor{
    display: grid;
    height: 100%;
    width: 100%;
    margin: 0 4px 0 60px;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: repeat(3, 1fr);
    grid-gap: 5px;
    background-color: white;
}
.DivControl{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: repeat(2, 1fr);
    grid-gap: 2px;
    height: 250px;
    background-color: #084c6f;
    border:none;
    border-radius: 8px;
    color: #D2C9C9;
}
.DivInfo{
    height: 200px;
    grid-column: 1 / 3;
    padding-top: 10px;
    
}
.pEstado{
    padding-left: 35px;
}
.pEstado > p {
    font-size: 35px;
}
.estadoVM{
    display: inline;
    grid-column: 1 / 3;
}
.DivInfo textarea{
    width: 75%;
}
.DivCierre{
    display: none;
    height: 400px;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(1, 1fr);
    grid-gap: 8px;
}
.resultado{
   display: none;
   grid-template-columns: 1fr 1fr;
   grid-template-rows: 1fr;
   grid-gap: 10px;
   height: 300px;
}
.resultado textarea{
    width: 100%;
}
.cabecera{
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 10px;
}
.contenedor_opciones li{
  height: 40px;
  padding: 8px;
  border: 1px solid black;
}
.contenedor_opciones li:hover{
    background-color: #084c6f;
    color: #D2C9C9; 
    
}

</style>

<body>
    <div>
        ESTADO:
        <div class="contenedor_opciones">
            <li class="boton_control">Punto De Control</li>
            <li class="boton_cierre">Cierre</li>
        </div>
    </div>
    <form action="">
        <div class="contenedor">
            <div class="DivControl">
                <div class="pEstado">
                    <p>PUNTO DE CONTROL</p>
                    <div>
                        <p>ID ZTE</p><br>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="">Estación</label><br>
                        <input type="text"><br>
                    </div>
                    <div>
                        <label for="">Tecnologia</label><br>
                        <input type="text"><br>
                    </div>
                    <div>
                        <label for="">Banda</label><br>
                        <input type="text"><br>
                    </div>
                    <div>
                        <label for="">Tipo De Trabajo</label><br>
                        <input type="text"><br>
                    </div>
                </div>
                <div class="estadoVM">
                    <p>estado de VM:</p>
                    <select name="" id="" class="form-group">
                        <option value="">aasdasd</option>
                        <option value="">ghsdfafhgfdc</option>
                    </select>
                </div>
            </div>
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem quos possimus dolor impedit nulla voluptate cum laborum. Fugit quam, excepturi, minima, cum exercitationem repellat magni et quidem asperiores incidunt doloremque?</div>
            <div class="DivInfo">
                <label> Ingeniero Control: </label>
                <select name="" id="" class="form-control">
                    <option value="">a</option>
                    <option value="" >c</option>
                    <option value="" >b</option>
                </select> <br>
                <label for="">Hora Revisión:</label>
                <input type="text" placeholder="ej: 14:00"> <br><br>
                <label for="">Comentarios Punto De Control:</label><br>
                <textarea name="" id="" cols="20" rows="5">        
                </textarea><br>
                <input type="submit" value="Enviar">
            </div> 
        </form>
    </div>
    <div class="DivCierre">
        <div class="cabecera">
            <div class="pEstado">
                <p>CIERRE</p>
                <div>
                    <p>ID ZTE</p>
                    <input type="text" class="">
                </div>
            </div>
            <div>
                <label for="">Estación</label><br>
                <input type="text"><br>
                <label for="">Tecnologia</label><br>
                <input type="text"><br>
                <label for="">Banda</label><br>
                <input type="text"><br>
                <label for="">Tipo De Trabajo</label><br>
                <input type="text"><br>
            </div>
        </div>
        <div class="dos">
            <label for="">RET:</label>
            <select name="" id="" class="form-control">
                <option value="">a</option>
            </select><br>
            <label for="">Ampleación Dualbeam:</label>
            <select name="" id="" class="form-control">
                <option value="">b</option>
            </select><br>
            <label for="">Selectores Dualbeam</label>
            <select name="" id="" class="form-control">
                <option value="">c</option>
            </select><br>
            <label for="">Tipo de Solución:</label>
            <select name="" id="" class="form-control">
                <option value="">d</option>
            </select><br>
        </div>
        <div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero nemo quidem, sint facilis dolorum est nesciunt perspiciatis ratione totam molestias, quod vero repellendus deleniti ut. Eaque amet consectetur cupiditate ut!
        </div>
    </div>
    <div class="resultado">
            <div>
                <label for="">Estado VM</label>
                <select name="" id="" class="form-control">
                    <option value=""></option>
                </select><br>     
                <label for="">Sub-estado</label>
                <select name="" id="" class="form-control">
                    <option value=""></option>
                </select><br>  
                <label for="">al iniciar VM se encontro:</label>
                <select name="" id="" class="form-control">
                    <option value=""></option>
                </select><br>  
                <label for="">¿Presento falla final?</label>
                <select name="" id="" class="form-control">
                    <option value=""></option>
                </select><br> 
                <label for="">Tipo de falla Final</label>
                <select name="" id="" class="form-control">
                    <option value=""></option>
                </select><br>  
                <label for="">VISTAS_MM</label>
                <select name="" id="" class="form-control">
                    <option value=""></option>
                </select><br>  
                <label for="">Estado Notificación</label>
                <select name="" id="" class="form-control">
                    <option value=""></option>
                </select><br>  
                <label for="">Ingeniero Cierre</label>
                <select name="" id="" class="form-control">
                    <option value=""></option>
                </select><br>  
                <label for="">Hora Atención Cierre</label>
                <input type="text" class="form-control">  
                <label for="">Hora de Cierre Confirmado</label>
                <input type="text" class="form-control"> 
                <label for="">Comentarios Cierre:</label> <br>
                <textarea name="" id="" cols="30" rows="10">
                </textarea>  
            </div>
        </div>

        <script>
           const control = document.querySelector('.boton_control');
           const cierre = document.querySelector('.boton_cierre');
           console.log(control, cierre);

           cierre.addEventListener('click', ()=>{
               document.querySelector('.contenedor').style.display = 'none';
               document.querySelector('.DivCierre').style.display = 'grid';
               document.querySelector('.resultado').style.display = 'grid';
           })           
           control.addEventListener('click', ()=>{
               document.querySelector('.contenedor').style.display = 'grid';
               document.querySelector('.DivCierre').style.display = 'none';
               document.querySelector('.resultado').style.display = 'none';
           })           
        </script>
</body>
</html>