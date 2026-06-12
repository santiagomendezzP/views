<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="modal fade" id="ModalHoras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Reporte de Horas Laboradas</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">FECHA:</label>
            <input type="date" class="form-control" id="fecha" name="fecha" min="" max="" readonly required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">NOMBRE DEL DÍA:</label>
            <input type="text" class="form-control" id="dia" name="dia"  readonly required>
            <input type="hidden" id="p_tra" value="<?php echo $_SESSION['intranet_proyecto']?>" readonly >
            <input type="hidden" id="id_tra" value="<?php echo $_SESSION['intranet_id']?>" readonly >
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="recipient-name" class="col-form-label">HORA DE ENTRADA TURNO:</label>
              <input type="time" class="form-control calc" id="hora" name="hora" required>
            </div>
            <div class="col-md-6">
              <label for="recipient-name" class="col-form-label">HORA DE SALIDA TURNO:</label>
              <input type="time" class="form-control calc" id="hora_sal" name="hora_sal" required>
            </div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">TIEMPO EN MINUTOS DE ALMUERZO O CENA:</label>
            <select name="almuerzo" id="almuerzo" class="form-control">
              <option value="0">0 minutos</option>
              <option value="30">30 minutos</option>
              <option value="60">60 minutos</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">TOTAL HORAS TURNO:</label>
            <input type="text" class="form-control" id="horas_dia" name="horas_dia"  readonly>
          </div>
          <div id="div_horas_extras_recargo">
            <label for="recipient-name" class="col-form-label">TIPO HORAS:</label>
            <select class="form-control" id="select_reporte" onchange="hCheck(this);">
              <option>Selecciona..</option>
              <option id="horasExtras">Horas extras</option>
              <option >Horas recargo</option>
            </select>
          </div>
          <div id="div_horas_recargo_habilitado" style="display: none;">
            <label for="recipient-name" class="col-form-label">TIPO HORAS:</label>
            <select class="form-control" id="select_reporte" onchange="hCheck(this);">
              <option>Selecciona..</option>
              <option >Horas recargo</option>
            </select>
          </div>
          <div id="div_horas_extras" style="display: none;">
            <h4 style="padding: 13px; color: black; text-align: center;">HORAS EXTRAS</h4>
            <div class="row">
              <div class="col-md-6">
                <label for="recipient-name" class="col-form-label">HORA INICIAL HORAS EXTRAS:</label>
                <input type="time"  class="form-control calc" id="hora_inicio_he" name="hora_inicio_he" >
              </div>
              <div class="col-md-6">
                <label for="recipient-name" class="col-form-label">HORA FINAL HORAS EXTRAS:</label>
                <input type="time"  class="form-control calc" id="hora_fin_he" name="hora_fin_he" >
              </div>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">TOTAL HORAS EXTRAS:</label>
              <input type="text"  class="form-control" id="horas_extras" name="horas_extras"  readonly>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">CONCEPTO HORAS:</label>
              <select class="form-control" id="concepto_horas_extras" name="concepto_horas_extras">
                <option value="">Seleccione...</option>
                <option value="9">Horas extras diurnas</option>
                <option value="100">Horas extras Nocturnas</option>
                <option value="205">Horas extras diurnas dominicales o festivas</option>
                <option value="201">Horas extras nocturnas dominicales o festivas:</option>
              </select>
            </div>
          </div>
          <div id="div_horas_recargo" style="display: none;">
            <h4 style="padding: 13px; color: black; text-align: center;">HORAS RECARGO</h4>
            <div class="row">
              <div class="col-md-6">
                <label for="recipient-name" class="col-form-label">HORA INICIAL RECARGO:</label>
                <input type="time"  class="form-control calc" id="hora_inicio_rec" name="hora_inicio_rec" >
              </div>
              <div class="col-md-6">
                <label for="recipient-name" class="col-form-label">HORA FINAL RECARGO:</label>
                <input type="time"  class="form-control calc" id="hora_fin_rec" name="hora_fin_rec" >
              </div>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">TOTAL RECARGO:</label>
              <input type="text" class="form-control" id="horas_recargo" name="horas_recargo"  readonly>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">CONCEPTO HORAS:</label>
              <select class="form-control" id="concepto_horas_recargo" name="concepto_horas_recargo">
                <option value="">Seleccione...</option>
                <option value="5055">Recargos nocturnos ordinarios</option>
                <option value="5872">Recargo nocturno dominicales o festivos</option>
                <option value="5879">Recargo diurno dominical o festivo</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">ACTIVIDAD DESARROLLADA:<span style="color:red">*</span> </label>
            <textarea class="form-control" id="activi" name="activi" maxlength="400" required></textarea>
          </div>
 
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="agregar" id="agregar" >Agregar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<style>

