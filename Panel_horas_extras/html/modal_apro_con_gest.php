<div class="modal fade" id="aprobar_con_gest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <label>¿Desea aprobar este consolidado?</label>
        <input type="hidden" id="id_r" name="id_r">
        <input type="hidden" id="correo_solicitante_c" name="correo_solicitante_c">
        <input type="hidden" id="nombre_solicitante_c" name="nombre_solicitante_c">
        <br>
        <label>Si</label>
        <input  type="radio" name="option" id="option" value="3" required>
        <label>No</label>
        <input  type="radio" name="option" id="option" value="4" required>
      </div>
      <div class="modal-footer">
          <button type="submit"  id="aceptar_co_j" name="aceptar_co_j" class="btn btn-primary">Aceptar</button>
          <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
require_once ("../../controller/mail/mail.php");
$maill = new mail();
if(isset($_REQUEST['aceptar_co_j'])){
  $correo_solicitante = $_REQUEST['correo_solicitante_c'];
  $nombre_solicitante = $_REQUEST['nombre_solicitante_c'];
  $id_re=$_REQUEST['id_r'];
  if($_REQUEST['option']==3){
    $sql2="UPDATE `consolidado_horas` SET `estado_ges_hu` = '3' WHERE `id_reporte` = '$id_re'";  
    $query = mysqli_query($con,$sql2);
    $sql3="UPDATE `reporte_horas` SET `estado_ges_hu` = '3' WHERE `id_reporte` = '$id_re'";  
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
      <p>Su solicitud de horas extras fue ya aprobada y generada.</p><p>Para ver el estado de su solicitud ingrese al siguiente enlace: </p>
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

  }else if($_REQUEST['option']==4){
    $sql2="UPDATE `consolidado_horas` SET `estado_ges_hu` = '4' WHERE `id_reporte` = '$id_re'";  
    $query = mysqli_query($con,$sql2);
    $sql3="UPDATE `reporte_horas` SET `estado_ges_hu` = '4' WHERE `id_reporte` = '$id_re'";  
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
    $maill2 = $maill->envia_mail($para,$titulo,$mensaje);
  }
  echo "<script type='text/javascript'>window.location='reporte_horas_gestion.php';</script>";
}
?>