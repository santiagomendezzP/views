<div class="modal fade" id="aprobar_hora" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <input type="hidden" id="correo_solicitante_" name="correo_solicitante_">
        <input type="hidden" id="nombre_solicitante_" name="nombre_solicitante_">
        <br>
        <label>Si</label>
        <input  type="radio" name="option" id="option" value="3" required>
        <label>No</label>
        <input  type="radio" name="option" id="option" value="4" required>
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
  $correo_solicitante = $_REQUEST['correo_solicitante_'];
  $nombre_solicitante = $_REQUEST['nombre_solicitante_'];
    if($_REQUEST['option']==3){ 
        $id_hora=$_REQUEST['id'];
        $sql2="UPDATE `detalle_reporte` SET `estado_ges_hu` = '3' WHERE `detalle_reporte`.`id_hora` = '$id_hora'";  
        $query = mysqli_query($con,$sql2);
    }else{
      $id_hora=$_REQUEST['id'];
      $sql3="UPDATE `detalle_reporte` SET `estado_ges_hu` = '4' WHERE `detalle_reporte`.`id_hora` = '$id_hora'";  
      $query = mysqli_query($con,$sql3);
      $para      =  $correo_solicitante;
      $titulo    = 'Solicitud horas extras';
      $mensaje   = '
      <!DOCTYPE html>
      <html>
      <head>
      </head>
      <body>
      <p>Cordial saludo ' . "\r\n" .$nombre_solicitante.'.' ."\r\n" . '</p>
      <body>
        <p>Su solicitud de horas extras fue negada.</p><p>Para ver el estado de su solicitud ingrese al siguiente enlace: </p>
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
    echo "<script type='text/javascript'>window.location='reporte_horas_gestion.php';</script>";
    $_SESSION['horas_actuales_gestion'] = $_POST['id_reporte_horas']; 
}
?>