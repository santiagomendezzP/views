<div class="modal fade" id="ModalModifi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d0d0d0;">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <h4 style=" padding: 13px; color: black;   text-align: center;">EDITAR HORAS</h4>
      <div class="modal-body">
        <form  method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fecha:</label>
            <input type="date" class="form-control" id="fechaM" name="fechaM">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Nombre del dia:</label>
              <select class="form-control form-control-sm" name="diaM" id="diaM">
                <option value="lunes">Lunes</option>
                <option value="martes"> Martes</option>
                <option value="miercoles">Miecroles </option>
                <option value="jueves">Jueves</option>
                <option value="viernes">Viernes</option>
                <option value="sabado">Sabado</option>
                <option value="domingo">Domingo</option>
              </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hora de entrada:</label>
            <input type="time" class="form-control" id="horaM" name="horaM">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tiempo de almuerzo o cena:</label>
            <input type="number" class="form-control" id="almuerzoM" name="almuerzoM">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hora de salida:</label>
            <input type="time" class="form-control" id="hora_salM" name="hora_salM">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Total horas dia trabajadas:</label>
            <input type="number" class="form-control" id="horas_diaM" name="horas_diaM">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hora inicio horas extras:</label>
            <input type="time" class="form-control" id="hora_inicio_heM" name="hora_inicio_heM">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hora fin horas extras:</label>
            <input type="time" class="form-control" id="hora_fin_heM" name="hora_fin_heM">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Total horas extras:</label>
            <input type="number" class="form-control" id="horas_extrasM" name="horas_extrasM">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hora inicio recargo:</label>
            <input type="time" class="form-control" id="hora_inicio_recM" name="hora_inicio_recM">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hora fin recargo:</label>
            <input type="time" class="form-control" id="hora_fin_recM" name="hora_fin_recM">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Total Horas recargo:</label>
            <input type="number" class="form-control" id="horas_recargoM" name="horas_recargoM">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Actividad desarrollada:</label>
            <input type="text" class="form-control" id="activiM" name="activiM">
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" id="cont" name="cont">
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="modificar" id="modificar" >Actualizar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
if(isset($_REQUEST['modificar'])){
  $fecha=$_REQUEST['fechaM']; 
  $dia=$_REQUEST['diaM'];
  $horaE=$_REQUEST['horaM'];
  $almuerzoM=$_REQUEST['almuerzoM'];
  $horaS=$_REQUEST['hora_salM'];
  $horaDia=$_REQUEST['horas_diaM'];
  $hora_inicio_heM=$_REQUEST['hora_inicio_heM'];
  $hora_fin_heM=$_REQUEST['hora_fin_heM'];
  $horaEx=$_REQUEST['horas_extrasM'];
  $hora_inicio_recM=$_REQUEST['hora_inicio_recM'];
  $hora_fin_recM=$_REQUEST['hora_fin_heM'];
  $horaRec=$_REQUEST['horas_recargoM'];
  $actividad=$_REQUEST['activiM'];
  $obvser=$_REQUEST['obvserM'];
  $con=$_REQUEST['cont'];
  $editar="<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#ModalModifi'
  data-fecha='$fecha' data-dia='$dia' data-hora_extrada='$horaE'
  data-hora_salida='$horaS' data-horas_dia='$horaDia'
  data-hora_extra='$horaEx' data-hora_recargo='$horaRec' 
  data-actividad='$actividad' data-obvser='$obvser' data-cont='$con'><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-square' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
  <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
  <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
  </svg></button>
  <a class='btn btn-danger' data-toggle='modal' data-target='#ModalElim' data-con='$con' style='color:#ffffff;'><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
  </svg></a>";
  $_SESSION['reporte'][$con]['fecha']=$fecha;
  $_SESSION['reporte'][$con]['dia']=$dia;
  $_SESSION['reporte'][$con]['hora']=$horaE;
  $_SESSION['reporte'][$con]['almuerzo']=$almuerzoM;
  $_SESSION['reporte'][$con]['hora_sal']=$horaS;
  $_SESSION['reporte'][$con]['horas_dia']=$horaDia;
  $_SESSION['reporte'][$con]['hora_inicio_he']=$hora_inicio_heM;
  $_SESSION['reporte'][$con]['hora_fin_he']=$hora_fin_heM;
  $_SESSION['reporte'][$con]['horas_extras']=$horaEx;
  $_SESSION['reporte'][$con]['hora_inicio_rec']=$hora_inicio_recM;
  $_SESSION['reporte'][$con]['hora_fin_rec']=$hora_fin_recM;
  $_SESSION['reporte'][$con]['horas_recargo']=$horaRec;
  $_SESSION['reporte'][$con]['act']=$actividad;
  $_SESSION['reporte'][$con]['obv']=$obvser;
  $_SESSION['reporte'][$con]['edit']=$editar;
  echo "<script type='text/javascript'>window.location='index.php';</script>";
}
?>