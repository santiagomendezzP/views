$(document).ready(function () {

  const proyecto = $("#p_tra").val();
  const id_trabajador = $("#id_tra").val();
  // console.log(proyecto);

  // CONDICIÓN PROYECTO BACK DOS DIAS HABILES 
  if ( id_trabajador == '854' || id_trabajador == '848' || id_trabajador == '424' ) {
    // MODAL ADJUNTAR HORAS
    fecha = new Date();
    año = fecha.getFullYear();
    mes_ = fecha.getMonth();
    mes = ("0" + (fecha.getMonth() + 1)).slice(-2);
    dia = ("0" + fecha.getDate()).slice(-2);
    dia_back = ("0" + (dia-1)).slice(-2);
    fecha_ = año+'-'+mes+'-'+dia;
    fecha_back = año+'-'+mes+'-'+dia_back;
    
    const fecha_adj = document.getElementById('fecha');
    // fecha_adj.setAttribute("max", fecha_);
    // fecha_adj.setAttribute("min", fecha_back);
    $('#fecha').prop('readonly',false);

    $("#fecha").change(function () {
      const fecha_adj = $("#fecha").val();
      const fecha_seleccionado = new Date(fecha_adj);
      const dia = fecha_seleccionado.getDay();
      const dias_nombres = [
        'lunes',
        'martes',
        'miércoles',
        'jueves',
        'viernes',
        'sábado',
        'domingo',
      ];
      const dia_seleccionado = dias_nombres[dia];
      $("#dia").val(dia_seleccionado);
    });
    // MODAL ENVIAR
    fechaR = new Date();
    añoR = fechaR.getFullYear();
    mes_R = fechaR.getMonth();
    mesR = ("0" + (fechaR.getMonth() + 1)).slice(-2);
    diaR = ("0" + fechaR.getDate()).slice(-2);
    diaR_back = ("0" + (diaR-1)).slice(-2);

    hora = fechaR.getHours(); 
    minuto = ("0" + fechaR.getMinutes()).slice(-2); 
    segundo = fechaR.getSeconds(); 

    fechaR_ = añoR+'-'+mesR+'-'+diaR+'T'+'23'+':'+'59'+':'+'00';
    fechaR_back = añoR+'-'+mesR+'-'+diaR_back+'T'+'00'+':'+'00'+':'+'00';
    
    const fecha_env = document.getElementById('fechaR');
    // fecha_env.setAttribute("max", fechaR_);
    // fecha_env.setAttribute("min", fechaR_back);
    $('#fechaR').prop('readonly',false);

    $("#fechaR").change(function () {
      const fecha = $("#fechaR").val();
      const fecha_seleccionada = new Date(fecha);
      const mes = fecha_seleccionada.getMonth();
      const meses_nombres = [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre",
      ];
      const mes_seleccionado = meses_nombres[mes];
      $("#mes").val(mes_seleccionado);
    });
    
  } else if (id_trabajador == '208' || id_trabajador == '271'|| proyecto == 56 || id_trabajador == '965' || id_trabajador == '1039' || id_trabajador == '479') {
    // else if (id_trabajador == '479' || id_trabajador == '948' || id_trabajador == '953' || id_trabajador == '953' || id_trabajador == '958')
    // Define la cantidad de días mínimos como variable dinámica
    let diasMinimos = 90;
     
    // Obtener la fecha actual
    const fecha = new Date();
    const año = fecha.getFullYear();
    const mes = ("0" + (fecha.getMonth() + 1)).slice(-2);
    const dia = ("0" + fecha.getDate()).slice(-2);
    
    // Calcular la fecha mínima permitida
    const fechaMinima = new Date(fecha);
    fechaMinima.setDate(fechaMinima.getDate() - diasMinimos);
    const añoMin = fechaMinima.getFullYear();
    const mesMin = ("0" + (fechaMinima.getMonth() + 1)).slice(-2);
    const diaMin = ("0" + fechaMinima.getDate()).slice(-2);
    
    const fechaMax = `${año}-${mes}-${dia}`;
    const fechaMin = `${añoMin}-${mesMin}-${diaMin}`;

    // Configurar atributos min y max dinámicamente para el campo de fecha
    const fecha_adj = document.getElementById('fecha');
    fecha_adj.setAttribute("max", fechaMax);
    fecha_adj.setAttribute("min", fechaMin);
    $('#fecha').prop('readonly', false);

    $("#fecha").change(function () {
      const fechaAdj = $("#fecha").val();
      const fechaSeleccionada = new Date(fechaAdj);
      const dia = fechaSeleccionada.getDay();
      const diasNombres = [
        'lunes',
        'martes',
        'miércoles',
        'jueves',
        'viernes',
        'sábado',
        'domingo',
      ];
      const diaSeleccionado = diasNombres[dia];
      $("#dia").val(diaSeleccionado);
    });

    // MODAL ENVIAR
    const fechaR = new Date();
    const añoR = fechaR.getFullYear();
    const mesR = ("0" + (fechaR.getMonth() + 1)).slice(-2);
    const diaR = ("0" + fechaR.getDate()).slice(-2);

    const fechaRMinima = new Date(fechaR);
    fechaRMinima.setDate(fechaRMinima.getDate() - diasMinimos);
    const añoRMin = fechaRMinima.getFullYear();
    const mesRMin = ("0" + (fechaRMinima.getMonth() + 1)).slice(-2);
    const diaRMin = ("0" + fechaRMinima.getDate()).slice(-2);

    const fechaRMax = `${añoR}-${mesR}-${diaR}T23:59:00`;
    const fechaRMin = `${añoRMin}-${mesRMin}-${diaRMin}T00:00:00`;

    const fecha_env = document.getElementById('fechaR');
    fecha_env.setAttribute("max", fechaRMax);
    fecha_env.setAttribute("min", fechaRMin);
    $('#fechaR').prop('readonly', false);

    $("#fechaR").change(function () {
      const fechaSeleccionada = $("#fechaR").val();
      const fechaSeleccionadaObj = new Date(fechaSeleccionada);
      const mes = fechaSeleccionadaObj.getMonth();
      const mesesNombres = [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre",
      ];
      const mesSeleccionado = mesesNombres[mes];
      $("#mes").val(mesSeleccionado);
    });
  } else {
  // if(id_trabajador == '479' || id_trabajador == '9') {
    // Define la cantidad de días mínimos como variable dinámica
    let diasMinimos = 3;
    
    // Obtener la fecha actual
    const fecha = new Date();
    const año = fecha.getFullYear();
    const mes = ("0" + (fecha.getMonth() + 1)).slice(-2);
    const dia = ("0" + fecha.getDate()).slice(-2);
    
    // Calcular la fecha mínima permitida
    const fechaMinima = new Date(fecha);
    fechaMinima.setDate(fechaMinima.getDate() - diasMinimos);
    const añoMin = fechaMinima.getFullYear();
    const mesMin = ("0" + (fechaMinima.getMonth() + 1)).slice(-2);
    const diaMin = ("0" + fechaMinima.getDate()).slice(-2);
    
    const fechaMax = `${año}-${mes}-${dia}`;
    const fechaMin = `${añoMin}-${mesMin}-${diaMin}`;

    // Configurar atributos min y max dinámicamente para el campo de fecha
    const fecha_adj = document.getElementById('fecha');
    fecha_adj.setAttribute("max", fechaMax);
    fecha_adj.setAttribute("min", fechaMin);
    $('#fecha').prop('readonly', false);

    $("#fecha").change(function () {
      const fechaAdj = $("#fecha").val();
      const fechaSeleccionada = new Date(fechaAdj);
      const dia = fechaSeleccionada.getDay();
      const diasNombres = [
        'lunes',
        'martes',
        'miércoles',
        'jueves',
        'viernes',
        'sábado',
        'domingo',
      ];
      const diaSeleccionado = diasNombres[dia];
      $("#dia").val(diaSeleccionado);
    });

    // MODAL ENVIAR
    const fechaR = new Date();
    const añoR = fechaR.getFullYear();
    const mesR = ("0" + (fechaR.getMonth() + 1)).slice(-2);
    const diaR = ("0" + fechaR.getDate()).slice(-2);

    const fechaRMinima = new Date(fechaR);
    fechaRMinima.setDate(fechaRMinima.getDate() - diasMinimos);
    const añoRMin = fechaRMinima.getFullYear();
    const mesRMin = ("0" + (fechaRMinima.getMonth() + 1)).slice(-2);
    const diaRMin = ("0" + fechaRMinima.getDate()).slice(-2);

    const fechaRMax = `${añoR}-${mesR}-${diaR}T23:59:00`;
    const fechaRMin = `${añoRMin}-${mesRMin}-${diaRMin}T00:00:00`;

    const fecha_env = document.getElementById('fechaR');
    fecha_env.setAttribute("max", fechaRMax);
    fecha_env.setAttribute("min", fechaRMin);
    $('#fechaR').prop('readonly', false);

    $("#fechaR").change(function () {
      const fechaSeleccionada = $("#fechaR").val();
      const fechaSeleccionadaObj = new Date(fechaSeleccionada);
      const mes = fechaSeleccionadaObj.getMonth();
      const mesesNombres = [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre",
      ];
      const mesSeleccionado = mesesNombres[mes];
      $("#mes").val(mesSeleccionado);
    });
  }
});