<?php 
$con = new mysqli("localhost","desarrollo_delta","*Delta2021*","intranet");
$con->set_charset('utf8');
$lideres = mysqli_query($con,"SELECT * FROM usuario WHERE perfil = 1");
$ccostos = mysqli_query($con,"SELECT * FROM c_costos ");
?>
<div id="editgeneralModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <h3><center style="background-color: #0f6faa;padding: 13px; color: white; margin-right: 150px;margin-left: 150px;">EDITAR FUNCIONES</h3></center>
      <form  method="POST"> 
        <div class="modal-header"></div>
        <div class="modal-body">
          <div class="form-group ">
            <center><h3 style="color: #76838f">INFORMACIÓN</h3></center>
          </div>
          <br>
          <input type="hidden" name="id_funcion" id="id_funcion">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-5 col-form-label" style="color: black;">Documento:</label>
                <div class="col-sm-7">
                  <input class="form-control" type="text" id="documento_fun" name="documento_fun" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-5 col-form-label" style="color: black;">Funciones:</label>
                <div class="col-sm-7">
                  <textarea name="funciones" id="funciones" cols="80" rows="10"></textarea>
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
    $funciones = $_POST["funciones"];    
    $documento = $_POST["documento_fun"];
    //UPDATE en usuario 
    $sql = "UPDATE `funciones_c` SET `funciones` = '$funciones' WHERE `documento` = '$documento'";
    $query = mysqli_query($con,$sql);
    if ($query) {
      echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Ha hecho la solititud con éxito\", \"success\");});</script>";
    }else{
      echo "<script>jQuery(function(){swal(\"¡Mal!\", \"Error al hacer la solicitud\", \"error\");});</script>";
    }
    echo "<script> window.location.href = '../Usuarios/funciones.php';</script>";
   
  }
?>
