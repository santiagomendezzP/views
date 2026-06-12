
$('#aprobar_con_gere').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
      
    var id_r = button.data('id_r') 
    $('#id_g').val(id_r)

    var correo_solicitante_gere = button.data('correo_solicitante_gere_data') 
    $('#correo_solicitante_gere').val(correo_solicitante_gere)

    var nombre_solicitante_gere = button.data('nombre_solicitante_gere_data') 
    $('#nombre_solicitante_gere').val(nombre_solicitante_gere)
})
