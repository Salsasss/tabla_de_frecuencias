<?php
if(!isset($_SESSION)) session_start();

if(
    (
        (isset($_POST['clases']) && !empty($_POST['clases']))
        &&
        (isset($_POST['frecuencias']) && !empty($_POST['frecuencias']))
    )
    ||
    (
        (isset($_SESSION['clases']) && !empty($_SESSION['clases']))
        &&
        (isset($_SESSION['frecuencias']) && !empty($_SESSION['frecuencias']))
    )
){
    if(!isset($_SESSION['clases']) && empty($_SESSION['clases'])){
        $_SESSION['clases'] = $_POST['clases'];
        $_SESSION['frecuencias'] = $_POST['frecuencias'];    
        $clases = $_POST['clases'];
        $frecuencias = $_POST['frecuencias'];
    }else{
        $clases = $_SESSION['clases'];
        $frecuencias = $_SESSION['frecuencias'];
    }

    $clases1 = explode(' ',trim($clases));
    $clases = array();
    foreach($clases1 as $c){
        $clases[] = explode('-',$c);
    }
    $frecuencias = explode(' ',trim($frecuencias));

    $valorMinimo = $clases[0][0];
    $valorMaximo = $clases[count($clases)-1][1];

    $n = 0; //n = numero de datos
    foreach($frecuencias as $f){
        $n += $f;
    }
    
    $r = $valorMaximo - $valorMinimo; //R = ValorMáximo - ValorMínimo
    $nc = count($clases);
    $a = ceil($r/$nc); //A = R / NC

    $li = $valorMinimo;

    $diferencia = $clases[1][0] - $clases[0][1];

    $lia = "";
    $lsa = "";
    $filas = array();
    for($i = 0; $i < $nc; $i++){        
        $fila = new Fila($n, $clases[$i][0], $clases[$i][1],[], $frecuencias[$i], $lia, $lsa, $diferencia, true);
        $lia = $fila->li;
        $lsa = $fila->ls;
        $filas[] = $fila;
    }

    //Generando la Frecuencia acumulada
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
        $fila->mcm2 = soloDosDecimales($fila->f*pow($fila->mc - $media,2));
    }

    $_SESSION['filas'] = $filas;
}
?>
