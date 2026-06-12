<div id="cambiarclaveModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <h3><center style="background-color: #0f6faa;padding: 13px; color: white; margin-right: 150px;margin-left: 150px;">CAMBIAR PASSWORD</h3></center>
      <form  method="POST">
       <div class="modal-header">
       </div>
       <div class="modal-body">
        <center><label style="color: black;">¿Estas seguro de cambiar la clave del usuario?</label></center>
        <center><label style="color: gray;">La clave sera el numero de documento del usuario</label></center>
        <input type="hidden" name="codigo_clave" id="codigo_clave">
        <input type="hidden" name="id_usuarios_clave" id="id_usuarios_clave">
        <input type="hidden" name="usuario_" id="usuario_">
        <input type="hidden" name="nombres" id="nombres">
        <input type="hidden" name="apellido_" id="apellido_">
        <input type="hidden" name="correo_clave" id="correo_clave">
        </div>
       <div class="modal-footer">
      <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
      <input type="submit" name="clave" id="clave" class="btn" style="background-color: #0f6faa; color: white;" value="Cambiar">
    </div>
  </form>
</div>
</div>
</div>

<?php
include ("model/Mail.php");
$mail = new Mail;
  $con=new mysqli("localhost","desarrollo_delta","*Delta2021*","intranet"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
    $con->set_charset('utf8');
    if(mysqli_connect_errno()){
      echo 'Conexion Fallida : ', mysqli_connect_error();
      exit();
    }else
    {
      
    }
    if(isset($_POST['clave'])) {
// Recibimos por POST los datos procedentes del formulario    
  $patter = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $x = substr(str_shuffle($patter), 3, 10);
      $id_usuario = $_POST['id_usuarios_clave'];
      $usuario = $_POST['usuario_'];
      $nombre = $_POST['nombres'];
      $apellidos = $_POST['apellido_'];
      $codigo = $_POST['codigo_clave'];
      $correo = $_POST['correo_clave'];
      $password = $x;
      $titulo = 'Intranet cambio de clave';
      $nombre_completo = $nombre.' '.$apellidos;
      $firstime = 0;
      
//Lugar o espacio en el que labor

    //UPDATE en usuario 
$sql = "UPDATE `usuario` SET `firstime` = '$firstime' , `password` = '$password' WHERE `id_usuario` = '$id_usuario'";
$query = mysqli_query($con,$sql);
$mail->send_mail_pswd($correo,$titulo,$nombre_completo,$password);



if ($query ) {
 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Ha hecho la solititud con éxito\", \"success\");});</script>";

}

else {
  echo "<script>jQuery(function(){swal(\"¡Mal!\", \"Error al hacer la solicitud\", \"error\");});</script>";
}
echo "<script type='text/javascript'>location.href='redireccionamiento.html'</script>";
}
?>
<script>
  $("#clave").click(function (){
    swal("¡Bien!", "Has cambiado la clave con éxito :)", "success");
  })
</script>