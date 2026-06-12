<?php

?>
<div class="modal fade" id="ModalConso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style=code| "background: linear-gradient(135deg,#008ccd,#006ea3); border: none; padding: 18px 25px;">


        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <h3  style=" padding: 13px; color: black; text-align: center;"> Consolidado de horas:</h3>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Horas extras diurnas:</label>
            <input type="text" class="form-control" id="horaExDiu" name="horaExDiu">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Horas extras Nocturnas:</label>
            <input type="text" class="form-control" id="horaExNoc" name="horaExNoc">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Horas extras diurnas dominicales o festivas:</label>
            <input type="text" class="form-control" id="horaExDiu_dom" name="horaExDiu_dom">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"> Horas extras nocturnas dominicales o festivas: </label>
            <input type="text" class="form-control" id="horaExNoc_dom" name="horaExNoc_dom">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recargos nocturnos ordinarios:</label>
            <input type="text" class="form-control" id="recargosNoc" name="recargosNoc">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recargo nocturno dominicales o festivos:</label>
            <input type="text" class="form-control" id="recargosNoc_dom" name="recargosNoc_dom">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recargo diurno dominical o festivo:</label>
            <input type="text" class="form-control" id="recargosDiu_dom" name="recargosDiu_dom">
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="consol" id="consol" >Agregar</button>
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
  if(isset($_REQUEST['consol'])){        
    $horaExDiu=$_REQUEST['horaExDiu']; //hora extra diurna
    $horaExNoc=$_REQUEST['horaExNoc']; //hora extra nocturna
    $horaExDiu_dom=$_REQUEST['horaExDiu_dom'];//HORAS EXTRAS DIURNAS DOMINICALES O FESTIVAS
    $horaExNoc_dom=$_REQUEST['horaExNoc_dom'];//horas extras nocutrnas dominicales
    $recargosNoc=$_REQUEST['recargosNoc'];//recargos nocturnos
    $recargosNoc_dom=$_REQUEST['recargosNoc_dom'];//recargos nocturnos dominicales
    $recargosDiu_dom=$_REQUEST['recargosDiu_dom'];//recargos diurnos dominicales

    $_SESSION['consolidado']['horaExDiu'] =     $horaExDiu;
    $_SESSION['consolidado']['horaExNoc'] =     $horaExNoc;
    $_SESSION['consolidado']['horaExDiu_dom'] = $horaExDiu_dom;
    $_SESSION['consolidado']['horaExNoc_dom'] = $horaExNoc_dom;
    $_SESSION['consolidado']['recargosNoc'] =   $recargosNoc;
    $_SESSION['consolidado']['recargosNoc_dom'] = $recargosNoc_dom;
    $_SESSION['consolidado']['recargosDiu_dom'] = $recargosDiu_dom;
        
    echo "<script>alert('agregado')</script>";
    echo "<script type='text/javascript'>window.location='index.php';</script>";
  }
?>