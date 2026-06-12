$('#aceptar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
      
    var id = button.data('id') 
    $('#id').val(id)

    var id_r = button.data('id_r') 
    $('#id_reporte_horas').val(id_r)

    var nombre_solicitante = button.data('nombre_solicitante_data') 
    $('#nombre_solicitante').val(nombre_solicitante)

    var correo_solicitante = button.data('correo_solicitante_data') 
    $('#correo_solicitante').val(correo_solicitante)
})



$('#aprobar_con_jefe').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    
    var id_r = button.data('id_r') 
    $('#id_r').val(id_r)

    var nombre_solicitante_con = button.data('nombre_solicitante_data_con') 
    $('#nombre_solicitante_con').val(nombre_solicitante_con)

    var correo_solicitante_con = button.data('correo_solicitante_data_con') 
    $('#correo_solicitante_con').val(correo_solicitante_con)
})


$( "#atras" ).click(function() {

        var fechaI = $("#fecha_ini").val();
        var fechaF = $("#fecha_fin").val();
        load(fechaI,fechaF);
    
});