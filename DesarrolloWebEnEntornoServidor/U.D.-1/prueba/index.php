<?php
    include_once "clases/conexion.php";
    include_once "clases/usuario.php";

    if (isset($_SESSION['user'])){
        header("Location: log/");
    }
    
    if (isset($_POST['user'])) {

        $user = new usuarioClass();
        $user->login($_POST['user']);

    }
    include_once "index.html.php";

?>