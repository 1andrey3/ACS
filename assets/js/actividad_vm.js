$(function () {
    actividad = {
        init: function () {
            actividad.events();
            actividad.recoleccion_data();
            
        },

        //Eventos de la ventana.
        events: function () {
        	$('#crear_apertura').on('click', actividad.mostrar_apertura);
        },
        recoleccion_data: function (){
            $.post(base_url + '/Usuarios/buscar_actividades',{
            },
                function (data){
                    var obj = JSON.parse(data);
                    console.log(obj);
                    if (actividad.pintartabla) {
                        var act = actividad.obtencion_informacion(obj);
                        act.destroy();
                    }

                    actividad.obtencion_informacion = $('#tabla_actividades').DataTable(helper.configTableSearchColumn(obj,[
                        {title: "ID ZTE", data:"id_zte"},
                        {title: "Tipo de trabajo", data:"tipo_de_trabajo"},
                        {title: "Ingeniero_Apertura", data:"ingeniero_apertura"},
                    ], 'tabla_actividades', 1));
                }
            );
        },

        /*obt_estados: function(data){
            let select = `<select style='width:142px; height:27px; border-radius:6px;'>
            <optgroup label='Seleccione un estado'>
            <option value="">Activo</option>
            <option value="">Cerrado</option>
            <option value="">Pendiente apertura</option>
            <option value="">Rechazado</option>
            </optgroup>
            </select>`;

            return select;

        },*/
        /*pintartabla: function (data){
            actividad.obtencion_informacion = $('#tabla_actividades').DataTable(helper.configTableSearchColumn(data,[
                {title: "ID ZTE", data:"ID_ZTE"},
                {title: "Tipo de trabajo", data:"tipo_de_trabajo"},
                {title: "Estado VM", data:"estado_vm"},
                {title: "Ingeniero_Apertura", data:"ingeniero_apertura"},
                {title: "Apertura", data:"apertura"},
                ], 'tabla_actividades', '1'));
        },*/
        
    };
    actividad.init();
});