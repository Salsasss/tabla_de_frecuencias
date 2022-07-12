<?php
    include('Controller/generar/ctrlTablaConClases.php');
    if(!isset($n)){
        ?>
            <form class="formulario" action="?g=2&generar=1" method="POST">
                <label class="parrafo" for="datos">Introduce las Clases(LI-LS) separadas por espacios</label>
                <textarea class="datos clases" name="clases" id="datos" resize="none" placeholder="0-42 43-85 86-128 129-171 172-214 215-257 258-300">1-5 6-10 11-15 16-20 21-25 26-30 31-35</textarea>

                <label class="parrafo" for="datos">Introduce las Frecuencias(F) separadas por espacios</label>
                <textarea class="datos clases" name="frecuencias" id="datos" resize="none" placeholder="10 23 50 15 14 6 2">6 8 9 7 6 6 5</textarea>

                <input type="submit" class="boton" id="generar" value="Generar Tabla">
            </form>
       <?php 
    }
    include('View/generar/vistTabla.php');
?>