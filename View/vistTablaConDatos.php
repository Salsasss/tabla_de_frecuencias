<?php
    include('Controller/generar/ctrlTablaConDatos.php');
    if(!isset($n)){
        ?>
            <form class="formulario" action="?g=1&generar=1" method="POST">
                <div class="contenedor-flex">
                    <label class="parrafo margin-right" for="datos">Introduce todos los datos separados por espacios:</label>
                    <div class="contenedor-check" for="check-ver">
                        <input class="check-ver" id="intervalos" name="intervalos" type="checkbox" checked>
                        <label for="intervalos">Intervalos</label>
                    </div>
                </div>
                <textarea class="datos" name="datos" id="datos" resize="none" placeholder="4 8 15 16 23 42">32 20 20 24 24 18 18 18 25 26 41 37 37 37 26 26 26 27 27 32 32 32 29 40 40 44 44 18 18 45 34 34 30 30 30 28 28 28 35 28 42 42 30 22 30 24 30 22 24 20 28 20 22 28 35 22 28 35 26 26 28 44 35 45 26 32 40 20 26 32</textarea>

                <input type="submit" class="boton" id="generar" value="Generar Tabla">
            </form>
       <?php 
    }
    include('View/generar/vistTabla.php');
?>    