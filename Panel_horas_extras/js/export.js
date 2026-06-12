$('#exportar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    
    var id = button.data('id') 
    $('#id').val(id)
})
$('#exportar_rango').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    
    var id = button.data('id') 
    $('#id').val(id)
})