#ModalHoras .modal-dialog{
   max-width: 800px;
}
#ModalHoras .modal-content{
   border: none;
   border-radius: 18px;
   overflow: hidden;
   box-shadow: 0 12px 35px rgba(0,0,0,.18);
}

#ModalHoras .modal-header{
   background: linear-gradient(135deg,#008ccd,#006ea3);
   border-bottom: none;
   padding: 18px 25px;
}
#ModalHoras .modal-title{
   color: #fff;
   font-weight: 600;
   font-size: 22px;
   margin: 0;
}
#ModalHoras .close{
   color: #fff;
   opacity: 1;
}

#ModalHoras .modal-body{
   background: #f8fafc;
   padding: 25px;
   max-height: 70vh;
   overflow-y: auto;
}

#ModalHoras label{
   color: #334155;
   font-weight: 600;
   margin-bottom: 6px;
}

#ModalHoras .form-control{
   border: 1px solid #dbe2ea;
   border-radius: 10px;
   min-height: 45px;
   transition: .3s;
}
#ModalHoras .form-control:focus{
   border-color: #008ccd;
   box-shadow: 0 0 0 .2rem rgba(0,140,205,.15);
}
#ModalHoras textarea.form-control{
   min-height: 110px;
}

#ModalHoras h4{
   background: #008ccd;
   color: white !important;
   border-radius: 10px;
   padding: 12px !important;
   margin: 20px 0;
   font-size: 16px;
   font-weight: 600;
   text-align: center;
}

#ModalHoras .modal-footer{
   border-top: 1px solid #e5e7eb;
   padding: 18px 25px;
}

#ModalHoras .btn-primary{
   background: #ff8d10;
   border-color: #ff8d10;
   border-radius: 10px;
   font-weight: 600;
   padding: 8px 25px;
}
#ModalHoras .btn-primary:hover{
   background: #e57e08;
   border-color: #e57e08;
}

#ModalHoras .btn-secondary{
   background: #64748b;
   border-color: #64748b;
   border-radius: 10px;
   font-weight: 600;
   padding: 8px 25px;
}
#ModalHoras .btn-secondary:hover{
   background: #475569;
   border-color: #475569;
}

#ModalHoras select.form-control{
   cursor: pointer;
}

#ModalHoras .form-group{
   margin-bottom: 1rem;
}

#ModalHoras .modal-body::-webkit-scrollbar{
   width: 8px;
}

#ModalHoras .modal-body::-webkit-scrollbar-thumb{
   background: #008ccd;
   border-radius: 20px;
}

