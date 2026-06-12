<?php 
include ("./conexion.php");
?>
<div id="CambiarAprobador" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <center><h3>Cambiar jefe aprobador</h3></center>
            <form  method="POST" enctype="multipart/form-data">
                <div class="modal-header"></div>
                <div class="modal-body">
                    <p style="color: black;">Persona a cargo de trabajadores:
                        <select name="persona1" id="persona1" class= 'form-control'>
                            <?php
                            $consulta_usuarios = mysqli_query($con,"SELECT * FROM `usuario`");
                            while($row = mysqli_fetch_assoc($consulta_usuarios)){ ?>
                                <option value="<?php echo $row['id_usuario'];?>"><?php echo $row['nombres'] . $row['apellidos'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </p>
                    <p style="color: black;">Nueva persona a cargo de trabajadores:
                        <select name="persona2" id="persona2" class= 'form-control'>
                            <?php
                            $consulta_usuarios2 = mysqli_query($con,"SELECT * FROM `usuario`");
                            while($row2 = mysqli_fetch_assoc($consulta_usuarios2)){
                                ?>
                                <option value="<?php echo $row2['id_usuario'];?>"><?php echo $row2['nombres'] . $row2['apellidos'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
                    <input type="submit" name="actualizar" id="actualizar" class="btn" style="background-color: #0f6faa; color: white;" value="Actualizar">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['actualizar'])) {
    $persona1 = $_POST['persona1'];
    $persona2 = $_POST['persona2'];

    $actualizar = "UPDATE `usuario` SET `id_jefe_inmediato` = '$persona2' WHERE `id_jefe_inmediato` = '$persona1'";
    $query = mysqli_query($con,$actualizar);

    $actualizar_reporte_horas = "UPDATE `reporte_horas` SET `id_jefe` = '$persona2' WHERE `id_jefe` = '$persona1'";
    $query2 = mysqli_query($con,$actualizar_reporte_horas);

    $actualizar_soli_beneficios = "UPDATE `soli_beneficios` SET `id_jefe_inmediato` = '$persona2' WHERE `id_jefe_inmediato` = '$persona1'";
    $query3 = mysqli_query($con,$actualizar_soli_beneficios);

    $actualizar_solicitud_vacaciones = "UPDATE `solicitud_vacaciones` SET `jefe` = '$persona2' WHERE `jefe` = '$persona1'";
    $query4 = mysqli_query($con,$actualizar_solicitud_vacaciones);

    $actualizar_soli_permiso = "UPDATE `soli_permiso` SET `id_jefe_inmediato` = '$persona2' WHERE `id_jefe_inmediato` = '$persona1'";
    $query5 = mysqli_query($con,$actualizar_soli_permiso);
}
?>