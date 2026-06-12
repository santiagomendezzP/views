<div id="eliminarusuarioModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <h3><center style="background-color: #0f6faa;padding: 13px; color: white; margin-right: 150px;margin-left: 150px;">ELIMINAR USUARIO</h3></center>
      <form  method="POST">
       <div class="modal-header">
       </div>
       <div class="modal-body">
        <center><label style="color: gray;">¿Estas seguro de ELIMINAR al usuario?</label></center>

        <input type="hidden" name="id_usuarios_eliminar" id="id_usuarios_eliminar">

        </div>
       <div class="modal-footer">
      <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
      <input type="submit" name="eliminar" id="eliminar" class="btn" style="background-color: #0f6faa; color: white;" value="Eliminar">
    </div>
  </form>
</div>
</div>
</div>

<?php
  $con=new mysqli("localhost","desarrollo_delta","*Delta2021*","intranet"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
    $con->set_charset('utf8');
    if(mysqli_connect_errno()){
      echo 'Conexion Fallida : ', mysqli_connect_error();
      exit();
    }else{
    }
    if(isset($_POST['eliminar'])) {
      // Recibimos por POST los datos procedentes del formulario    
      $id_usuario = $_POST['id_usuarios_eliminar']; 
      //DELETE en usuario 
      $sql = " UPDATE `usuario` SET `est` = '1' WHERE `id_usuario` = '$id_usuario' ";
      $query = mysqli_query($con,$sql);
      if ($query) {
        echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Ha hecho la solititud con éxito\", \"success\");});</script>";
      }else {
        echo "<script>jQuery(function(){swal(\"¡Mal!\", \"Error al hacer la solicitud\", \"error\");});</script>";
      }
      echo "<script type='text/javascript'>location.href='redireccionamiento.html'</script>";
    }
?>