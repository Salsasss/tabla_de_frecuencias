<?php
require('Controller/ctrlFunciones.php');
require('Model/CFila.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Generador de Tablas de Frecuencias</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/globales.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/tabla.css">
    <link rel="stylesheet" href="css/quantiles.css">
    <link rel="stylesheet" href="css/graficas.css">
    <link rel="stylesheet" href="css/mediaMedianaModa.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header class="header">
        <div class="header-cont">
            <a class="logo" href="index.php">
                <h1 class="titulo">VinayBot-3000</h1>
            </a>
            <?php
                ?>
                <div class="contenedor-check operaciones" for="check-ver">
                    <label class="operaciones" for="opera">Ver Operaciones</label>
                    <input class="check-ver operaciones" id="opera" type="checkbox" <?php if(isset($_COOKIE['operaciones']) && $_COOKIE['operaciones']==1) echo 'checked' ?> >
                </div>
                <form class="form-decimales" action="?" method="POST">
                    <label for="numDecimales">N&uacute;mero de decimales</label>
                    <select name="numDecimales" id="numDecimales" required>
                        <option value="1" <?php if(isset($_COOKIE['numDecimales']) && $_COOKIE['numDecimales']==1)echo 'selected'?> >1</option>
                        <option value="2" <?php if(isset($_COOKIE['numDecimales']) && $_COOKIE['numDecimales']==2)echo 'selected'?> >2</option>
                        <option value="3" <?php if(isset($_COOKIE['numDecimales']) && $_COOKIE['numDecimales']==3)echo 'selected'?> >3</option>
                        <option value="4" <?php if(isset($_COOKIE['numDecimales']) && $_COOKIE['numDecimales']==4)echo 'selected'?> >4</option>
                    </select>
                    <input class="boton pequeño" type="submit" value="Ok">
                </form>
                <?php
                if(isset($_POST['numDecimales'])){
                    if(isset($_COOKIE['numDecimales'])){
                        setcookie('numDecimales', '', time()-60);
                    }
                    setcookie('numDecimales', $_POST['numDecimales'], time()+(86400 * 30));
                }
            ?>
        </div>
    </header>

    <div class="opciones">
        <a class="opcion <?php if(isset($_GET['g']) && !empty($_GET['g']) && ($_GET['g']==1 || $_GET['g']==3)) echo 'selected' ?>" href="?g=1">Generar Tabla con Datos</a>
        <a class="opcion <?php if(isset($_GET['g']) && !empty($_GET['g']) && ($_GET['g']==2 || $_GET['g']==4)) echo 'selected' ?>" href="?g=2">Generar Tabla con Clases y Frecuencias</a>
    </div>

    <div class="contenedor">
        <?php
            include('Controller/ctrlPrincipal.php');
        ?>
    </div>

    <footer class="footer <?php if(!isset($_GET['generar']) && empty($_GET['generar'])){ echo "fixed"; } ?> "> 
        <div class="contenedor">
            <p class="copy">Aar&oacute;n SA de CV <?php echo $anio = Date('Y'); ?> &copy;</p>
        </div>
    </footer>
</body>
</html>

