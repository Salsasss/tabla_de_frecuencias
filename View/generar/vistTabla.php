<?php
if(!isset($_SESSION)) session_start();
if(isset($_GET['generar']) && !empty($_GET['generar'])){
    ?>
    <h2 class="subtitulo">Tabla de Frecuencias</h2>
    <div class="variables-cont">
        <span>Variables:</span>
        <div class="variables">
            <p> <?php echo "N = "?> <span class="var"> <?php echo $n ?> </span> </p>
            <p> <?php echo "R = "?> <span class="var"> <?php echo $r ?> </span> </p>
            <p> <?php echo "NC ≈ "?> <span class="var"> <?php echo $nc ?> </span> </p>
            <p> <?php echo "A ≈ "?> <span class="var"> <?php echo $a ?> </span> </p>
            <p> <?php echo "Diferencia ≈ "?> <span class="var"> <?php echo $diferencia ?> </span> </p>
        </div>
    </div>
    <?php
        include('View/vistVerColumnas.php');
    ?>
    <table class="tabla">
        <tr class="titulos">
            <th>I</th>
            <th>F</th>
            <th class="fa">Fa</th>
            <th class="fra">Fra</th>
            <th class="frap">Fra(%)</th>
            <th class="lri">LRI</th>
            <th class="lrs">LRS</th>
            <th class="fr">Fr</th>
            <th class="frp">Fr(%)</th>
            <th class="fc">Fc</th>
            <th class="frc">Frc</th>
            <th class="frcp">Frc(%)</th>
            <th class="mc">MC</th>
            <th class="grd">Grados°</th>
            <th class="fmc">FMC</th>
            <th class="mcm">F|MC-Mediana|</th>
            <th class="mcm2">F(MC-Mediana)²</th>
        </tr>
        <?php 
            $fTotal = 0;
            $frTotal = 0;
            $frpTotal = 0;
            $grdTotal = 0;
            $fmcTotal = 0;
            $mcmTotal = 0;
            $mcm2Total = 0;
            if(isset($filas) && !empty($filas)){
                foreach($filas as $fila){
                    ?>
                    <tr class="fila">
                        <td> <span class="var"> <?php echo $fila->li." - ".$fila->ls?> </span> </td>
                        <td> <?php echo $fila->f ?> </td>
                        <td class="fa">                        <?php echo $fila->fa                                                                   ?>      </td>
                        <td class="fra">  <span class="opera"> <?php echo $fila->fa.' / '.$fila->n.' = '                ?> </span> <?php echo $fila->fra  ?>  </td>
                        <td class="frap"> <span class="opera"> <?php echo $fila->fra.' * 100 = '                        ?> </span> <?php echo $fila->frap ?>% </td>
                        <td class="lri">  <span class="opera"> <?php echo $fila->li.' - ('.($diferencia/2).') = '       ?> </span> <?php echo $fila->lri  ?>  </td>
                        <td class="lrs">  <span class="opera"> <?php echo $fila->ls.' + ('.($diferencia/2).') = '       ?> </span> <?php echo $fila->lrs  ?>  </td>
                        <td class="fr">   <span class="opera"> <?php echo $fila->f.' / '.$fila->n.' = '                 ?> </span> <?php echo $fila->fr   ?>  </td>
                        <td class="frp">  <span class="opera"> <?php echo $fila->fr.' * 100 = '                         ?> </span> <?php echo $fila->frp  ?>% </td>
                        <td class="fc">   <span class="opera"> <?php echo $n.' - '.$fila->fa.' = '                      ?> </span> <?php echo $fila->fc   ?>  </td>
                        <td class="frc">  <span class="opera"> <?php echo $fila->fc.' / '.$fila->n.' = '                ?> </span> <?php echo $fila->frc  ?>  </td>
                        <td class="frcp"> <span class="opera"> <?php echo $fila->frc.' * 100 = '                        ?> </span> <?php echo $fila->frcp ?>% </td>
                        <td class="mc">   <span class="opera"> <?php echo '('.$fila->li.' + '.$fila->ls.')/2 = '        ?> </span> <?php echo $fila->mc   ?>  </td>
                        <td class="grd">  <span class="opera"> <?php echo '('.$fila->f.' * 360) / '.$fila->n.' = '      ?> </span> <?php echo $fila->grd  ?>° </td>
                        <td class="fmc">  <span class="opera"> <?php echo $fila->f.' * '.$fila->mc.' = '                ?> </span> <?php echo $fila->fmc  ?>  </td>
                        <td class="mcm">  <span class="opera"> <?php echo $fila->f.' * |'.$fila->mc.' - '.$media.' = <span class="opera-sub">'.soloDosDecimales(abs($fila->mc-$media)).'</span>|         = ' ?> </span> <?php echo $fila->mcm  ?>  </td>
                        <td class="mcm2"> <span class="opera"> <?php echo $fila->f.' * ('.$fila->mc.' - '.$media.' = <span class="opera-sub">'.soloDosDecimales(pow($fila->mc-$media,2)).'</span>)² = ' ?> </span> <?php echo $fila->mcm2 ?>  </td>
                    </tr>
                    <?php
                    $fTotal += $fila->f;
                    $frTotal += $fila->fr;
                    $frpTotal += $fila->frp;
                    $grdTotal += $fila->grd;
                    $fmcTotal += $fila->fmc;
                    $mcmTotal += $fila->mcm;
                    $mcm2Total += $fila->mcm2;
                }
                ?>
                <tr class="fila total">
                    <td> <span class="var">Total</span> </td>
                    <td> <?php echo $fTotal ?> </td>
                    <td class="fa"> - </td>
                    <td class="fra"> - </td>
                    <td class="frap"> - </td>
                    <td class="lri"> - </td>
                    <td class="lrs"> - </td>
                    <td class="fr"> <?php echo $frTotal ?> </td>
                    <td class="frp"> <?php echo $frpTotal ?>% </td>
                    <td class="fc"> - </td>
                    <td class="frc"> - </td>
                    <td class="frcp"> - </td>
                    <td class="mc"> - </td>
                    <td class="grd"> <?php echo $grdTotal ?>° </td>
                    <td class="fmc"> <?php echo $fmcTotal ?> </td>
                    <td class="mcm"> <?php echo $mcmTotal ?> </td>
                    <td class="mcm2"> <?php echo $mcm2Total ?> </td>
                </tr>
                <?php
            }
        ?>
    </table>
    <?php
        //Generando Media, Mediana y Moda 
        include('View/generar/vistMediaMedianaModa.php');

        //Generando Rango, Varianza, Desviacion Media y Desviaion Estandar
        include('View/generar/vistDispersion.php');

        //Generando Quantiles
        include('View/generar/vistQuantiles.php');

        if(isset($_GET['g']) && !empty($_GET['g']) && ($_GET['g']!=3 && $_GET['g']!=4)){
            //Generando Graficas
            include('View/generar/vistGraficas.php');
        }
    }
?> 
<script src="js/columnas.js"></script>
