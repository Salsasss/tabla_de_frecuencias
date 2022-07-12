<?php
if(isset($_GET['g']) && !empty($_GET['g'])){
    $tiposDatos = $_GET['g'];
    switch($tiposDatos){
        case 1: 
            if(!isset($_SESSION)) session_start();
            unset($_SESSION);
            session_destroy();
            include('View/vistTablaConDatos.php');
            break;
        case 2:
            if(!isset($_SESSION)) session_start();
            unset($_SESSION);
            session_destroy();
            include('View/vistTablaConClases.php');
            break;
        case 3:
            include('Controller/generar/ctrlTablaConDatos.php');
            include('View/generar/vistTabla.php');
            include('Controller/generar/ctrlQuantiles.php');
            include('View/generar/vistGraficas.php');
            break;
        case 4:
            include('Controller/generar/ctrlTablaConClases.php');
            include('View/generar/vistTabla.php');
            include('Controller/generar/ctrlQuantiles.php');
            include('View/generar/vistGraficas.php');
            break;
        default: 
    }
}
?>