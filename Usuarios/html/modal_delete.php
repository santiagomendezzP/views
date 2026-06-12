<div id="deleteGeneralModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <h3><center style="background-color: #0f6faa;padding: 13px; color: white; margin-right: 150px;margin-left: 150px;">INHABILITAR COLABORADOR</h3></center>
      <form  method="POST">
       <div class="modal-header">
       </div>
       <div class="modal-body">
        <center><label style="color: gray;">¿Estas seguro de inhabilitar al usuario?</label>
        <input type="hidden" name="id_usuario" id="id_usuario">
        </div>
       <div class="modal-footer">
      <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
      <input type="submit" name="inhabilitar" id="inhabilitar" class="btn" style="background-color: #0f6faa; color: white;" value="inhabilitar">
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
if(isset($_POST['inhabilitar'])) {
  // Recibimos por POST los datos procedentes del formulario    
        $id_usuario = $_POST['id_usuario'];
        $est = 1;
        $firstime = 0;
  //Lugar o espacio en el que labor

      //UPDATE en usuario 
  $sql = "UPDATE `usuario` SET `firstime` = '$firstime' , `est` = '$est' WHERE `id_usuario` = '$id_usuario'";
  $query = mysqli_query($con,$sql);

  // Actualiza estado_horas_beneficios
  $query_usuarios = mysqli_query($con,"SELECT * FROM `usuario` WHERE `id_usuario` = '$id_usuario'");
  $array_query = mysqli_fetch_assoc($query_usuarios);
  $documento = $array_query['codigo'];

  $update = "UPDATE `horas_beneficios` SET `estado_usuario` = '1' WHERE `horas_beneficios`.`documento` = '$documento'";
  mysqli_query($con,$update);

  if ($query ) {
   
    echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Ha hecho la solititud con éxito\", \"success\");});</script>";

  }

  else {
    echo "<script>jQuery(function(){swal(\"¡Mal!\", \"Error al hacer la solicitud\", \"error\");});</script>";
  }
}
?>