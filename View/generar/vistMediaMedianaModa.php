<?php
    include('Controller/generar/ctrlMediaMedianaModa.php');
?>
<h2 class="subtitulo">Medidas de tendencia central</h2>
<div class="variables-cont media">
    <div class="contenedor-media-res">
        <h3 class="subtitulo">Media</h3>
        <p> <?php echo "Media = ΣfX / N" ?> </p>
        <p> <?php echo "Media = ".$fmcTotal." / ".$n ?> </p>
        <p> <?php echo "Media ="?> <span class="var"> <?php echo $media ?> </span> </p>
    </div>
    <div class="contenedor-media-res">
        <h3 class="subtitulo">Mediana</h3>
        <?php
            if(isset($_GET['g']) && !empty($_GET['g']) && ($_GET['g']==1 || $_GET['g']==3) && (!isset($_POST['intervalos']) && empty($_POST['intervalos']))){
                ?> <p> <?php echo "Mediana ="?> <span class="var"> <?php echo $mediana ?> </span> </p> <?php
            }else{
                ?>
                <p> <?php echo "Mediana = LI + A(((N/2) - F₋₁) / f)" ?> </p>
                <p> <?php echo "Mediana = ".$filaMediana->li." + ".$a."(((".$n."/2) - ".$filaMedianaAntes->fa.") / ".$filaMediana->f.")" ?> </p>
                <p> <?php echo "Mediana ="?> <span class="var"> <?php echo $mediana ?> </span> </p>
                <?php	
            }
        ?>
    </div>
    <div class="contenedor-media-res">
        <h3 class="subtitulo">Moda</h3>
        <?php 
            if(isset($_GET['g']) && !empty($_GET['g']) && ($_GET['g']==1 || $_GET['g']==3) && (!isset($_POST['intervalos']) && empty($_POST['intervalos']))){
                ?> <p> <?php echo "Moda ="?> <span class="var"> <?php
                $i=0;
                foreach($moda as $m){
                    echo $m; 
                    if(count($moda)>1 && $i != count($moda)-1){
                        echo " - ";
                    }
                    $i++;
                }
                ?> </span> </p> <?php
            }else{
                ?>
                <p> <?php echo "Moda = LI + A(d1/(d1 + d2))" ?> </p>
                <p> <?php echo "Moda = ".$filaModa->li." + ".$a."(".$d1."/(".$d1." + ".$d2."))" ?> </p>
                <p> <?php echo "Moda ="?> <span class="var"> <?php echo $moda ?> </span> </p>
                <?php
            }
        ?>
    </div>
</div>