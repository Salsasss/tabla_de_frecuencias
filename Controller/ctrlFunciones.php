<?php
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

function redondearImparMasCercano($numero){
    $redondeado = round($numero);
    if ($redondeado%2==0) {
        if ($numero-$redondeado < 0){
            $redondeado--;
        }else{
            $redondeado++;
        }
    }
    return $redondeado;
}
?>