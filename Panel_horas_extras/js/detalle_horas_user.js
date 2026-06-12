$('#modal_modificar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
      
var fecha = button.data('fecha') 
$('#fechaM').val(fecha)

var dia_s = button.data('dia_ds') 
$('#diam_').val(dia_s)

var horaE = button.data('hora_extrada') 
$('#horaM').val(horaE)

var horaS = button.data('hora_salida') 
$('#hora_salM').val(horaS)

var horaDia = button.data('horas_dia') 
$('#horas_diaM').val(horaDia)

var horaEx = button.data('hora_extra') 
$('#horas_extrasM').val(horaEx)

var horaRec = button.data('hora_recargo') 
$('#horas_recargoM').val(horaRec)

var actividad = button.data('actividad') 
$('#activiM').val(actividad)

var obvser = button.data('obvser') 
$('#obvserM').val(obvser)

var id = button.data('id') 
$('#id').val(id)

var est = button.data('est') 
$('#est').val(est)

var id_r = button.data('id_r') 
$('#id_re').val(id_r)

var almuerzo = button.data('almuerzo_dat')
$('#almuerzo').val(almuerzo);

var hora_inicio_he = button.data('hora_inicio_he_dat')
$('#hora_inicio_he').val(hora_inicio_he);

var hora_fin_he = button.data('hora_fin_he_dat')
$('#hora_fin_he').val(hora_fin_he);

var codigo_concepto_extras_dat = button.data('codigo_concepto_extras_dat')
$('#concepto_horas_extras').val(codigo_concepto_extras_dat);

var codigo_concepto_recargo_dat = button.data('codigo_concepto_recargo_dat')
$('#concepto_horas_recargo').val(codigo_concepto_recargo_dat);

var codigo_concepto_horas = button.data('codigo_concepto_hora')
$('#concepto_horas').val(codigo_concepto_horas);



  if (codigo_concepto_horas == 9 || codigo_concepto_horas == 100 || codigo_concepto_horas == 205 || codigo_concepto_horas == 201 ) {
    document.getElementById("div_horas_extras").style.display = "block";
    document.getElementById("div_horas_recargo").style.display = "none";
    $("#hora_inicio_rec").val('::');
    $("#hora_fin_rec").val('::');
    $("#horas_recargoM").val('0');
    concepto = $('#concepto_horas_extras').value;
    $("#concepto_horas_recargo").val(concepto);
  }else if (codigo_concepto_horas == 5055 || codigo_concepto_horas == 5872 || codigo_concepto_horas == 5879){
    document.getElementById("div_horas_extras").style.display = "none";
    document.getElementById("div_horas_recargo").style.display = "block";
    $("#hora_inicio_he").val('::');
    $("#hora_fin_he").val('::');
    $("#horas_extrasM").val('0');
    concepto = $('#concepto_horas_recargo').value;
    $("#concepto_horas_extras").val(concepto);
  }
  // VALIDACION PROYECTO HABILITA REGISTRO FECHAS ANTERIORES
  var proyecto = button.data('proyecto') 
  if(proyecto == 56){
      
    $('#fechaM').prop('readonly',false);
  }


})

$('#modifi_con').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal

  var hora_extra_diu = button.data('hora_extra_diu') 
  $('#horaExDiu').val(hora_extra_diu)

  var hora_extra_noct = button.data('hora_extra_noct') 
  $('#horaExNoc').val(hora_extra_noct)

  var hora_extra_diu_dom = button.data('hora_extra_diu_dom') 
  $('#horaExDiu_dom').val(hora_extra_diu_dom)

  var hora_extra_noct_dom = button.data('hora_extra_noct_dom') 
  $('#horaExNoc_dom').val(hora_extra_noct_dom)

  var recargo_noct = button.data('recargo_noct') 
  $('#recargosNoc').val(recargo_noct)
  
  var recargo_noct_dom = button.data('recargo_noct_dom') 
  $('#recargosNoc_dom').val(recargo_noct_dom)

  var recargo_diur_dom = button.data('recargo_diur_dom') 
  $('#recargosDiu_dom').val(recargo_diur_dom)

  var est = button.data('est') 
  $('#est2').val(est)
  
  var id_r = button.data('id_r') 
  $('#id_re2').val(id_r)
  
})

