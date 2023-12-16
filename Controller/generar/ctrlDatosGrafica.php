
<?php
require('../../Model/CFila.php');

session_start();
$filas = $_SESSION['filas'];

//Generando las etiquetas y los datos para las graficas
$etiquetasBarras = [];
$datosBarras = [];

$etiquetasPastel = [];
$datosPastel = [];

foreach($filas as $fila){
    $etiquetasBarras[] = strval($fila->li." - ".$fila->ls);
    $datosBarras[] = $fila->f;
    $datosBarras2[] = $fila->frap;
    
    if($fila->li == $fila->ls){
        $etiquetasPastel[] = strval($fila->li);
    }else{
        $etiquetasPastel[] = strval($fila->li." - ".$fila->ls);
    }
    $datosPastel[] = $fila->grd;
}

$respuesta = [
    'etiquetasBarras' => $etiquetasBarras,
    'datosBarras' => $datosBarras,
    'datosBarras2' => $datosBarras2,
    'etiquetasPastel' => $etiquetasPastel,
    'datosPastel' => $datosPastel,
];

echo json_encode($respuesta);  
?>