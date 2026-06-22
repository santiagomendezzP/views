function calculardiferencia(hora_inicio, hora_final, input) {
  var formatohora = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;

  if (!(hora_inicio.match(formatohora)
    && hora_final.match(formatohora))) {
    return;
  }

  var minutos_inicio = hora_inicio.split(':')
    .reduce((p, c) => parseInt(p) * 60 + parseInt(c));
  var minutos_final = hora_final.split(':')
    .reduce((p, c) => parseInt(p) * 60 + parseInt(c));

  var diferencia = minutos_final - minutos_inicio;

  var horas = Math.floor(diferencia / 60);
  var minutos = diferencia % 60;
  var b = horas + '';

  var horas_string = b;
  var horas_sin_signo = horas_string.replace(/[-]/g, '');
  total_h = (24 - horas_sin_signo);

  if (hora_final < hora_inicio) {
    var diferencia2 = minutos_inicio - minutos_final;
    var minutos2 = diferencia2 % 60;
    $("#" + input).val(total_h + (minutos2 == 30 ? '.5' : ''));
  } else if (hora_final > hora_inicio) {
    $("#" + input).val(horas + (minutos == 30 ? '.5' : ''));
  }
}

function selector() {
  id = $(this).attr('id')
  if (id == "hora" || id == "hora_sal") {
    hora_inicio = $("#hora").val()
    hora_final = $("#hora_sal").val()
    input = 'horas_dia'
  } else if (id == "hora_inicio_he" || id == "hora_fin_he") {
    hora_inicio = $("#hora_inicio_he").val()
    hora_final = $("#hora_fin_he").val()
    input = 'horas_extras'
  } else if (id == "hora_inicio_rec" || id == "hora_fin_rec") {
    hora_inicio = $("#hora_inicio_rec").val()
    hora_final = $("#hora_fin_rec").val()
    input = 'horas_recargo'
  }
  calculardiferencia(hora_inicio, hora_final, input)

  if (id == "hora_inicio_he" || id == "hora_fin_he") {
    clasificarYFiltrarConcepto();
  }
}

$(".calc").change(selector)


function clasificarYFiltrarConcepto() {
  var inicio = $("#hora_inicio_he").val();
  var fin = $("#hora_fin_he").val();
  var select = document.getElementById('concepto_horas_extras');

  select.value = '';
  select.disabled = true;
  for (var i = 0; i < select.options.length; i++) {
    select.options[i].style.display = '';
    select.options[i].disabled = false;
  }
  if (!inicio || !fin) return;

  var ini = parseInt(inicio.replace(':', ''), 10);
  var end = parseInt(fin.replace(':', ''), 10);

  var horasExtras = parseFloat($("#horas_extras").val()) || 0;

  if (horasExtras > 2) {

    Swal.fire({
      target: document.getElementById('ModalHoras'),
      icon: 'warning',
      title: 'Límite excedido',
      text: 'Las horas extras no pueden superar las 2 horas por solicitud.',
      confirmButtonColor: '#008ccd'
    });

    $("#hora_fin_he").val('');
    $("#horas_extras").val('');

    return;
  }

  
  var esMixto = false;

  if (ini >= 600 && ini < 1900 && end > 1900) {
    esMixto = true;
  }
  if (ini < 600 && end > 600 && end < 1900) {
    esMixto = true;
  }

  if (esMixto) {

    Swal.fire({
      target: document.getElementById('ModalHoras'),
      icon: 'warning',
      title: 'Rango mixto detectado',
      text: 'El rango registrado contiene horas extra diurnas y nocturnas. Para garantizar una correcta clasificación y liquidación, registre las horas diurnas y nocturnas en solicitudes independientes.',
      confirmButtonColor: '#008ccd'
    });

    $("#hora_fin_he").val('');
    $("#horas_extras").val('');

    return;
  }

  select.disabled = false;
  var ocultar = [];

  if (ini >= 600 && ini < 1900 && end <= 1900) {
    ocultar = ['100', '201'];
  }

  else if (ini >= 1900 || end <= 600) {
    ocultar = ['9', '205'];
  }

  for (var k = 0; k < select.options.length; k++) {
    if (ocultar.indexOf(select.options[k].value) !== -1) {
      select.options[k].style.display = 'none';
      select.options[k].disabled = true;
    }
  }
}

$('#ModalHoras').on('shown.bs.modal', function () {
  clasificarYFiltrarConcepto();
});

$('#ModalHoras').on('hidden.bs.modal', function () {
  var select = document.getElementById('concepto_horas_extras');
  select.value = '';
  select.disabled = true;
  for (var i = 0; i < select.options.length; i++) {
    select.options[i].style.display = '';
    select.options[i].disabled = false;
  }
});