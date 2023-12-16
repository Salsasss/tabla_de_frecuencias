<?php
//Desviacion Media (DM)
$desvMedia = soloDosDecimales($mcmTotal / $n);

//Varianza (σ²)
$varianza = soloDosDecimales($mcm2Total / $n);

//Desviación Estandar (σ)
$desvEstandar = soloDosDecimales(sqrt($varianza));

//Coeficiente de Variación (CV)
$cv = soloDosDecimales($desvEstandar / $media)*100;
?>