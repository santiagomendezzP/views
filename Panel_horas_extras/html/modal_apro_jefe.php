<div class="modal fade" id="aceptar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d0d0d0;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <center><h3 class="modal-title" id="exampleModalLabel">APROBAR</h3></center>
      <form method="POST">
      <div class="modal-body">
        <label>¿Desea aprobar esta hora?</label>
        <input type="hidden" id="id" name="id">
        <input type="hidden" id="id_reporte_horas" name="id_reporte_horas">
        <input type="hidden" id="correo_solicitante" name="correo_solicitante">
        <input type="hidden" id="nombre_solicitante" name="nombre_solicitante">
        <br>
        <label>Si</label>
        <input type="radio" name="option" id="option" value="3" required>
        <label>No</label>
        <input type="radio" name="option" id="option" value="4" required>
        <br>
        <label>Observación</label>
        <input type="text" style="border-color: gray;" class="form-control" name="observacion_jefe" id="observacion_jefe" required>
      </div>
      <div class="modal-footer">
          <button type="submit"  id="aceptar" name="aceptar" class="btn btn-primary">Aceptar</button>
          <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
require_once ("../../controller/mail/mail.php");
$maill = new mail();
if(isset($_REQUEST['aceptar'])){
  require("conexion.php");
  $correo_solicitante=$_REQUEST['correo_solicitante'];
  $nombre_solicitante=$_REQUEST['nombre_solicitante'];
  $observacion_jefe=$_REQUEST['observacion_jefe'];
  if($_REQUEST['option']==3){
    $id_hora=$_REQUEST['id'];
    $sql2="UPDATE `detalle_reporte` SET `estado_jefe` = '3', `observacion_jefe` = '$observacion_jefe' WHERE `detalle_reporte`.`id_hora` = '$id_hora'";  
    $query = mysqli_query($con,$sql2);
  }else{
    $id_hora=$_REQUEST['id'];
    $sql3="UPDATE `detalle_reporte` SET `estado_jefe` = '4', `observacion_jefe` = '$observacion_jefe' WHERE `detalle_reporte`.`id_hora` = '$id_hora'";  
    $query = mysqli_query($con,$sql3);

    $para      =  $correo_solicitante;
    $titulo    = 'Solicitud horas extras';
    $mensaje   = '
    <!DOCTYPE html>
    <html>
    <head>
    </head>
    <body>
    <p>Cordial saludo, ' . "\r\n" .$nombre_solicitante.'.' ."\r\n" . '</p>
    <body>
      <p>Su solicitud de horas extras fue negada.</p>
      <p>Observación: <strong>'.$observacion_jefe.'</strong></p>
      <p>Para ver el estado de su solicitud ingrese al siguiente enlace: </p>
      <h5 style="color: #b81616;"> 
        <a href="http://intranet.deltaasalud.local/newintranet/views/Panel_horas_extras/index_b.php"_blank">Ir a Intranet</a>
      </h5>
      <p>Cordialmente,<br><br>
      <strong>Delta A Salud.</strong></p>
    </body>
    </html>';
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $maill1 = $maill->envia_mail($para,$titulo,$mensaje);

  }

  echo "<script type='text/javascript'>location.href='./redireccionamiento_vista_jefe.html'</script>";
  $_SESSION['horas_actuales_jefe'] = $_POST['id_reporte_horas']; 
}
?>