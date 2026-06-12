<div id="eliminarusuarioModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <h3><center style="background-color: #0f6faa;padding: 13px; color: white; margin-right: 150px;margin-left: 150px;">ELIMINAR FUNCIONES</h3></center>
      <form  method="POST">
        <div class="modal-header"></div>
        <div class="modal-body">
          <center><label style="color: gray;">¿Estas seguro de ELIMINAR esta función?</label></center>
          <input type="hidden" name="documento_fun_borrar" id="documento_fun_borrar">
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
  if(isset($_POST['eliminar'])) {
    // Recibimos por POST los datos procedentes del formulario    
    $documento = $_POST['documento_fun_borrar'];
    //DELETE en usuario 
    $sql = "DELETE FROM `funciones_c` WHERE `documento` = '$documento'";
    $query = mysqli_query($con,$sql);
    if ($query) {
      echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Ha hecho la solititud con éxito\", \"success\");});</script>";
    }else{
      echo "<script>jQuery(function(){swal(\"¡Mal!\", \"Error al hacer la solicitud\", \"error\");});</script>";
    }
    echo "<script> window.location.href = '../Usuarios/funciones.php';</script>";
  }
?>