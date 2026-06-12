<?php
  session_start();
?>


<?php
 // $sql = "SELECT * FROM  NOTICIAS  WHERE id_general='$general_id'";

/*Crear la conexión*/
$mysqli = new mysqli('localhost', 'root', '', 'intranet');

/*Usar la conexión para una consulta*/

/*Usar la conexión para una consulta*/
$c=$_GET['c'];

$doc=$_SESSION['intranet_documento'];
$id=$_SESSION['intranet_id'];
$c=$_SESSION['intranet_name'];
$u=$_SESSION['intranet_usuario'];
$u=$_SESSION['intranet_usuario'];

$medidas=$_GET['apellidos'];


$sql="SELECT * FROM test  WHERE usuario='$c'";
$resultado = $mysqli->query($sql);
$fila=$resultado->fetch_assoc();


$sql = "INSERT INTO test (cedula,id_usuario,nombre,usuario,fecha,apellidos)
VALUES ('$doc','$id','$c','$u',NOW(),medidas)";

if (mysqli_query($mysqli, $sql)) {
    $c = mysqli_insert_id($mysqli);
    // echo "New record created successfully. Last inserted ID is: " . $a;
} else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}




?>

<script language="JavaScript" type="text/javascript">

var pagina="../index.php"
function redireccionar() 
{
location.href=pagina
} 
setTimeout ("redireccionar()", 100);

</script>
                      