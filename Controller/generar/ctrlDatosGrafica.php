<?php
require('../../Model/CFila.php');

session_start();
$filas = $_SESSION['filas'];

//Generando las etiquetas y los datos para las graficas
$etiquetasBarras = [];
$datosBarras = [];

$etiquetasPastel = [];
$datosPastel = [];

$i = 1;
foreach($filas as $fila){
    $etiquetasBarras[] = strval($fila->lri." - ".$fila->lrs);
    $datosBarras[] = $fila->f;
    $etiquetasPastel[] = strval($fila->grd."°");
    $datosPastel[] = $fila->grd;
    $i++;
}

$respuesta = [
    'etiquetasBarras' => $etiquetasBarras,
    'datosBarras' => $datosBarras,
    'etiquetasPastel' => $etiquetasPastel,
    'datosPastel' => $datosPastel,
];

echo json_encode($respuesta);  
?>