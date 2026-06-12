<?php

$conectar = new mysqli('localhost','desarrollo_delta','*Delta2021*','intranet');
$conectar->set_charset("utf8");
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="datos.csv"');


$fechaInicio = $_POST['fechaInicio'];
$fechaFin = $_POST['fechaFin'];


$sql = "SELECT fecha_autoriza, fecha_aut_salida, motivo_visita, nombres
        FROM ingresos
        WHERE fecha_autoriza
        BETWEEN '$fechaInicio' AND '$fechaFin'";
$query = mysqli_query($conectar, $sql);

$data = array();
$data[] = array('Fecha Autorizacion', 'Fecha Autorizacion Salida', 'Motivo Visita', 'Nombre Visitante');

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}
  
  $output = fopen('php://output', 'w');
  foreach ($data as $row) {
    fputcsv($output, $row);
  }
  fclose($output);
  