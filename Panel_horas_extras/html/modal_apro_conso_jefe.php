<div class="modal fade" id="aprobar_con_jefe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <input type="hidden" id="correo_solicitante_con" name="correo_solicitante_con">
          <input type="hidden" id="nombre_solicitante_con" name="nombre_solicitante_con">
          <br>
          <label>Si</label>
          <input type="radio" name="option" id="option" value="3" required>
          <label>No</label>
          <input type="radio" name="option" id="option" value="4" required><br>
          <label>Observación consolidado</label>
          <input type="text" class="form-control" name="observacion_consolidado" id="observacion_consolidado" required>
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
include ("class_horas.php");
$maill = new mail();
$datos_horas = new datos_h();
  if(isset($_REQUEST['aceptar_co_j'])){
    require ("conexion.php");
    $id_re=$_REQUEST['id_r'];
    $observacion_consolidado=$_REQUEST['observacion_consolidado'];

    $consulta_reporte_horas = mysqli_query($con,"SELECT * FROM `reporte_horas` WHERE `id_reporte` = '$id_re'"); 
    while($array = mysqli_fetch_array($consulta_reporte_horas)){
      $estado_n = $array['estado_n'];
      $proyecto = $array['proyecto'];
      $fecha_aprobado = date("Y-m-d G:i:s"); 
      $fecha_negado = date("Y-m-d G:i:s"); 

      if ($estado_n == 1) {
        if($_REQUEST['option']==3){
          $nombre_solicitante=$_REQUEST['nombre_solicitante_con'];
          $correo_solicitante=$_REQUEST['correo_solicitante_con'];
          $sql2="UPDATE `consolidado_horas` SET `estado_jefe` = '3' WHERE `id_reporte` = '$id_re'";  
          $query = mysqli_query($con,$sql2);
          
          $sql3="UPDATE `reporte_horas` SET `estado_jefe` = '3', `fecha_aprobacion` = '$fecha_aprobado', `observacion_consolidado` = '$observacion_consolidado' WHERE `id_reporte` = '$id_re'";  
          $query = mysqli_query($con,$sql3);
          

        }else if ($_REQUEST['option']==4){
          $nombre_solicitante=$_REQUEST['nombre_solicitante_con'];
          $correo_solicitante=$_REQUEST['correo_solicitante_con'];
          $sql2="UPDATE `consolidado_horas` SET `estado_jefe` = '4' WHERE `id_reporte` = '$id_re'";  
          $query = mysqli_query($con,$sql2);
          $sql3="UPDATE `reporte_horas` SET `estado_jefe` = '4', `fecha_denegado` = '$fecha_negado', `observacion_consolidado` = '$observacion_consolidado' WHERE `id_reporte` = '$id_re'";  
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
      }else if($estado_n == 2){
        if($_REQUEST['option']==3){
          $nombre_solicitante=$_REQUEST['nombre_solicitante_con'];
          $correo_solicitante=$_REQUEST['correo_solicitante_con'];
          $sql2="UPDATE `consolidado_horas` SET `estado_jefe` = '3' WHERE `id_reporte` = '$id_re'";  
          $query = mysqli_query($con,$sql2);
          $sql3="UPDATE `reporte_horas` SET `estado_jefe` = '3', `fecha_aprobacion` = '$fecha_aprobado', `observacion_consolidado` = '$observacion_consolidado' WHERE `id_reporte` = '$id_re'";  
          $query = mysqli_query($con,$sql3);
          

        }else if ($_REQUEST['option']==4){
          $nombre_solicitante=$_REQUEST['nombre_solicitante_con'];
          $correo_solicitante=$_REQUEST['correo_solicitante_con'];
          $sql2="UPDATE `consolidado_horas` SET `estado_jefe` = '4' WHERE `id_reporte` = '$id_re'";  
          $query = mysqli_query($con,$sql2);
          $sql3="UPDATE `reporte_horas` SET `estado_jefe` = '4', `fecha_denegado` = '$fecha_negado', `observacion_consolidado` = '$observacion_consolidado' WHERE `id_reporte` = '$id_re'";  
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
          $maill4 = $maill->envia_mail($para,$titulo,$mensaje);
        }
      }else if($estado_n == 3){
        if($_REQUEST['option']==3){
          $nombre_solicitante=$_REQUEST['nombre_solicitante_con'];
          $correo_solicitante=$_REQUEST['correo_solicitante_con'];
          $sql2="UPDATE `consolidado_horas` SET `estado_jefe` = '3' WHERE `id_reporte` = '$id_re'";  
          $query = mysqli_query($con,$sql2);
          $sql3="UPDATE `reporte_horas` SET `estado_jefe` = '3', `fecha_aprobacion` = '$fecha_aprobado', `observacion_consolidado` = '$observacion_consolidado' WHERE `id_reporte` = '$id_re'";  
          $query = mysqli_query($con,$sql3);
        }else if ($_REQUEST['option']==4){
          $nombre_solicitante=$_REQUEST['nombre_solicitante_con'];
          $correo_solicitante=$_REQUEST['correo_solicitante_con'];
          $sql2="UPDATE `consolidado_horas` SET `estado_jefe` = '4' WHERE `id_reporte` = '$id_re'";  
          $query = mysqli_query($con,$sql2);
          $sql3="UPDATE `reporte_horas` SET `estado_jefe` = '4', `fecha_denegado` = '$fecha_negado', `observacion_consolidado` = '$observacion_consolidado' WHERE `id_reporte` = '$id_re'";  
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
          $maill8 = $maill->envia_mail($para,$titulo,$mensaje);
        }
      }
    }
    echo "<script type='text/javascript'>location.href='./redireccionamiento_vista_jefe.html'</script>";
  }
?>