<?php
    include('Controller/generar/ctrlTablaConDatos.php');
    if(!isset($n)){
        ?>
            <form class="formulario" action="?g=1&generar=1" method="POST">
                <label class="parrafo" for="datos">Introduce todos los datos separados por espacios:</label>
                <textarea class="datos" name="datos" id="datos" resize="none" placeholder="4 8 15 16 23 42">95 70 96 85 100 49 83 89 55 55 65 77 80 70 92 93 74 66 95 65 87 100 45 77 60 75 69 52 82 68 78 92 58 56 70 70 74 98 75 64</textarea>

                <input type="submit" class="boton" id="generar" value="Generar Tabla">
            </form>
       <?php 
    }
    include('View/generar/vistTabla.php');
?>    