#ModalHoras .modal-body::-webkit-scrollbar-track{
   background: #eef2f7;
}
</style>
<?php
  if(!isset($_SESSION['contador'])){
    $_SESSION['contador']=1;
  }
  if(isset($_REQUEST['agregar'])){
    $fecha=$_REQUEST['fecha']; 
    $dia=$_REQUEST['dia'];
    $horaE=$_REQUEST['hora'];
    $almuerzo=$_REQUEST['almuerzo'];
    $horaS=$_REQUEST['hora_sal'];
    $horaDia=$_REQUEST['horas_dia'];
    $horaInicio_he=$_REQUEST['hora_inicio_he'];
    $horaFin_he=$_REQUEST['hora_fin_he'];
    $horaEx=$_REQUEST['horas_extras'];
    $horaInicio_rec=$_REQUEST['hora_inicio_rec'];
    $horaFin_rec=$_REQUEST['hora_fin_rec'];
    $horaRec=$_REQUEST['horas_recargo'];
    $actividad=$_REQUEST['activi'];
    $concepto = $_REQUEST['concepto_horas_extras'] != ''?$_REQUEST['concepto_horas_extras']:$_REQUEST['concepto_horas_recargo'];

    $con=$_SESSION['contador'];
    $arr = "$fecha||$dia||$horaE||$almuerzo||$horaS||$horaDia||$horaInicio_he||$horaFin_he||$horaEx||$horaInicio_rec||$horaFin_rec||$horaRec||$actividad||$con||$concepto";
    $editar="
    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#ModalModifi'
      data-fecha='$fecha' 
      data-dia='$dia' 
      data-hora_extrada='$horaE'
      data-hora_salida='$horaS'
      data-horas_dia='$horaDia'
      data-hora_extra='$horaEx' 
      data-hora_recargo='$horaRec' 
      data-actividad='$actividad'
      data-cont='$con'
      data-array='$arr'>
      <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-square' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
      <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
      <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg>
    </button>
    <a class='btn btn-danger' data-toggle='modal' data-target='#ModalElim' data-con='$con' style='color:#ffffff;'>
      <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
      <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
      <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg>
    </a>";

    $_SESSION['reporte'][$_SESSION['contador']]['fecha']=$fecha;
    $_SESSION['reporte'][$_SESSION['contador']]['dia']=$dia;
    $_SESSION['reporte'][$_SESSION['contador']]['hora']=$horaE;
    $_SESSION['reporte'][$_SESSION['contador']]['almuerzo']=$almuerzo;
    $_SESSION['reporte'][$_SESSION['contador']]['hora_sal']=$horaS;
    $_SESSION['reporte'][$_SESSION['contador']]['horas_dia']=$horaDia;
    $_SESSION['reporte'][$_SESSION['contador']]['hora_inicio_he']=$horaInicio_he;
    $_SESSION['reporte'][$_SESSION['contador']]['hora_fin_he']=$horaFin_he;
    $_SESSION['reporte'][$_SESSION['contador']]['horas_extras']=$horaEx;
    $_SESSION['reporte'][$_SESSION['contador']]['hora_inicio_rec']=$horaInicio_rec;
    $_SESSION['reporte'][$_SESSION['contador']]['hora_fin_rec']=$horaFin_rec;
    $_SESSION['reporte'][$_SESSION['contador']]['horas_recargo']=$horaRec;
    $_SESSION['reporte'][$_SESSION['contador']]['act']=$actividad;
    $_SESSION['reporte'][$_SESSION['contador']]['concepto']=$concepto;
    $_SESSION['reporte'][$_SESSION['contador']]['edit']=$editar;
    $_SESSION['contador']=$_SESSION['contador']+1;

    $_SESSION['consolidado']['horaExDiu'] =   isset($_SESSION['consolidado']['horaExDiu'])?$_SESSION['consolidado']['horaExDiu']:0;
    $_SESSION['consolidado']['horaExNoc'] =     isset($_SESSION['consolidado']['horaExNoc'])?$_SESSION['consolidado']['horaExNoc']:0;
    $_SESSION['consolidado']['horaExDiu_dom'] = isset($_SESSION['consolidado']['horaExDiu_dom'])?$_SESSION['consolidado']['horaExDiu_dom']:0;
    $_SESSION['consolidado']['horaExNoc_dom'] = isset($_SESSION['consolidado']['horaExNoc_dom'])?$_SESSION['consolidado']['horaExNoc_dom']:0;
    $_SESSION['consolidado']['recargosNoc'] =   isset($_SESSION['consolidado']['recargosNoc'])?$_SESSION['consolidado']['recargosNoc']:0;
    $_SESSION['consolidado']['recargosNoc_dom'] = isset($_SESSION['consolidado']['recargosNoc_dom'])?$_SESSION['consolidado']['recargosNoc_dom']:0;
    $_SESSION['consolidado']['recargosDiu_dom'] = isset($_SESSION['consolidado']['recargosDiu_dom'])?$_SESSION['consolidado']['recargosDiu_dom']:0;
    switch ($concepto) {
      case 9:
          $_SESSION['consolidado']['horaExDiu'] =     $_SESSION['consolidado']['horaExDiu']+$horaEx;
          break;
      case 100:
          $_SESSION['consolidado']['horaExNoc'] =     $_SESSION['consolidado']['horaExNoc']+$horaEx;
          break;
      case 205:
          $_SESSION['consolidado']['horaExDiu_dom'] = $_SESSION['consolidado']['horaExDiu_dom']+$horaEx;
          break;
      case 201:
          $_SESSION['consolidado']['horaExNoc_dom'] = $_SESSION['consolidado']['horaExNoc_dom']+$horaEx;
          break;
    
      case 5055:
          $_SESSION['consolidado']['recargosNoc'] =   $_SESSION['consolidado']['recargosNoc']+$horaRec;
          break;
      case 5872:
          $_SESSION['consolidado']['recargosNoc_dom'] = $_SESSION['consolidado']['recargosNoc_dom']+$horaRec;
          break;
      case 5879:
          $_SESSION['consolidado']['recargosDiu_dom'] = $_SESSION['consolidado']['recargosDiu_dom']+$horaRec;
          break;
    }   
    echo "<script type='text/javascript'>window.location='index.php';</script>";
  }
