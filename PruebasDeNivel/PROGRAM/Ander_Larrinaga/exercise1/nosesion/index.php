<?php
    include_once "../../clases/conexion.php";
    
    if (!isset($_SESSION['ej1'])) {
        $_SESSION['ej1'] = "init";
        include_once "sinsession/index.php";
    } else {
        include_once "consession/index.php";
    }

?>