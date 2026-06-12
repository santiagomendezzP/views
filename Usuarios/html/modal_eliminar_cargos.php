<div id="deleteGeneralModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <h3><center style="background-color: #0f6faa;padding: 13px; color: white; margin-right: 150px;margin-left: 150px;">ELIMINAR CARGO</h3></center>
      <form  method="POST">
       <div class="modal-header">
       </div>
       <div class="modal-body">
        <center><label style="color: gray;">¿Estas seguro de eliminar el cargo?</label>
        <input type="hidden" name="id_cargo_" id="id_cargo_">
        </div>
       <div class="modal-footer">
      <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
      <input type="submit" name="eliminar" id="eliminar" class="btn" style="background-color: #0f6faa; color: white;" value="eliminar">
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
    }else
    {
      
    }
    if(isset($_POST['eliminar'])) {
// Recibimos por POST los datos procedentes del formulario    
      $id_cargo = $_POST['id_cargo_'];
//Lugar o espacio en el que labor

//UPDATE en usuario 
$sql = "DELETE FROM cargos WHERE `id_cargo` = '$id_cargo'";

$query = mysqli_query($con,$sql);

if ($query ) {
 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Ha hecho la solititud con éxito\", \"success\");});</script>";

}

else {
  echo "<script>jQuery(function(){swal(\"¡Mal!\", \"Error al hacer la solicitud\", \"error\");});</script>";
}

}
?>