<div id="importar_funciones" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <center><h4>IMPORTAR EXCEL</h4></center>
            <form  method="POST" enctype="multipart/form-data"> 
                <div class="modal-header"></div>
                <div class="modal-body">
                <input type="file" id="archivo" name="archivo">
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
                    <input type="submit" name="importar" id="importar" class="btn" style="background-color: #0f6faa; color: white;" value="Aceptar">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include ('conexion.php');
require_once ('./PHPExcel/Classes/PHPExcel/IOFactory.php');
require_once ('./PHPExcel/Classes/PHPExcel.php');
if (isset($_POST['importar'])) {
    //LIBRERIA EXCEL 
    //OBTENER LIBRERIA 
    $archivo = $_FILES["archivo"]["name"];
    $archivo_ruta = $_FILES["archivo"]["tmp_name"];
    $archivo_guardado = "COPIA_".$archivo;
    if (copy($archivo_ruta, $archivo_guardado)) {
    }else{
    echo "NO COPIADO";
    }
    $objPHPExcel = PHPExcel_IOFactory::load($archivo_guardado);
    //cargar hoja de calculo
    $objPHPExcel -> setActiveSheetIndex(0);
    $num_filas = $objPHPExcel -> setActiveSheetIndex(0) -> getHighestRow();
    for ($i=2; $i <= $num_filas; $i++) {
        $documento = $objPHPExcel -> getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        if ($documento == '') {
        }else{
            //DATOS EXCEL
            $cargo = $objPHPExcel -> getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
            $funciones = $objPHPExcel -> getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
            $insertar =  "INSERT INTO `funciones_c` (`documento`, `cargo`, `funciones`) VALUES ('$documento', '$cargo', '$funciones');";
            $resultado = $con->query($insertar);
        }
    }
}
?>