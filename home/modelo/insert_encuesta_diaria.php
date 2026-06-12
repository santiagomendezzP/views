<?php
  session_start();
?>


<?php
 // $sql = "SELECT * FROM  NOTICIAS  WHERE id_general='$general_id'";

/*Crear la conexión*/
$mysqli = new mysqli('localhost', 'desarrollo_delta', '*Delta2021*', 'intranet');

/*Usar la conexión para una consulta*/

/*Usar la conexión para una consulta*/
$c=$_GET['c'];
$doc=$_SESSION['intranet_documento'];
$id=$_SESSION['intranet_id'];
$c=$_SESSION['intranet_name'];
$u=$_SESSION['intranet_usuario'];
$d=$_SESSION['intranet_perfil'];
$car=$_SESSION['intranet_cargo'];
$proy=$_SESSION['intranet_proyecto'];
$estado ="INGRESO";





$sql="SELECT * FROM usuario  WHERE usuario='$c'";
$resultado = $mysqli->query($sql);
$fila=$resultado->fetch_assoc();


$sql = "INSERT INTO estadisticas_nav (cedula,id_usuario,usuario,user,perfil,cargo,proyecto,fecha_intro,estado,modulo)
VALUES ('$doc','$id','$c','$u','$d','$car','$proy',NOW(),'$estado','ENCUESTA DIARIA')";

if (mysqli_query($mysqli, $sql)) {
    $c = mysqli_insert_id($mysqli);
    // echo "New record created successfully. Last inserted ID is: " . $a;
} else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}




?>

<script language="JavaScript" type="text/javascript">

var pagina="../../home/test_covid19_diario.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 100);

</script>
                      