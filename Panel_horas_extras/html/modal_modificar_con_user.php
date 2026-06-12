
<div class="modal fade" id="modifi_con" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d0d0d0;">
        <h3 class="modal-title" id="exampleModalLabel">CONSOLIDADO DE HORAS</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Horas extras diurnas:</label>
            <input type="text" class="form-control" id="horaExDiu" name="horaExDiu" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Horas extras Nocturnas:</label>
            <input type="text" class="form-control" id="horaExNoc" name="horaExNoc" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Horas extras diurnas dominicales o festivas:</label>
            <input type="text" class="form-control" id="horaExDiu_dom" name="horaExDiu_dom" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"> Horas extras nocturnas dominicales o festivas: </label>
            <input type="text" class="form-control" id="horaExNoc_dom" name="horaExNoc_dom" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recargos nocturnos ordinarios:</label>
            <input type="text" class="form-control" id="recargosNoc" name="recargosNoc" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recargo nocturno dominicales o festivos:</label>
            <input type="text" class="form-control" id="recargosNoc_dom" name="recargosNoc_dom" readonly>
          </div>
          <div class="form-group">
             <label for="recipient-name" class="col-form-label">Recargo diurno dominical o festivo:</label>
            <input type="text" class="form-control" id="recargosDiu_dom" name="recargosDiu_dom" readonly>
            <input type="hidden" class="form-control" id="est2" name="est2">
            <input type="hidden" class="form-control" id="id_re2" name="id_re2">
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="mod_condb" id="mod_condb" >Agregar</button>
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


if(isset($_REQUEST['mod_condb'])){     
  $con=new mysqli("localhost","desarrollo_delta","*Delta2021*","intranet");
  $idR =$_REQUEST['id_re2'];
  $est =$_REQUEST['est2'];
  $horaExDiu=$_REQUEST['horaExDiu']; //hora extra diurna
  $horaExNoc=$_REQUEST['horaExNoc']; //hora extra nocturna
  $horaExDiu_dom=$_REQUEST['horaExDiu_dom'];//HORAS EXTRAS DIURNAS DOMINICALES O FESTIVAS
  $horaExNoc_dom=$_REQUEST['horaExNoc_dom'];//horas extras nocutrnas dominicales
  $recargosNoc=$_REQUEST['recargosNoc'];//recargos nocturnos
  $recargosNoc_dom=$_REQUEST['recargosNoc_dom'];//recargos nocturnos dominicales
  $recargosDiu_dom=$_REQUEST['recargosDiu_dom'];//recargos diurnos dominicales
  if($est == 1){          
      $sql2 ="UPDATE `consolidado_horas` SET `hora_extra_diu`='$horaExDiu', `hora_extra_noct`='$horaExNoc', `hora_extra_diu_dom` ='$horaExDiu_dom', `hora_extra_noct_dom`='$horaExNoc_dom', `recargo_noct`='$recargosNoc', `recargo_noct_dom`='$recargosNoc_dom', `recargo_diur_dom`='$recargosDiu_dom', `estado_jefe`=0, `estado_ges_hu`= 0 WHERE `id_reporte` = '$idR'";
      $result = mysqli_query($con,$sql2);
      $sql3 ="UPDATE `reporte_horas` SET `estado_jefe`=0, `estado_ges_hu`= 0 WHERE `id_reporte` = '$idR'";
      $result = mysqli_query($con,$sql3);
  }
  if($est == 2){
    $sql2 ="UPDATE `consolidado_horas` SET `hora_extra_diu`='$horaExDiu', `hora_extra_noct`='$horaExNoc', `hora_extra_diu_dom` ='$horaExDiu_dom', `hora_extra_noct_dom`='$horaExNoc_dom', `recargo_noct`='$recargosNoc', `recargo_noct_dom`='$recargosNoc_dom', `recargo_diur_dom`='$recargosDiu_dom', `estado_jefe`=0, `estado_ges_hu`= 0, `estado_vice` = 0 WHERE `id_reporte` = '$idR'";
    $result = mysqli_query($con,$sql2);
    $sql3 ="UPDATE `reporte_horas` SET `estado_jefe`=0, `estado_ges_hu`= 0, `estado_vice` = 0 WHERE `id_reporte` = '$idR'";
    $result = mysqli_query($con,$sql3);
  }
  if($est == 3){
    $sql2 ="UPDATE `consolidado_horas` SET `hora_extra_diu`='$horaExDiu', `hora_extra_noct`='$horaExNoc', `hora_extra_diu_dom` ='$horaExDiu_dom', `hora_extra_noct_dom`='$horaExNoc_dom', `recargo_noct`='$recargosNoc', `recargo_noct_dom`='$recargosNoc_dom', `recargo_diur_dom`='$recargosDiu_dom', `estado_jefe`=0, `estado_ges_hu`= 0, `estado_vice` = 0, `estado_geren` = 0 WHERE `id_reporte` = '$idR'";
    $result = mysqli_query($con,$sql2);
    $sql3 ="UPDATE `reporte_horas` SET `estado_jefe`=0, `estado_ges_hu`= 0, `estado_vice` = 0, `estado_geren` = 0 WHERE `id_reporte` = '$idR'";
    $result = mysqli_query($con,$sql3);
  }
    echo "<script type='text/javascript'>location.href='./redireccionamiento_index_b.html'</script>";
}
?>