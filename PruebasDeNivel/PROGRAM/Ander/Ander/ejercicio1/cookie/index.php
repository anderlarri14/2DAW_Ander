<?php
    include_once "../../clases/conexion.php";

    if (isset($_COOKIE['galleta'])) {
        
        $_COOKIE['galleta'] = $_COOKIE['galleta'] + 1;
        include_once "index.html.php";
    } else {
        $_COOKIE['galleta'] = 1;

        include_once "index.html.php";
    }
    

    


?>