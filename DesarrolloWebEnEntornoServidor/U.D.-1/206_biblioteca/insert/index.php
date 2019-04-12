<?php
    if(isset($_POST["titulo"])){
        include_once "../clases/libro.php";

        $libro = new libro();
        $libro->setTitulo($_POST["titulo"]);
        $libro->setAutor($_POST["autor"]);
        $libro->setNumPag($_POST["nPaginas"]);

        $libro->insertarLibro();
        header("location:../");




    }else {
        include_once "insert.html.php";
    }


?>