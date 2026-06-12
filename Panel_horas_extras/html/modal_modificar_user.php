<?php
/** 
* @author Don Pelusas And Mentiritas
**/
$dias = array("domingo","lunes","martes","miércoles","jueves","viernes","sábado");
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="modal fade" id="modal_modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d0d0d0;">
        <h3 class="modal-title" id="exampleModalLabel">MODIFICAR</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <input type="hidden" id="concepto_horas" name="concepto_horas">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">FECHA:</label>
            <input type="date" class="form-control" id="fechaM" name="fechaM" value="<?php echo date('Y-m-d')?>" requided readonly>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">NOMBRE DEL DÍA:</label>
            <input type="text" class="form-control" id="diam_" name="diam_" value=<?php echo $dias[date('w')];?> readonly>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="recipient-name" class="col-form-label">HORA DE ENTRADA TURNO:</label>
              <input type="time" class="form-control calc" id="horaM" name="horaM" requided>
            </div>
            <div class="col-md-6">
              <label for="recipient-name" class="col-form-label">HORA DE SALIDA TURNO:</label>
              <input type="time" class="form-control calc" id="hora_salM" name="hora_salM" requided>
            </div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">TIEMPO EN MINUTOS DE ALMUERZO O CENA:</label>
            <select name="almuerzo" id="almuerzo" class="form-control">
              <option value="0">0 minutos</option>
              <option value="30">30 minutos</option>
              <option value="45">45 minutos</option>
              <option value="60">60 minutos</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">TOTAL HORAS TURNO:</label>
            <input type="text" class="form-control" id="horas_diaM" name="horas_diaM" requided >
          </div>
          <!-- <label for="recipient-name" class="col-form-label">TIPO HORAS:</label>
          <select class="form-control" id="select_reporte" onchange="hCheck(this);">
            <option>Selecciona..</option>
            <option id="horasExtras">Horas extras</option>
            <option >Horas recargo</option>
          </select> -->
          <div id="div_horas_extras" style="display: none;">
            <h4 style="padding: 13px; color: black; text-align: center;">HORAS EXTRAS</h4>
            <div class="row">
              <div class="col-md-6">
                <label for="recipient-name" class="col-form-label">HORA INICIAL HORAS EXTRAS:</label>
                <input type="time"  class="form-control calc" id="hora_inicio_he" name="hora_inicio_he" requided>
              </div>
              <div class="col-md-6">
                <label for="recipient-name" class="col-form-label">HORA FINAL HORAS EXTRAS:</label>
                <input type="time"  class="form-control calc" id="hora_fin_he" name="hora_fin_he" requided>
              </div>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">TOTAL HORAS EXTRAS:</label>
              <input type="text"  class="form-control" id="horas_extrasM" name="horas_extrasM" requided >
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
                <input type="time"  class="form-control calc" id="hora_inicio_rec" name="hora_inicio_rec" requided>
              </div>
              <div class="col-md-6">
                <label for="recipient-name" class="col-form-label">HORA FINAL RECARGO:</label>
                <input type="time"  class="form-control calc" id="hora_fin_rec" name="hora_fin_rec" requided>
              </div>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">TOTAL RECARGO:</label>
              <input type="text" class="form-control" id="horas_recargoM" name="horas_recargoM" requided >
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
            <label for="recipient-name" class="col-form-label">ACTIVIDAD DESARROLLADA:</label>
            <textarea class="form-control" id="activiM" name="activiM" requided></textarea>
          </div>
            <div class="form-group">
              <input type="hidden" class="form-control" id="id" name="id">
              <input type="hidden" class="form-control" id="id_re" name="id_re">
              <input type="hidden" class="form-control" id="est" name="est">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="mod_bd" id="mod_bd" >Agregar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
  label{
    color: black;
  }
