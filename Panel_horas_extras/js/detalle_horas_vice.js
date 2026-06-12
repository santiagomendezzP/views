
$('#apro_vice').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
      
        var id = button.data('id') 
        $('#id').val(id)
})
$('#aprobar_con_vice').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
      
    var id_r = button.data('id_r') 
    $('#id_r').val(id_r)

    var correo_solicitante_vice = button.data('correo_solicitante_vice_data') 
    $('#correo_solicitante_vice').val(correo_solicitante_vice)

    var nombre_solicitante_vice = button.data('nombre_solicitante_vice_data') 
    $('#nombre_solicitante_vice').val(nombre_solicitante_vice)
})

