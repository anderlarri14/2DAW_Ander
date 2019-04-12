<?php
    include_once "../clases/conexion.php";

    if (isset($_SESSION['ses'])) {
        header("Location:cookie");
    } else {
        $_SESSION['ses'] = "set";

        include_once "index.html.php";
    }
    

    


?>