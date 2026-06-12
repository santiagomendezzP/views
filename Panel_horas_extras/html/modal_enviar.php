<?php
include ("ajax/datos.php");
include ("datos.php");
require_once ("../../controller/mail/mail.php");
$maill = new mail();
$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
?>
<div class="modal fade" id="enviar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header" style="background-color: #d0d0d0;">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fecha de registro:</label>
            <input type="datetime-local" class="form-control" id="fechaR" name="fechaR"  required readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre trabajador:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $_SESSION['intranet_name'];?>" readonly>
          </div>
          <div class="form-group">
            <label for="text" class="col-form-label">Mes:</label>
            <input type="text" id="mes" name="mes" class="form-control" readonly required>
          </div>
          <div class="form-group">
            <label for="text" class="col-form-label">Documento:</label>
            <input type="text" class="form-control" name="documento" id="documento" value="<?php echo $_SESSION['intranet_documento'];?>" readonly> 
          </div>
          <div class="form-group">
            <label for="text" class="col-form-label">Unidad de servicios:</label>
            <input type="text" class="form-control" name="Nproyecto" id="Nproyecto" value="<?php echo $nom_proyecto; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="text" class="col-form-label">Cargo:</label>
            <input type="text" class="form-control" name="Ncargo" id="Ncargo" value="<?php echo $nom_car;?>" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="enviarm" id="enviarm" class="btn btn-primary">Enviar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
