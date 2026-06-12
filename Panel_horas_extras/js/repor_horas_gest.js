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

// function ver(id){
//     var url="./ajax/listar_detalle_gestion.php"
//     var id = id;
//     $.ajax({   
//         type: "POST",
//         url:url,
//         data:{ id: id},
//         success: function(datos){    
//             $('.outer_div').html(datos);
//         }
//     });
// }
