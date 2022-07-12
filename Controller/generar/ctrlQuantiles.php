<?php
if(
    isset($_POST['quartil']) && !empty($_POST['quartil'])
    &&
    isset($_POST['decil']) && !empty($_POST['decil'])
    &&
    isset($_POST['percentil']) && !empty($_POST['percentil'])
){
    if(isset($_GET['g']) && !empty($_GET['g']) && ($_GET['g']==1 || $_GET['g']==3)){
        $nombres = array("Quartil", "Decil", "Percentil");
        $quantiles = array(4, 10, 100);
        $posiciones = array($_POST['quartil'], $_POST['decil'], $_POST['percentil']);
        
        asort($datos);
        foreach($datos as $dato){
            $arreDatos[] = $dato;
        }
        $i=0;
        ?> <div class="form-quantil-down"> <?php
            foreach($posiciones as $k){
                $pos = 0;
                $pos = (($k*$n) / $quantiles[$i]) - 1; //-1 porque tratamos con arreglos
                if(($k*$n)%$quantiles[$i]==0){
                    //Si es exactamente divisible
                    $qn = ($arreDatos[$pos] + $arreDatos[$pos+1])/2;
                }else{
                    //Si NO es exactamente divisible
                    $pos = round($pos);
                    $qn = $arreDatos[$pos];
                }
                ?>
                    <div class="cont-datos">
                        <p class="res-quantil"> <?php echo $nombres[$i]." N.".$k." = " ?> <span class="var"> <?php echo $qn ?> </span> </p>
                    </div>
                <?php
                $i++;
            }
       ?> </div> <?php
    }else{
        $nombres = array("Q", "D", "P");
        $quantiles = array(4, 10, 100);
        $posiciones = array($_POST['quartil'], $_POST['decil'], $_POST['percentil']);

        $i = 0;
        ?> <div class="form-quantil-down"> <?php
            foreach($posiciones as $posicion){
                //Calculando la posicion
                $k = $posicion;
                $pos = ($k*$n) / $quantiles[$i]; 
                $posRedond = round(($k*$n) / $quantiles[$i]); //Posicion redondeada
            
                //Encontrando la filaQuantil y la filaQuantilAntes
                foreach($filas as $fila){
                    if($fila->fa >= $posRedond){
                        $filaQuantil = $fila;
                        break;
                    }else{
                        $filaQuantilAntes = $fila;
                    }
                }
                /*
                echo "k: ".$k."<br>";
                echo "n: ".$n."<br>";
                echo "pos: ".$pos."<br>";
                echo "posRedond: ".$posRedond."<br>";
                */
                $ti = ($filaQuantil->ls - $filaQuantil->li) + $diferencia;
                $qn = soloDosDecimales($filaQuantil->lri + (($pos - $filaQuantilAntes->fa)/$filaQuantil->f) * $ti);
                ?>
                    <div class="cont-datos">
                        <p class="res-quantil"> <?php echo $nombres[$i].$posicion." = LRI + ((K(N/".$quantiles[$i].") - Fa₋₁) / f)(Ti)" ?> </p>
                        <p class="res-quantil"> <?php echo $nombres[$i].$posicion." = ".$filaQuantil->lri." + ((".$pos." - ".$filaQuantilAntes->fa.") / $filaQuantil->f)(".$ti.")" ?> </p>
                        <p class="res-quantil"> <?php echo $nombres[$i].$posicion." = " ?> <span class="var"> <?php echo $qn ?> </span> </p>
                    </div>
                <?php
                $i++;
            }
        ?> </div> <?php
    }
}
?>