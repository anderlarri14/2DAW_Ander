<?php
    include_once "../clases/conexion.php";
    
    if (!isset($_SESSION['id'])) {
        $_SESSION['id'] = "init";
        include_once "nosesion.php";
    } else {
        include_once "sesion.php";
    }

?>