</style>
<?php
if(isset($_REQUEST['mod_bd'])){
  $con=new mysqli("localhost","desarrollo_delta","*Delta2021*","intranet");
    $id =$_REQUEST['id'];
    $idR =$_REQUEST['id_re'];
    $est =$_REQUEST['est'];

    $fecha=$_REQUEST['fechaM']; 
    $dia=$_REQUEST['diam_'];

    $horaE=$_REQUEST['horaM'];
    $horaS=$_REQUEST['hora_salM'];

    $almuerzo=$_REQUEST['almuerzo'];
    $horaDia=$_REQUEST['horas_diaM'];

    $ini_horas_extras=$_REQUEST['hora_inicio_he'];
    $fin_horas_extras=$_REQUEST['hora_fin_he'];
    $horaEx=$_REQUEST['horas_extrasM'];
    
    $ini_horas_recargo=$_REQUEST['hora_inicio_rec'];
    $fin_horas_recargo=$_REQUEST['hora_fin_rec'];
    $horaRec=$_REQUEST['horas_recargoM'];
    
    $concepto = !isset($_REQUEST['concepto_horas_extras'])||$_REQUEST['concepto_horas_extras']==''?$_REQUEST['concepto_horas_recargo']:$_REQUEST['concepto_horas_extras'];
    $actividad=$_REQUEST['activiM'];
    
    if($est == 1){
      $sql ="UPDATE `detalle_reporte` SET `codigo_concepto` = '$concepto', `fecha` = '$fecha', `nombre_dia` = '$dia', `hora_entrada` = '$horaE', `tiempo_almuerzo` = '$almuerzo', `hora_salida` = '$horaS', `horas_dia` = '$horaDia', `hora_inicio_he` = '$ini_horas_extras', `hora_fin_he` = '$fin_horas_extras', `horas_extras`='$horaEx', `hora_inicio_rec`='$ini_horas_recargo', `hora_fin_rec`='$fin_horas_recargo', `horas_recargo`='$horaRec', `actividad` = '$actividad', `estado_jefe`=0, `estado_ges_hu`= 0 WHERE `id_hora` = '$id'";
      $result_ = mysqli_query($con,$sql);
      $conceptos=array(9,100,201,205,5055,5872,5879);
      for($i=0;$i<count($conceptos);$i++){
        switch ($conceptos[$i]) {
          case '9':
            $valor_sumar = 'horas_extras';
            $columna = 'hora_extra_diu';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;

          case '100':
            $valor_sumar = 'horas_extras';
            $columna = 'hora_extra_noct';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;
 
          case '205':
            $valor_sumar = 'horas_extras';
            $columna = 'hora_extra_diu_dom';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;

          case '201':
            $valor_sumar = 'horas_extras';
            $columna = 'hora_extra_noct_dom';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;

          case '5055':
            $valor_sumar = 'horas_recargo';
            $columna = 'recargo_noct';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;

          case '5872':
            $valor_sumar = 'horas_recargo';
            $columna = 'recargo_noct_dom';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;

          case '5879':
            $valor_sumar = 'horas_recargo';
            $columna = 'recargo_diur_dom';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;

        }
        $sql2 ="UPDATE `consolidado_horas` SET $columna = '$valor' WHERE `id_reporte` = '$idR'";
        $result = mysqli_query($con,$sql2);
      }
      $sql2 ="UPDATE `consolidado_horas` SET `estado_jefe`=0, `estado_ges_hu`= 0  WHERE `id_reporte` = '$idR'";
      $result = mysqli_query($con,$sql2);

      $sql3 ="UPDATE `reporte_horas` SET `estado_jefe`=0, `estado_ges_hu`= 0 WHERE `id_reporte` = '$idR'";
      $result = mysqli_query($con,$sql3);
    }
    if($est == 2){

      $sql ="UPDATE `detalle_reporte` SET `codigo_concepto` = '$concepto', `fecha` = '$fecha', `nombre_dia` = '$dia', `hora_entrada` = '$horaE', `tiempo_almuerzo` = '$almuerzo', `hora_salida` = '$horaS', `horas_dia` = '$horaDia', `hora_inicio_he` = '$ini_horas_extras', `hora_fin_he` = '$fin_horas_extras', `horas_extras`='$horaEx', `hora_inicio_rec`='$ini_horas_recargo', `hora_fin_rec`='$fin_horas_recargo', `horas_recargo`='$horaRec', `actividad` = '$actividad', `estado_jefe`=0, `estado_ges_hu`= 0 WHERE `id_hora` = '$id'";
      $result_ = mysqli_query($con,$sql);
      $conceptos=array(9,100,201,205,5055,5872,5879);
      for($i=0;$i<count($conceptos);$i++){
        switch ($conceptos[$i]) {
          case '9':
            $valor_sumar = 'horas_extras';
            $columna = 'hora_extra_diu';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;

          case '100':
            $valor_sumar = 'horas_extras';
            $columna = 'hora_extra_noct';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;
          
            case '205':
              $valor_sumar = 'horas_extras';
              $columna = 'hora_extra_diu_dom';
              $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
              break;
  
            case '201':
              $valor_sumar = 'horas_extras';
              $columna = 'hora_extra_noct_dom';
              $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
              break;

          case '5055':
            $valor_sumar = 'horas_recargo';
            $columna = 'recargo_noct';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;

          case '5872':
            $valor_sumar = 'horas_recargo';
            $columna = 'recargo_noct_dom';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;
          
          case '5879':
            $valor_sumar = 'horas_recargo';
            $columna = 'recargo_diur_dom';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;
        }
        $sql2 ="UPDATE `consolidado_horas` SET  $columna = '$valor' WHERE `id_reporte` = '$idR'";
        $result = mysqli_query($con,$sql2);
      }
      $sql2 ="UPDATE `consolidado_horas` SET `estado_jefe`=0, `estado_ges_hu`= 0, `estado_vice` = 0 WHERE `id_reporte` = '$idR'";
      $result = mysqli_query($con,$sql2);

      $sql3 ="UPDATE `reporte_horas` SET `estado_jefe`=0, `estado_ges_hu`= 0, `estado_vice` = 0 WHERE `id_reporte` = '$idR'";
      $result = mysqli_query($con,$sql3);
    }
    if($est == 3){

      $sql ="UPDATE `detalle_reporte` SET `codigo_concepto` = '$concepto', `fecha` = '$fecha', `nombre_dia` = '$dia', `hora_entrada` = '$horaE', `tiempo_almuerzo` = '$almuerzo', `hora_salida` = '$horaS', `horas_dia` = '$horaDia', `hora_inicio_he` = '$ini_horas_extras', `hora_fin_he` = '$fin_horas_extras', `horas_extras`='$horaEx', `hora_inicio_rec`='$ini_horas_recargo', `hora_fin_rec`='$fin_horas_recargo', `horas_recargo`='$horaRec', `actividad` = '$actividad', `estado_jefe`=0, `estado_ges_hu`= 0 WHERE `id_hora` = '$id'";
      $result_ = mysqli_query($con,$sql);
      $conceptos=array(9,100,201,205,5055,5872,5879);
      for($i=0;$i<count($conceptos);$i++){
        switch ($conceptos[$i]) {
          case '9':
            $valor_sumar = 'horas_extras';
            $columna = 'hora_extra_diu';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;
          
          case '100':
            $valor_sumar = 'horas_extras';
            $columna = 'hora_extra_noct';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;
          
            case '205':
              $valor_sumar = 'horas_extras';
              $columna = 'hora_extra_diu_dom';
              $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
              break;
  
            case '201':
              $valor_sumar = 'horas_extras';
              $columna = 'hora_extra_noct_dom';
              $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
              break;

          case '5055':
            $valor_sumar = 'horas_recargo';
            $columna = 'recargo_noct';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;

          case '5872':
            $valor_sumar = 'horas_recargo';
            $columna = 'recargo_noct_dom';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;
          
          case '5879':
            $valor_sumar = 'horas_recargo';
            $columna = 'recargo_diur_dom';
            $valor = mentiritas($con,$idR,$valor_sumar,$conceptos[$i]);
            break;

        }
        $sql2 ="UPDATE `consolidado_horas` SET $columna = '$valor' WHERE `id_reporte` = '$idR'";
        $result = mysqli_query($con,$sql2);
      }
       $sql2 ="UPDATE `consolidado_horas` SET `estado_jefe`= 0, `estado_ges_hu`= 0, `estado_vice` = 0, `estado_geren` = 0 WHERE `id_reporte` = '$idR'";
       $result = mysqli_query($con,$sql2);

       $sql3 ="UPDATE `reporte_horas` SET `estado_jefe`= 0, `estado_ges_hu`= 0, `estado_vice` = 0, `estado_geren` = 0 WHERE `id_reporte` = '$idR'";
       $result = mysqli_query($con,$sql3);
      }
    if($result_ == true){

    echo "<script type='text/javascript'>location.href='./redireccionamiento_index_b.html'</script>";
    }
}         
function mentiritas($con,$idR,$valor_sumar,$concepto)
{
  $query =mysqli_query($con,"SELECT SUM($valor_sumar) AS `suma`FROM `detalle_reporte` WHERE `id_reporte` = '$idR' AND `codigo_concepto` = '$concepto'");
  $array = mysqli_fetch_assoc($query);
  return $array['suma'];
}
?>
<script>

// function hCheck(nameSelect)
// {
//   if(nameSelect){
//     horasExtrasValue = document.getElementById("horasExtras").value;
//     if(horasExtrasValue == nameSelect.value){
//         document.getElementById("div_horas_extras").style.display = "block";
//         document.getElementById("div_horas_recargo").style.display = "none";
//         $("#hora_inicio_rec").val('::');
//         $("#hora_fin_rec").val('::');
//         $("#horas_recargoM").val('0');
//         concepto = $('#concepto_horas_extras').value;
//         $("#concepto_horas_recargo").val(concepto);
//     }else{
//         document.getElementById("div_horas_extras").style.display = "none";
//         document.getElementById("div_horas_recargo").style.display = "block";
//         $("#hora_inicio_he").val('::');
//         $("#hora_fin_he").val('::');
//         $("#horas_extrasM").val('0');
//         concepto = $('#concepto_horas_recargo').value;
//         $("#concepto_horas_extras").val(concepto);
//     }
//   }else{
//       document.getElementById("div_horas_recargo").style.display = "none";
//       document.getElementById("div_horas_extras").style.display = "none";
//   }
// }

$('#ModalHoras').ready(function(){

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

</script>


