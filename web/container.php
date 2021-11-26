<?php 
    switch ($page) {
        case "catalogo":
            include_once("content/catalogo.php");
            break;
        case "optica":
            include_once("content/optica.php");
            break;
        case "atencion":
            include_once("content/atencion.php");
            break;
        case "convenio":
            include_once("content/convenio.php");
            break;
        case "promocion":
            include_once("content/promocion.php");
            break;
        case "historia":
            include_once("content/historias.php");
            break;
        default:
            include_once("content/inicio.php");
    }
?>