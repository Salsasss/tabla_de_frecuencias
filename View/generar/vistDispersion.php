<?php
    include('Controller/generar/ctrlDispersion.php');
?>
<h2 class="subtitulo">Medidas de Dispersi&oacute;n</h2>
<div class="variables-cont media">
    <div class="contenedor-media-res">
        <h3 class="subtitulo">Rango</h3>
        <p> <?php echo "Rango = ValorM&aacute;ximo - ValorM&iacute;nimo" ?> </p>
        <p> <?php echo "Rango = ".$valorMaximo." - ".$valorMinimo ?> </p>
        <p> <?php echo "Rango ="?> <span class="var"> <?php echo $r ?> </span> </p>
    </div>
    <div class="contenedor-media-res">
        <h3 class="subtitulo">Desviaci&oacute;n Media (DM)</h3>
        <p> <?php echo "DM = Σ(f|X - X̅|) / N" ?> </p>
        <p> <?php echo "DM = ".$mcmTotal." / ".$n ?> </p>
        <p> <?php echo "DM ="?> <span class="var"> <?php echo $desvMedia ?> </span> </p>
    </div>
    <div class="contenedor-media-res">
        <h3 class="subtitulo">Varianza (σ²)</h3>
        <p> <?php echo "σ² = Σ(f(X - X̅)²) / N" ?> </p>
        <p> <?php echo "σ² = ".$mcm2Total." / ".$n ?> </p>
        <p> <?php echo "σ² ="?> <span class="var"> <?php echo $varianza ?> </span> </p>
    </div>
    <div class="contenedor-media-res">
        <h3 class="subtitulo">Desviaci&oacute;n Estandar (σ)</h3>
        <p> <?php echo "σ = √σ²" ?> </p>
        <p> <?php echo "σ = √".$varianza ?> </p>
        <p> <?php echo "σ ="?> <span class="var"> <?php echo $desvEstandar ?> </span> </p>
    </div>
    <div class="contenedor-media-res">
        <h3 class="subtitulo">Coeficiente de Variaci&oacute;n (CV)</h3>
        <p> <?php echo "CV = σ / X̅" ?> </p>
        <p> <?php echo "CV = ".$desvEstandar." / ".$media ?> </p>
        <p> <?php echo "CV ="?> <span class="var"> <?php echo $cv ?> </span> </p>
    </div>
</div>