?>

<script>
function hCheck(nameSelect)
{
  if(nameSelect){
    horasExtrasValue = document.getElementById("horasExtras").value;
    if(horasExtrasValue == nameSelect.value){
        document.getElementById("div_horas_extras").style.display = "block";
        document.getElementById("div_horas_recargo").style.display = "none";
    }else{
        document.getElementById("div_horas_extras").style.display = "none";
        document.getElementById("div_horas_recargo").style.display = "block";
    }
  }else{
      document.getElementById("div_horas_recargo").style.display = "none";
      document.getElementById("div_horas_extras").style.display = "none";
  }
}

$('#ModalHoras').ready(function(){

        let formulario = $(this).closest('form')[0];
        if(formulario.checkValidity())
  $('#agregar').click(function(){
    Swal.fire({
        target: document.getElementById('ModalHoras'),
        position: 'center',
        icon: 'success',
        title: 'Agregado correctamente',
        showConfirmButton: false,
        timer: 1800
    });
  });
});

$.ajax({
        method: "POST",
        url: "controller/controlador_reporte_horas.php",
        data: { peticion: "datos_horas_reportadas" },
        success: function (datos) {
          var o = JSON.parse(datos); //A la variable le asigno el json decodificado
          // console.log(o);
          // if(o[0]['documento'] == '1000991563') {
          //   var horas_extras = 48;
          //   if (horas_extras == null) {
          //     horas_extras = 0;
          //   }
          //   if (horas_extras >= 48) {
          //    $("#div_horas_recargo_habilitado").css("display","block");
          //    $("#div_horas_extras_recargo").css("display","none");
          //   }else if( horas_extras < 48){
          //    $("#div_horas_extras_recargo").css("display","block");
          //    $("#div_horas_recargo_habilitado").css("display","none");
              
          //   }
          // } else {
            
          // }

            // if(o[0]['documento'] == '1023970683' || o[0]['documento'] == '1000991563' || o[0]['documento'] == '1013598046') {
              
              var horas_extras = o[0]['horas_extras'];
              if (horas_extras == null) {
                horas_extras = 0;
              }
              if (horas_extras >= 48) {
              $("#div_horas_recargo_habilitado").css("display","block");
              $("#div_horas_extras_recargo").css("display","none");
              }else if( horas_extras < 48){
              $("#div_horas_extras_recargo").css("display","block");
              $("#div_horas_recargo_habilitado").css("display","none");
                
              }
            // } else {
            //   var horas_extras = o[0]['horas_extras'];
            //   if (horas_extras == null) {
            //     horas_extras = 0;
            //   }
            //   if (horas_extras >= 48) {
            //   $("#div_horas_recargo_habilitado").css("display","block");
            //   $("#div_horas_extras_recargo").css("display","none");
            //   }else if( horas_extras < 48){
            //   $("#div_horas_extras_recargo").css("display","block");
            //   $("#div_horas_recargo_habilitado").css("display","none");
                
            //   }
            // }
        },
  });
    $("#hora_inicio_he, #hora_fin_he").change(function(){

    let inicio = $("#hora_inicio_he").val();
    let fin = $("#hora_fin_he").val();

    if(inicio == '' || fin == ''){
        return;
    }

    // DIURNAS
if(inicio >= '06:00' && fin <= '18:59'){

    $("button[name='agregar']").prop('disabled', false);

    $("#concepto_horas_extras option").hide();
    $("#concepto_horas_extras option[value='9']").show();
    $("#concepto_horas_extras option[value='205']").show();
    $("#concepto_horas_extras option[value='']").show();
    $("#concepto_horas_extras").val('');

}
// NOCTURNAS
else if(inicio >= '19:00' || fin <= '05:59'){

    $("button[name='agregar']").prop('disabled', false);

    $("#concepto_horas_extras option").hide();
    $("#concepto_horas_extras option[value='100']").show();
    $("#concepto_horas_extras option[value='201']").show();
    $("#concepto_horas_extras option[value='']").show();
    $("#concepto_horas_extras").val('');

}
// MIXTAS
else{

    alert('Las horas registradas contienen tiempo diurno y nocturno. Debe realizar solicitudes independientes.');

    $("button[name='agregar']").prop('disabled', true);

    $("#concepto_horas_extras option").hide();
    $("#concepto_horas_extras option[value='']").show();
    $("#concepto_horas_extras").val('');

}
});
</script>
