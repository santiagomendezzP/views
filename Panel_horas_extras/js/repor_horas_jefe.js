$(function() {
    var fechaI = $("#fecha_ini").val();
    var fechaF = $("#fecha_fin").val();
    load(fechaI,fechaF);
});


$("#fecha_ini").change(function(){
    load($("#fecha_ini").val(),$("#fecha_fin").val());
})
$("#fecha_fin").change(function(){
    load($("#fecha_ini").val(),$("#fecha_fin").val());
})

