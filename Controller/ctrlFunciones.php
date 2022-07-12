<?php
function ordenarDatos(&$datos, $bottom, $top){
    if(count($datos) < 2){
        return;
    }
    $pivote = $datos[($bottom + $top) / 2]; //Obtener el elemento de en medio    
    $down = $bottom;
    $up = $top;

    while($down <= $up){
        while($datos[$down] < $pivote){
            $down++;
        }
        while($datos[$up] > $pivote){
            $up--;
        }
        if($down <= $up){
            $aux = $datos[$down];
            $datos[$down] = $datos[$up];
            $datos[$up] = $aux;

            $down++;
            $up--;
        }

        if($bottom < $up){
            ordenarDatos($datos, $bottom, $up);
        }
        if($down < $top){
            ordenarDatos($datos, $down, $top);
        }
    }
}
function debug($valor){
    echo "<pre>";
    var_dump($valor);
    echo "<pre>";
}
function soloDosDecimales($numero){
    if(isset($_COOKIE['numDecimales'])){
        //Cargando configuración del usuario
        $numeroDecimales = $_COOKIE['numDecimales'] + 1;
    }else{
        //Por defecto serán 2 decimales despues del .
        $numeroDecimales = 3;
    }

    $numeroString = strval($numero);
    $i = strpos($numeroString, '.');

    $nuevoLen = strlen($numeroString) - ((strlen($numeroString)-$i));
    $nuevoNumero = floatval(substr($numeroString,0,$nuevoLen+$numeroDecimales));//+4 es el numero de decimales

    return $nuevoNumero;
}
?>