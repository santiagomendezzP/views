<?php
if(isset($_GET['hash']) && $_GET['hash'] == 'CF617F44'){

    $con = new mysqli("localhost","desarrollo_delta","*Delta2021*","intranet");
    
    $consulta = mysqli_query($con,"SELECT `codigo` FROM `usuario` WHERE `est` = 0 ");
    $array = mysqli_fetch_all($consulta,MYSQLI_ASSOC);
    
    for ($i=0; $i < count($array); $i++) {
        $documentos =  $array[$i]['codigo'];
        $semana_actual = date("W");
        $semana_causada = ($semana_actual - 1);
        
        $insert = "INSERT INTO `control_horas_beneficios` (`documento`, `num_semana`, `estado`) VALUES ('$documentos', '$semana_causada', 0);";
        mysqli_query($con,$insert);
    } 
}

// ESTADOS

// CAUSADO = 0
// CONSUMIDO = 1
// DEVUELTO = 2
// VENCIDO = 3