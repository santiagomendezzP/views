$(function() {
    load(1);
});
function load(page){
    var query=$("#q").val();
    var per_page=10;
    var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
    $("#loader").fadeIn('slow');
    $.ajax({
        url:'./ajax/listar_repo.php',
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
function ver(id_p,estado_p){
    var url="./ajax/listar_Detalle_user.php"
    var id = id_p;
    var estado = estado_p;
    $.ajax({
        type: "POST",
        url:url,
        data:{ id: id, estado: estado},
        success: function(datos){    
            $('.outer_div').html(datos);
        }
    });
}
