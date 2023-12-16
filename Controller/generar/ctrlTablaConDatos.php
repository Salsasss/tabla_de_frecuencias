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
    if(isset($_POST['intervalos']) && !empty($_POST['intervalos'])){
        $intervalos = true;
    }else{
        $intervalos = false;
    }

    sort($datos); //Ordenar los datos

    $valorMinimo = $datos[0];
    $valorMaximo = $datos[count($datos)-1];
    $n = count($datos); //n = numero de datos
    $r = $datos[count($datos)-1] - $datos[0];//R = ValorMáximo - ValorMínimo
    if($intervalos){
        $nc = redondearImparMasCercano(1 + 3.322*log10($n)); //NC = 1+3.3(Log(n))
        $a = ceil($r/$nc);
        //$a=9;
        //$nc+=5;
    }else{
        $a=1;
        $nc = count(array_unique($datos));
        //$nc=24;
    }
    $li = $valorMinimo;

    $diferencia = 1;

    $lsa = "";
    $lria = "";
    
    $incluye = false; //)
    if($a==1){    
        $incluye = true; //]
    }

    $filas = array();
    for($i=0; $i<$nc; $i++){
        if($a==1){
            $ls=$li;
        }else{
            $ls = $li + $a;
        }
        //Si es la ultima fila incluye = true
        if($i==$nc-1){
            $incluye = true; //]
        }
        $fila = new Fila($n, $li, $ls, $datos, 0, $lsa, $lria, $diferencia, $incluye);
        if($a==1){
            $li++;
        }else{
            $li = $ls;
        }
        $lsa = $fila->ls;
        $lria = $fila->lri;
        $filas[] = $fila;
    }

    //Generando los datos acumulados: fa, fc
    $filas[0]->fa = $filas[0]->f; //fa = 3
    $filas[0]->fc = $n - $filas[0]->f; //fa = 3
    for($i = 1; $i < $nc; $i++){
        $filas[$i]->fa = $filas[$i]->f + $filas[$i-1]->fa;
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

        $fila->mcm = soloDosDecimales(pow(($fila->mc - $media),2));
        $fila->mcm2 = soloDosDecimales($fila->f*soloDosDecimales(pow($fila->mc - $media,2)));
    }

    $_SESSION['filas'] = $filas;
}
?>