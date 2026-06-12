<div id="editgeneralModal" class="modal fade">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
  <h3><center style="background-color: #0f6faa;padding: 13px; color: white; margin-right: 150px;margin-left: 150px;">EDITAR COLABORADOR</h3></center>
      <form  method="POST"> 
       <div class="modal-header">
       </div>
       <div class="modal-body">
        <div class="form-group ">
         <center><h3 style="color: #76838f">INFORMACIÓN DEL USUARIO</h3></center>
        </div>
        <br>
        <input type="hidden" name="id_u" id="id_u">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Usuario:</label>
                        <div class="col-sm-6">
                          <input type="text" name="usuario" id="usuario" class="form-control" title="Usuario intranet"  >
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Lugar o espacio en el que labora:</label>
                        <div class="col-sm-7">
                        <select name="lugar_trabajo_tipo" id="lugar_trabajo_tipo" class="form-control" >
                           <option></option>
                           <option value="1">Sede</option>
                           <option value="2">Teletrabajo</option> 
                           <option value="3">Trabajo en casa</option> 
                        </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Nombres:</label>
                        <div class="col-sm-6">
                          <input type="text" name="nombre" id="nombre" class="form-control" title="Nombre del solicitante"  >
                        </div>
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Apellidos:</label>
                        <div class="col-sm-7">
                          <input type="text" name="apellido" id="apellido" class="form-control" title="Apellidos"  >
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Tipo de documento:</label>
                        <div class="col-sm-6">
                          <select name="tipo_documento" id="tipo_documento" class="form-control" >
                            <option value="1">Cédula de ciudadanía</option>
                            <option value="2">Tarjeta de identidad</option>
                            <option value="3">Registro civil</option>
                            <option value="4">Cédula de extranjeria</option>
                            <option value="5">Pasaporte</option>
                          </select>
                        </div>
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Número de documento:</label>
                        <div class="col-sm-7">
                          <input type="text" name="codigo" id="codigo" class="form-control" title="cargo del solicitante">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Fecha de nacimiento:</label>
                        <div class="col-sm-6">
                          <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"  title="Ingrese la Area/proyecto al que pertenece"   >
                        </div>
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Género:</label>
                        <div class="col-sm-7">
                          <select name="genero_tipo" id="genero_tipo" class="form-control">
                          <option value="1">Masculino</option>
                          <option value="2">Femenino</option>
                        </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Fecha de ingreso:</label>
                        <div class="col-sm-6">
                          <input type="date" name="ingreso_delta" id="ingreso_delta" class="form-control"  title="Ingrese la Area/proyecto al que pertenece"  >
                        </div>
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Contrato a termino:</label>
                        <div class="col-sm-6">
                          <select name="contrato_termino" id="contrato_termino" class="form-control" required >
                            <option></option>
                            <option value="Fijo">Contrato a término Fijo</option>
                            <option value="Indefinido">Contrato a término indefinido</option>
                            <option value="de aprendizaje">Contrato de aprendizaje</option>
                            <option value="Prestación de servicios">Prestación de servicios</option>
                          </select>
                        </div>
                      </div>
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Área,proyecto o proceso:</label>
                        <div class="col-sm-6">
                          <select name="ccostos" id="ccostos" class="form-control">
                            <?php
                            $consulta_c = mysqli_query($con,"SELECT * FROM `c_costos`");
                            while ($row = mysqli_fetch_assoc($consulta_c)) { ?>
                              <option value="<?php echo $row['id_proyecto'];?>"><?php echo $row['proyecto'];?></option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Cargo:</label>
                        <div class="col-sm-7">
                          <select name="nombre_car" id="nombre_car" class="form-control">
                            <?php
                            $consulta_cargos = mysqli_query($con,"SELECT * FROM `cargos`");
                            while ($row = mysqli_fetch_assoc($consulta_cargos)) { ?>
                              <option value="<?php echo $row['id_cargo'];?>"><?php echo $row['cargo'];?></option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Salario:</label>
                        <div class="col-sm-6">
                          <input type="text" name="salario" id="salario" class="form-control" title="salario">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Auxilio salarial:</label>
                        <div class="col-sm-7">
                          <input type="text" name="auxilio_salarial" id="auxilio_salarial" class="form-control" title="Auxilio salarial">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Correo personal:</label>
                        <div class="col-sm-6">
                          <input type="text" name="correo_personal" id="correo_personal" class="form-control" title="Nombre del solicitante">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Correo Delta A Salud:</label>
                        <div class="col-sm-7">
                          <input type="text" name="correo" id="correo" class="form-control" title="cargo del solicitante">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Jefe inmediato:</label>
                        <div class="col-sm-7">
                          <select name="jefe_inmediato" id="jefe_inmediato" class="form-control" required>
                          <?php
                            $consulta_jefe = mysqli_query($con,"SELECT * FROM `usuario` ORDER BY nombres ASC");
                            while ($row = mysqli_fetch_assoc($consulta_jefe)) { ?>
                              <option value="<?php echo $row['id_usuario'];?>"><?php echo $row['nombres'] .' '. $row['apellidos'];?></option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Horario:</label>
                        <div class="col-sm-7">
                          <input type="text" name="horario_trabajador" id="horario_trabajador" class="form-control" title="Horario del solicitante" required>
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
    $id_usuario = $_POST['id_u'];
    $usuario = $_POST["usuario"];   
    $lugar_trabajo_tipo = $_POST["lugar_trabajo_tipo"]; 
    $jefe_inmediato = $_POST["jefe_inmediato"]; 
    $nombre = $_POST["nombre"]; 
    $apellido = $_POST["apellido"]; 
    $tipo_documento = $_POST["tipo_documento"];
    $codigo = $_POST["codigo"]; 
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $genero_tipo = $_POST["genero_tipo"];
    $ingreso_delta = $_POST["ingreso_delta"]; 
    $ccostos = $_POST["ccostos"];   
    $nombre_car = $_POST["nombre_car"];
    $salario = $_POST["salario"];
    $auxilio_salarial = $_POST["auxilio_salarial"];
    $correo_personal = $_POST["correo_personal"];
    $correo = $_POST["correo"];
    $contrato_termino = $_POST["contrato_termino"];
    $horario_trabajador = $_POST["horario_trabajador"];
  


  //UPDATE en usuario 
  $sql = "UPDATE `usuario` SET `usuario` = '$usuario',`tipo_documento` = '$tipo_documento', `codigo` = '$codigo', `fecha_nacimiento` = '$fecha_nacimiento', `proyecto` = '$ccostos', `cargo` = '$nombre_car', `lugar_trabajo` = '$lugar_trabajo_tipo', `nombres` = '$nombre', `apellidos` = '$apellido', `genero` = '$genero_tipo', `ingreso_delta` = '$ingreso_delta', `correo` = '$correo', `correo_personal` = '$correo_personal', `salario` = '$salario', `auxilio_salarial` = '$auxilio_salarial', `contrato_termino` = '$contrato_termino', `id_jefe_inmediato` = '$jefe_inmediato', `horario` = '$horario_trabajador'  WHERE `id_usuario` = '$id_usuario'";

  $query = mysqli_query($con,$sql);

if ($query ) {
 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Ha hecho la solititud con éxito\", \"success\");});</script>";

}else {
  echo "<script>jQuery(function(){swal(\"¡Mal!\", \"Error al hacer la solicitud\", \"error\");});</script>";
}
  echo "<script type='text/javascript'>location.href='redireccionamiento.html'</script>";
}
?>
