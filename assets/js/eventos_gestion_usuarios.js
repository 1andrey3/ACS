`use strict`

$('.boton_crear').click(function() {
  $(this).addClass('modificado');
  $('.boton_modificar').removeClass('modificado');
  $('.crear').addClass(`ver_flex`);
  $('.modificar').css(`display`,`none`);

});

$('.boton_modificar').click(function() {
  $(this).addClass('modificado');
  $('.boton_crear').removeClass('modificado');
  $('.crear').removeClass(`ver_flex`);
  $('.crear').css(`display`,`none`);
  $('.modificar').css(`display`,`block`);

});

function validacion1(data){
if (data == "") {
  alert("Por favor complete los campos");
  return false;
}else {
}

}