if(isset($_REQUEST['enviarm'])){
  if(!isset($_SESSION['reporte']) || !isset($_SESSION['consolidado'])){
    echo "<script>alert('las tablas estan vacias')</script>";
    echo "<script type='text/javascript'>window.location='index.php';</script>";
  }else{
    include_once ("./connection/conexion.php");
    $obj = new conectar();
    $con = $obj->conexion();
    $obj = new Datos();
    $fechaR = $_REQUEST['fechaR'];
    $nombre =$_REQUEST['nombre'];
    $mes =$_REQUEST['mes'];
    $documento =$_REQUEST['documento'];
    $proyecto =$_SESSION['intranet_proyecto'];
    $cargo =$_SESSION['intranet_cargo'];
    $id_jefe = $_SESSION['intranet_jefe'];
    $correo_jefe = $obj->correo_jefe($con,$id_jefe);

    if($proyecto != 4 && $proyecto != 6 && $proyecto != 31 && $proyecto != 32 && $proyecto != 26 && $proyecto !=27 && $proyecto !=9 && $proyecto !=10){
      $sql="INSERT INTO reporte_horas (id_reporte, estado_n, nombre_trabajador, mes, documento, proyecto, cargo, id_jefe, fecha_registro) VALUES(null,1,'$nombre','$mes','$documento','$proyecto','$cargo','$id_jefe','$fechaR')";
      $result = mysqli_query($con,$sql);
      $numero = mysqli_insert_id($con);
    }
    //////////////////////////////////CONDICION 2//////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // if($proyecto == 6 ){
    //   $sql="INSERT INTO reporte_horas (id_reporte, estado_n, nombre_trabajador, mes, documento, proyecto, cargo, id_jefe, estado_vice, fecha_registro) VALUES(null,2,'$nombre','$mes','$documento','$proyecto','$cargo','$id_jefe',2,'$fechaR')";
    //   $result = mysqli_query($con,$sql);
    //   $numero = mysqli_insert_id($con);
    // }
    //////////////////////////////////condicion 3////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if($proyecto == 4 || $proyecto == 32 || $proyecto == 27 ||$proyecto == 26 ||$proyecto == 9 ||$proyecto == 10 || $proyecto == 31 || $proyecto == 6){
      $sql="INSERT INTO reporte_horas (id_reporte, estado_n, nombre_trabajador, mes, documento, proyecto, cargo, id_jefe, `estado_vice`, fecha_registro) VALUES(null,3,'$nombre','$mes','$documento','$proyecto','$cargo','$id_jefe',2,'$fechaR')";
      $result = mysqli_query($con,$sql);
      $numero = mysqli_insert_id($con);
    }
    foreach($_SESSION['reporte'] as $indice => $arreglo){
      $id=$numero;
      $concepto=$arreglo['concepto'];
      $fecha=$arreglo['fecha'];
      $dia=$arreglo['dia'];
      $horaE=$arreglo['hora'];
      $almuerzo=$arreglo['almuerzo'];
      $horaS=$arreglo['hora_sal'];
      $horaDia=$arreglo['horas_dia'];
      $hora_inicio_he=$arreglo['hora_inicio_he'];
      $hora_fin_he=$arreglo['hora_fin_he'];
      $horaEx=$arreglo['horas_extras'];
      $hora_inicio_rec=$arreglo['hora_inicio_rec'];
      $hora_fin_rec=$arreglo['hora_fin_rec'];
      $horaRec=$arreglo['horas_recargo'];
      $actividad=$arreglo['act'];

      $sql2="INSERT INTO detalle_reporte  (`id_reporte`, `codigo_concepto`, `id_hora`, `fecha`, `nombre_dia`, `hora_entrada`, `tiempo_almuerzo`, `hora_salida`, `horas_dia`, `hora_inicio_he`, `hora_fin_he`, `horas_extras`, `hora_inicio_rec`, `hora_fin_rec`,  `horas_recargo`, `actividad`) 
      VALUES ('$id','$concepto',null,'$fecha','$dia','$horaE', '$almuerzo','$horaS','$horaDia','$hora_inicio_he','$hora_fin_he','$horaEx','$hora_inicio_rec','$hora_fin_rec','$horaRec','$actividad')";
      $query = mysqli_query($con,$sql2);

    }

    $horaExDiu=$_SESSION['consolidado']['horaExDiu']; 
    $horaExNoc=$_SESSION['consolidado']['horaExNoc'];
    $horaExDiu_dom=$_SESSION['consolidado']['horaExDiu_dom'];
    $horaExNoc_dom=$_SESSION['consolidado']['horaExNoc_dom'];
    $recargosNoc=$_SESSION['consolidado']['recargosNoc'];
    $recargosNoc_dom= $_SESSION['consolidado']['recargosNoc_dom'];
    $recargosDiu_dom=$_SESSION['consolidado']['recargosDiu_dom'];

    $sql3="INSERT INTO consolidado_horas (`id_reporte`, `hora_extra_diu`, `hora_extra_noct`, `hora_extra_diu_dom`, `hora_extra_noct_dom`, `recargo_noct`, `recargo_noct_dom`, `recargo_diur_dom`) VALUES ('$id','$horaExDiu','$horaExNoc','$horaExDiu_dom','$horaExNoc_dom','$recargosNoc','$recargosNoc_dom','$recargosDiu_dom')";
    $query = mysqli_query($con,$sql3);

    if ($proyecto == 32) {

    $para      = 'supervisorestutelas@deltaasalud.com';
    $titulo    = 'Solicitud horas extras';
    $mensaje   = '
    <!DOCTYPE html>
    <html>
    <head>
    </head>
    <body>
    <p>Cordial saludo, </p>
    <p>Tiene un reporte de horas extras.</p><p>Nombre del trabajador :' . "\r\n" .$nombre.'.' ."\r\n" . '</p><p>Para responderle, por favor active el siguiente enlace:</p> 
    <h5 style="color: #b81616;">
    <a href="http://intranet.deltaasalud.local/newintranet/views/Panel_horas_extras/reporte_horas_jefe.php"_blank">Ir a Intranet</a>
    </h5>
    <p>Cordialmente,<br><br>
    <strong>Delta A Salud.</strong></p>
    </body>
    </html>';
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    $maill1 = $maill->envia_mail($para,$titulo,$mensaje);

    }else{

    $para      =  $correo_jefe;
    $titulo    = 'Solicitud horas extras';
    $mensaje   = '
    <!DOCTYPE html>
    <html>
    <head>
    </head>
    <body>
    <p>Cordial saludo, </p>
    <p>Tiene un reporte de horas extras.</p><p>Nombre del trabajador :' . "\r\n" .$nombre.'.' ."\r\n" . '</p><p>Para responderle, por favor active el siguiente enlace:</p> 
    <h5 style="color: #b81616;">
    <a href="http://intranet.deltaasalud.local/newintranet/views/Panel_horas_extras/reporte_horas_jefe.php"_blank">Ir a Intranet</a>
    </h5>
    <p>Cordialmente,<br><br>
    <strong>Delta A Salud.</strong></p>
    </body>
    </html>';
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    $maill1 = $maill->envia_mail($para,$titulo,$mensaje);

    }
    unset($_SESSION['reporte']);
    unset($_SESSION['consolidado']);
    unset($_SESSION['contador']);
    echo "<script type='text/javascript'>window.location='index.php';</script>";
  }
}
?>
