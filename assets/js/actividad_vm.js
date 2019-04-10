$(function () {
    actividad = {
        init: function () {
            actividad.events();
            
        },

        //Eventos de la ventana.
        events: function () {
        	$('#crear_apertura').on('click', actividad.mostrar_apertura);
        },
        recoleccion_data: function (){
            $.post(base_url + '/Usuarios/buscar_datos_usuario',{

            },
                function (data){
                    var obj = JSON.parse(data);
                    if (actividades.pintartabla) {
                        var act = actividades.pintartabla(obj);
                        act.destroy();
                    }
                }
            );
        },
        pintartabla: function (data){
            actividad.obtencion_informacion = $('#tabla_actividades').DataTable(helper.configTableSearchColumn(data,[
                {title: "ID ZTE", data:"ID_ZTE"},
                {title: "Tipo de trabajo", data:"tipo_de_trabajo"},
                {title: "Estado VM", data:"estado_vm"},
                {title: "Ingeniero_Apertura", data:"ingeniero_apertura"},
                {title: "Apertura", data:"apertura"},
                ], 'tabla_actividades', '1'));
        },
        
    };
    actividad.init();
});