<?php 
$con = new mysqli("localhost","desarrollo_delta","*Delta2021*","intranet");
$con->set_charset('utf8');
$lideres = mysqli_query($con,"SELECT * FROM usuario");
$ccostos = mysqli_query($con,"SELECT * FROM c_costos ");
$cargos = mysqli_query($con,"SELECT * FROM cargos ");
?>
<div id="agregarGeneralModal" class="modal fade">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
  <h3><center style="background-color: #0f6faa;padding: 13px; color: white; margin-right: 150px;margin-left: 150px;">AGREGAR CARGOS</h3></center>
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
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Jefe:</label>
                        <div class="col-sm-7">
                         <select class="form-control" name="jefe" id="jefe">
                            <option></option>
                            <?php while($j = mysqli_fetch_assoc($lideres)){ ?>
                            <option value="<?php echo $j['id_usuario']?>"> <?php echo $j['nombres']." ".$j['apellidos']; ?></option>
                           <?php }?>
                         </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Área,proyecto o proceso:</label>
                        <div class="col-sm-7">
                          <select class="form-control" name="ccostos" id="ccostos">
                            <option></option>
                            <?php while($cc = mysqli_fetch_assoc($ccostos)){ ?>
                            <option value="<?php echo $cc['id_proyecto']?>"> <?php echo $cc['proyecto']; ?></option>
                           <?php }?>
                         </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
       <div class="modal-footer">
      <input type="submit" name="agregar" id="agregar" class="btn" style="background-color: #0f6faa; color: white;" value="Aceptar">
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
    if(isset($_POST['agregar'])) {

// Recibimos por POST los datos procedentes del formulario 
    $c_costos = $_POST["ccostos"];
    $cargo = $_POST["cargo"];
    $jefe = $_POST["jefe"];
    //INSERT en usuario
    $sql = "INSERT INTO `cargos`  (`id_cargo` ,`cargo` , `jefe` , `proyecto`  ) VALUES (
    NULL,
    '$cargo',
    '$jefe',
    '$c_costos')";
     $query = mysqli_query($con,$sql);


if ($query ) {
 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Ha hecho la solititud con éxito\", \"success\");});</script>";

}

else {
  echo "<script>jQuery(function(){swal(\"¡Mal!\", \"Error al hacer la solicitud\", \"error\");});</script>";
}

}
?>