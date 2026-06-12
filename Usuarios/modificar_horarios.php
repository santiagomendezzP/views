<?php
include ("./conexion.php");
// DOCUMENTOS PERSONAS 
$documentos = array(
    "1000991563"
    
);

for ($i=0; $i < count($documentos); $i++) { 
    $documento_usuario = $documentos[$i];
    $query_usuarios = mysqli_query($con,"SELECT `usuario`,`id_usuario`,`codigo` FROM `usuario` WHERE `codigo` = '$documento_usuario'"); 
    $array_usuarios = mysqli_fetch_all($query_usuarios,MYSQLI_ASSOC);
    for ($l=0; $l < count($array_usuarios); $l++) { 

        $usuarios = $array_usuarios[$l]['usuario'];
        
        $horario = 9;

        $actualizar = "UPDATE `usuario` SET `horario` = '$horario' WHERE `usuario` = '$usuarios'";
        $query = mysqli_query($con,$actualizar);
    }
}
?>