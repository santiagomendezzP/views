<?php 
$con = new mysqli("localhost","desarrollo_delta","*Delta2021*","intranet");
$con->set_charset('utf8');
$lideres = mysqli_query($con,"SELECT * FROM usuario");
$ccostos = mysqli_query($con,"SELECT * FROM c_costos ");
$funcioness = mysqli_query($con,"SELECT * FROM funciones_c WHERE id_funcion");
$cargos = mysqli_query($con,"SELECT * FROM cargos ");
?>
<div id="editgeneralModal" class="modal fade">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
  <h3><center style="background-color: #0f6faa;padding: 13px; color: white; margin-right: 150px;margin-left: 150px;">EDITAR CARGOS</h3></center>
      <form  method="POST"> 
       <div class="modal-header">
       </div>
       <div class="modal-body">
        <div class="form-group ">
         <center><h3 style="color: #76838f">INFORMACIÓN</h3></center>
        </div>
        <br>
           <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Cargo:</label>
                        <div class="col-sm-7">
                           <input type="text" name="cargo" id="cargo" class="form-control">
                           <input type="hidden" name="id_cargo" id="id_cargo" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Jefe:</label>
                        <div class="col-sm-7">
                         <select class="form-control" name="jefe" id="jefe">
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
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Centro de costos:</label>
                        <div class="col-sm-7">
                          <select class="form-control" name="ccostos" id="ccostos">
                            <option value=""></option>
                            <?php while($fila = mysqli_fetch_assoc($ccostos)){ ?>
                            <option 
                            value=
                            "<?php echo $fila['id_proyecto']; ?>" > 
                            <?php echo $fila['proyecto']; ?> 
                            </option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div>
                    <label class="col-sm-5 col-form-label">Funciones:</label>
                      <select class="form-control input-lg" type="text" name="funciones_c" id="funciones_c" >
                        <option value=""></option>
                            <?php while($fila = mysqli_fetch_assoc($funcioness)){ ?>
                            <option 
                            value=
                            "<?php echo $fila['id_funcion']; ?>">
                             <?php echo $fila['funciones']; ?> 
                            </option>
                            <?php }?>
                          </select>
                   </div>
                </div>
       <div class="modal-footer">
      <input type="submit" name="editar" id="editar" class="btn" style="background-color: #0f6faa; color: white;" value="Aceptar">
      <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
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
    if(isset($_POST['editar'])) {

// Recibimos por POST los datos procedentes del formulario 
    $c_costos = $_POST["ccostos"];
    $cargo = $_POST["cargo"];
    $jefe = $_POST["jefe"];
    $id_cargo = $_POST["id_cargo"];
    $funciones = $_POST["funciones_c"];

    //INSERT en usuario
    $sql="UPDATE `cargos` SET `cargo` = '$cargo', `jefe` = '$jefe', `proyecto` = '$c_costos', `funciones_c` = '$funciones' WHERE `id_cargo` = '$id_cargo'";
     
     $query = mysqli_query($con,$sql);


if ($query ) {
 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Ha hecho la solititud con éxito\", \"success\");});</script>";

}

else {
  echo "<script>jQuery(function(){swal(\"¡Mal!\", \"Error al hacer la solicitud\", \"error\");});</script>";
}

}
?>