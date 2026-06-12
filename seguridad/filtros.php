<?php 

// Conectar a la base de datos (reemplaza con tus credenciales)
$mysqli = new mysqli("localhost", "desarrollo_delta", "*Delta2021*", "intranet");

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Obtener la consulta desde la solicitud Ajax
$query = $_POST['query'];

// Realizar la búsqueda en la base de datos (reemplaza con tu lógica de búsqueda)
$sql = "SELECT * FROM ingresos WHERE documento LIKE '%$query%' LIMIT 1";
$result = $mysqli->query($sql);

// Construir una cadena con los resultados (puedes ajustar esto según tus necesidades)
$output = '';
while ($row = $result->fetch_assoc()) {
    $output .= $row['nombres'] . ', ';
}

// Eliminar la última coma y espacio
$output = rtrim($output, ', ');

// Mostrar los resultados
echo $output;

// Cerrar la conexión
$mysqli->close();