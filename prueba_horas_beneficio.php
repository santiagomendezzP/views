<?php 

// $con=new mysqli("localhost","desarrollo_delta","*Delta2021*","intranet"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
// $con->set_charset('utf8');
// date_default_timezone_set("America/Bogota");
// if(mysqli_connect_errno()){
//   echo 'Conexion Fallida : ', mysqli_connect_error();
//   exit();
// }else
// {
  
// }
// $array = [
//     "consecutivo" => [
//         "20954",
//         "20958",
//         "20960",
//         "20961",
//         "20962",
//         "20963",
//         "20964",
//         "20965",
//         "20966",
//         "20967",
//         "20969",
//         "20971",
//         "20976",
//         "20977",
//         "20978",
//         "20980",
//         "20986",
//         "20988",
//         "20989",
//         "20990",
//         "20991",
//         "20995",
//         "20996",
//         "20997",
//         "20998",
//         "20999",
//         "21000",
//         "21001",
//         "21002",
//         "21003",
//         "21004",
//         "21005",
//         "21008",
//         "21010",
//         "21011",
//         "21014",
//         "21015",
//         "21025",
//         "21027",
//         "21028",
//         "21029",
//         "21032",
//         "21033",
//         "21035",
//         "21038",
//         "21040",
//         "21041",
//         "21044",
//         "21049",
//         "21051",
//         "21056",
//         "21059",
//         "21068",
//         "21069",
//         "21070",
//         "21072",
//         "21073",
//         "21074",
//         "21076",
//         "21078",
//         "21079",
//         "20929",
//         "20947",
//         "20948",
//         "20949",
//         "20950",
//         "20951",
//         "20955",
//         "20956",
//         "20957",
//         "20959",
//         "20968",
//         "20970",
//         "20972",
//         "20973",
//         "20974",
//         "20975",
//         "20979",
//         "20981",
//         "20982",
//         "20983",
//         "20984",
//         "20985",
//         "20987",
//         "20992",
//         "20993",
//         "20994",
//         "21006",
//         "21007",
//         "21009",
//         "21012",
//         "21013",
//         "21016",
//         "21022",
//         "21023",
//         "21024",
//         "21026",
//         "21030",
//         "21034",
//         "21036",
//         "21037",
//         "21042",
//         "21043",
//         "21048",
//         "21050",
//         "21052",
//         "21057",
//         "21058",
//         "21060",
//         "21061",
//         "21062",
//         "21063",
//         "21064",
//         "21065",
//         "21066",
//         "21067",
//         "21071",
//         "21077",
//         "21081",
//         "21082",
//         "21083",
//         "21084",
//         "21085",
//         "21086",
//         "21087",
//         "21088",
//     ]
    
// ];


// for ($i=0; $i < count($array['consecutivo']); $i++) { 

//     $id_reporte = $array['consecutivo'][$i];

//     $update_reporte_horas = "UPDATE `reporte_horas` SET `estado_jefe` = '3', `observacion_consolidado` = 'Aprobado' WHERE `reporte_horas`.`id_reporte` = '$id_reporte'";
//     mysqli_query($con,$update_reporte_horas);

//     $update_consolidado_horas = "UPDATE `consolidado_horas` SET `estado_jefe` = '3' WHERE `consolidado_horas`.`id_reporte` = '$id_reporte'";
//     mysqli_query($con,$update_consolidado_horas);

//     $update_detalle_reporte = "UPDATE `detalle_reporte` SET `estado_jefe` = '3', `observacion_jefe` = 'Aprobado' WHERE `detalle_reporte`.`id_reporte` = '$id_reporte'";
//     mysqli_query($con,$update_detalle_reporte);
// }
