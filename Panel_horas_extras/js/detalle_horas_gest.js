
$('#aprobar_hora').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
      
    var id = button.data('id') 
    $('#id').val(id)

    var id_r = button.data('id_r_gestion') 
    $('#id_reporte_horas').val(id_r)

    var correo_solicitante_get = button.data('correo_solicitante_data_gest') 
    $('#correo_solicitante_').val(correo_solicitante_get)

    var nombre_solicitante_get = button.data('nombre_solicitante_data_gest') 
    $('#nombre_solicitante_').val(nombre_solicitante_get)
})

$('#aprobar_con_gest').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
      
    var id_r = button.data('id_r') 
    $('#id_r').val(id_r)

    var correo_solicitante_get_c = button.data('correo_solicitante_data_gest_con') 
    $('#correo_solicitante_c').val(correo_solicitante_get_c)

    var nombre_solicitante_get_c = button.data('nombre_solicitante_data_gest_con') 
    $('#nombre_solicitante_c').val(nombre_solicitante_get_c)
})

 $( "#atras_gest" ).click(function() {
    $(function() {
        load(1);
    });
    function load(page){
        var query=$("#q").val();
        var per_page=10;
        var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
        $("#loader").fadeIn('slow');
        $.ajax({
            url:'ajax/listar_horas_gest.php',
            data: parametros,
            beforeSend: function(objeto){
            $("#loader").html("Cargando...");
          },
            success:function(data){
                $(".outer_div").html(data).fadeIn('slow');
                $("#loader").html("");
            }
        })
    }
  });