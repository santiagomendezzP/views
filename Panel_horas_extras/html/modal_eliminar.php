<div class="modal fade" id="ModalElim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d0d0d0;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <h3 class="modal-title" id="exampleModalLabel">ELIMINAR</h3>
      <div class="modal-body">
          <label for="">¿Esta seguro de borrar este registro?</label>
        <form  method="POST">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" style="
                margin-left: 0;">
                <label class="form-check-label" for="inlineRadio1">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2" style="
                margin-left: 0;">
                <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
          <div class="form-group">
            <input type="hidden" class="form-control" id="contad" name="contad"></input>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="eliminar" id="eliminar" class="btn btn-primary">Borrar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
if(isset($_REQUEST['eliminar']) && $_REQUEST['inlineRadioOptions']==1){
 $cont = $_REQUEST['contad'];
 unset($_SESSION['reporte'][$cont]);
 echo "<script type='text/javascript'>window.location='index.php';</script>";
}
 
?>