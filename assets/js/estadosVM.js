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