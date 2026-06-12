<div id="agregarGeneralModal" class="modal fade">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
  <h3><center style="background-color: #0f6faa;padding: 13px; color: white; margin-right: 150px;margin-left: 150px;">AGREGAR COLABORADOR</h3></center>
      <form  method="POST" > 
       <div class="modal-header">
       </div>
       <div class="modal-body">
        <div class="form-group ">
         <center><h3 style="color: #76838f">INFORMACIÓN DEL USUARIO</h3></center>
        </div>
        <br>
                 <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Cargo:</label>
                        <div class="col-sm-7">
                          <select name="nombre_car" id="nombre_car" class="form-control" required>
                            <option ></option>
                            <option value="1">Auxiliar administrativo</option>
                            <option value="2">Asistente ambiental</option>
                            <option value="3">Asistente de gestion humana</option>
                            <option value="4">Asistente ecopetrol</option>
                            <option value="5">AUXILIAR DE SEGURIDAD</option>
                            <option value="6">Auxiliar de tecnologia</option>
                            <option value="7">Coordinador de proyecto</option>
                            <option value="8">DESARROLLAOR DE SOFTWARE</option>
                            <option value="9">Director de tecnologia</option>
                            <option value="10">JEFE DE SEGURIDAD Y LOGÍSTICA</option>
                            <option value="11">Psicologia</option>
                            <option value="12">SUPERVISOR I</option>
                            <option value="13">Vicepresidente general</option>
                            <option value="14">Vicepresidente de innnovacion</option>
                            <option value="15">Director financiero y administrativo</option>
                            <option value="16">Gestión para el talento</option>
                            <option value="17">Sin cargo actualmente</option>
                            <option value="18">Asistente presidencia</option>
                            <option value="19">Vicepresidente de gestión para el talento</option>
                            <option value="20">Gerente de gestión del conocimiento e Innovación</option>
                            <option value="21">Directora de desarrollo y bienestar</option>
                            <option value="22">COORDINADOR DE TECNOLOGÍA</option>
                            <option value="23">Gerente de salud ocupacional</option>
                            <option value="24">Director de gestión integral</option>
                            <option value="25">Jefe jurídico</option>
                            <option value="26">Relaciones corporativas</option>
                            <option value="27">Gerente de prevención preventiva</option>
                            <option value="28">Vicepresidente de operaciones</option>
                            <option value="29">Profesional</option>
                            <option value="30">Presidente</option>
                            <option value="31">Analista de tecnología</option>
                            <option value="32">ANALISTA DE INFORMACIÒN</option>
                            <option value="33">Coordinador de gestión integral</option>
                            <option value="34">Enfermera especialista</option>
                            <option value="35">Asistente de relaciones corporativas</option>
                            <option value="36">DIGITADOR</option>
                            <option value="37">AUXILIAR TÉCNICO</option>
                            <option value="38">ANALISTA I</option>
                            <option value="39">ASISTENTE ADMINISTRATIVO</option>
                            <option value="40">AUXILIAR DE SERVICIOS</option>
                            <option value="41">PROFESIONAL ESPECIALIZADO</option>
                            <option value="42">GESTOR TÉCNICO</option>
                            <option value="43">DESARROLLADOR I</option>
                            <option value="44">ANALISTA II</option>
                            <option value="45">SUPERVISOR II</option>
                            <option value="46">MENSAJERO</option>
                            <option value="47">COORDINADOR TÉCNICO MEDICO</option>
                            <option value="48">AUXILIAR DE MANTENIMIENTO</option>
                            <option value="49">DIRECTOR DE DESARROLLO</option>
                            <option value="50">EJECUTIVO DE RELACIONES</option>
                            <option value="52">Asesor</option>
                            <option value="53">Gerente de proyecto</option>
                            <option value="55">Coordinador de gestión de sst y de gestión ambiental</option>
                            <option value="56">Aprendiz </option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Funciones:</label>
                        <div class="col-sm-7">
                          <input type="text" name="funciones" id="funciones" class="form-control" title="Agregar funciones">
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
       <div class="modal-footer">
      <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
      <input type="submit" name="agregar" id="agregar" class="btn" style="background-color: #0f6faa; color: white;" value="Aceptar">
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
    $nombre_car = $_POST["nombre_car"];
    $funciones = $_POST["funciones"];    

  
//Lugar o espacio en el que labor

    //INSERT en usuario
    $sql = "INSERT INTO funciones_c(
    cargo,
    funciones)
    VALUES( 
    '$nombre_car',
    '$funciones')";
     $query = mysqli_query($con,$sql);

if ($query ) {
 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Ha hecho la solititud con éxito\", \"success\");});</script>";

}

else {
  echo "<script>jQuery(function(){swal(\"¡Mal!\", \"Error al hacer la solicitud\", \"error\");});</script>";
}

}
?>