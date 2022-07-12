<?php
if(!isset($_SESSION)) session_start();

if(
    (isset($_POST['datos']) && !empty($_POST['datos']))
    ||
    (isset($_SESSION['datos']) && !empty($_SESSION['datos']))
){
    if(!isset($_SESSION['datos']) && empty($_SESSION['datos'])){
        $_SESSION['datos'] = $_POST['datos'];
        $datos = explode(' ',trim($_POST['datos']));
    }else{
        $datos = explode(' ',trim($_SESSION['datos']));
    }

    ordenarDatos($datos, 0, count($datos)-1);

    $valorMinimo = $datos[0];
    $valorMaximo = $datos[count($datos)-1];
    $n = count($datos); //n = numero de datos
    
    $r = $datos[count($datos)-1] - $datos[0];//R = ValorMáximo - ValorMínimo
    $nc = ceil(1 + 3.3*log10($n)); //NC = 1+3.3(Log(n))
    $a = ceil($r/$nc);

    $li = $valorMinimo;

    $diferencia = 1;

    $lsa = "";
    $lria = "";
    $filas = array();
    for($i = 0; $i < $nc; $i++){
        $ls = $li + $a;
        $fila = new Fila($n, $li, $ls-1,$datos, 0, $lsa, $lria, $diferencia);
        $li = $ls;        
        $lsa = $fila->ls;
        $lria = $fila->lri;
        $filas[] = $fila;
    }

    //Generando la Frecuencia acumulada
    $filas[0]->fa = $filas[0]->f; //fa = 3
    $filas[0]->fc = $n - $filas[0]->f; //fa = 3
    for($i = 1; $i < $nc; $i++){
        $filas[$i]->fa = $filas[$i]->sumarFrecuencias($filas[$i-1]->fa);
        $filas[$i]->fc = $filas[$i]->restarFrecuencias($filas[$i-1]->fc);
    }


    //Calculando la media ~antes de tiempo~
    $fmcTotal = 0;
    foreach($filas as $fila){
        $fmcTotal += $fila->fmc;
    }
    $media = soloDosDecimales($fmcTotal / $n);

    foreach($filas as $fila){
        $fila->fra = soloDosDecimales($fila->fa / $fila->n);
        $fila->frap = $fila->fra * 100;

        $fila->frc = soloDosDecimales($fila->fc / $fila->n);
        $fila->frcp = $fila->frc * 100;

        $fila->mcm = soloDosDecimales($fila->f*(abs($fila->mc - $media)));
        $fila->mcm2 = soloDosDecimales($fila->f*soloDosDecimales(pow($fila->mc - $media,2)));
    }

    $_SESSION['filas'] = $filas;
}
?>