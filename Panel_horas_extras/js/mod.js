$('#ModalModifi').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal

    
    var array = button.data('array') 
    let str = array.split('||'); 

    $('#fechaM').val(str[0])
    $('#diaM').val(str[1])
    $('#horaM').val(str[2])
    $('#almuerzoM').val(str[3])
    $('#hora_salM').val(str[4])
    $('#horas_diaM').val(str[5])
    $('#hora_inicio_heM').val(str[6])
    $('#hora_fin_heM').val(str[7])
    $('#horas_extrasM').val(str[8])
    $('#hora_inicio_recM').val(str[9])
    $('#hora_fin_recM').val(str[10])
    $('#horas_recargoM').val(str[11])
    $('#activiM').val(str[12])
    $('#cont').val(str[13])
   
  })
  $('#ModalElim').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
      
        var con = button.data('con') 
        $('#contad').val(con)
        
      })