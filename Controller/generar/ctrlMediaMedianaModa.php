<?php
//MEDIA
$media = soloDosDecimales($fmcTotal / $n);

//MEDIANA
if(isset($_GET['g']) && !empty($_GET['g']) && ($_GET['g']==1 || $_GET['g']==3)){
    //Con datos NO agrupados
    if($n%2==0){
        //n par
        $posMediana = $n/2;
        $mediana = ($datos[$posMediana-1] +  $datos[$posMediana])/2;
    }else{
        //n impar
        $posMediana = ($n+1)/2;
        $mediana = $datos[$posMediana-1];
    }
}else{
    //Con datos agrupados
    $m = 0;
    if($n%2==0){
        $m = $n/2;
    }else{
        $m = ($n+1)/2;
    }
    foreach($filas as $fila){
        if($fila->fa >= $m){
            $filaMediana = $fila;
            break;
        }else{
            $filaMedianaAntes = $fila;
        }
    }
    $ti = ($filaMediana->ls - $filaMediana->li) + $diferencia;
    $mediana = soloDosDecimales($filaMediana->lri + ((($n/2) - $filaMedianaAntes->fa)/$filaMediana->f) * $ti);
}
//MODA
if(isset($_GET['g']) && !empty($_GET['g']) && ($_GET['g']==1 || $_GET['g']==3)){
    //Con datos NO agrupados
    $datos = (explode(' ',trim($_SESSION['datos'])));

    $repetidos = array_count_values($datos);
    arsort($repetidos); //Ordenando de mayor a menor

    //Encontrando la Moda
    $valorAnterior = 0;
    foreach ($repetidos as $key => $valor) {
        if($valor < $valorAnterior) {
            break; 
        }else{
            $moda[] = $key;
            $valorAnterior = $valor;
        }
    }
}else{
    //Con datos agrupados
    $max = 0;
    $i=0;
    foreach($filas as $fila){
        if($fila->f > $max){
            $filaModa = $fila;
            $max = $fila->f;
            $m = $i;
        }
        $i++;
    }
    
    if(isset($filas[$m-1]) && !empty($filas[$m-1])){
        $filaModaAntes = $filas[$m-1];
        $fAntes = $filaModaAntes->f;
    }else{
        $fAntes = 0;
    }
    
    if(isset($filas[$m+1]) && !empty($filas[$m+1])){
        $filaModaDespues = $filas[$m+1];
        $fDespues = $filaModaDespues->f;
    }else{
        $fDespues = 0;   
    }
    $ti = ($filaModa->ls - $filaModa->li) + $diferencia;
    
    $d1 = $filaModa->f - $fAntes;
    $d2 = $filaModa->f - $fDespues;
    
    $moda = soloDosDecimales($filaModa->lri + ($d1/($d1 + $d2)) * $ti);
}
?>