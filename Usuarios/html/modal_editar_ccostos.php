<?php 
$con = new mysqli("localhost","desarrollo_delta","*Delta2021*","intranet");
$con->set_charset('utf8');
$lideres = mysqli_query($con,"SELECT * FROM usuario ");
$ccostos = mysqli_query($con,"SELECT * FROM c_costos ");
?>
<div id="editgeneralModal" class="modal fade">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
  <h3><center style="background-color: #0f6faa;padding: 13px; color: white; margin-right: 150px;margin-left: 150px;">EDITAR </h3></center>
      <form  method="POST"> 
       <div class="modal-header">
       </div>
       <div class="modal-body">
        <div class="form-group ">
         <center><h3 style="color: #76838f">INFORMACIÓN</h3></center>
        </div>
        <br>
        <input type="hidden" name="id_proyecto" id="id_proyecto">
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Área,proyecto o procesos:</label>
                        <div class="col-sm-6">
                          <input type="text" name="ccostos" id="ccostos" class="form-control" >

                        </div>
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Codigo:</label>
                        <div class="col-sm-7">
                          <input type="text" name="codigo" id="codigo" class="form-control" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">lider:</label>
                        <div class="col-sm-7">
                          <select class="form-control" name="lider" id="lider">
                            <option value=""></option>
                            <?php while($fila = mysqli_fetch_assoc($lideres)){ ?>
                            <option 
                            value=
                            "<?php echo $fila['id_usuario']; ?>" > 
                            <?php echo $fila['nombres']." ".$fila['apellidos']; ?> 
                            </option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
       <div class="modal-footer">
      <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
      <input type="submit" name="editar" id="editar" class="btn" style="background-color: #0f6faa; color: white;" value="Aceptar">
    </div>
  </form>
</div>
</div>
</div>


<?php
  //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
   

    if(isset($_POST['editar'])) {
// Recibimos por POST los datos procedentes del formulario    
    $id_proyecto = $_POST['id_proyecto'];
    $c_costos = $_POST["ccostos"];  
    $codigo = $_POST["codigo"]; 
    $lider = $_POST["lider"]; 
    
echo $id_proyecto;


    //UPDATE en usuario 
$sql = "UPDATE `c_costos` SET `proyecto` = '$c_costos', `codigo` = '$codigo', `lider` = '$lider' WHERE `id_proyecto` = '$id_proyecto'";

$query = mysqli_query($con,$sql);

if ($query ) {
 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Ha hecho la solititud con éxito\", \"success\");});</script>";

}

else {
  echo "<script>jQuery(function(){swal(\"¡Mal!\", \"Error al hacer la solicitud\", \"error\");});</script>";
}

}
?>
