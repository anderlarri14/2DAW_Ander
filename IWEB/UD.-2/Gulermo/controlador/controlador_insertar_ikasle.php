<?php

require_once("../modelo/ikasleClass.php");
require_once("../modelo/ikasleModel.php");

    $mi_alumno = new ikasleModel();

    //ahora lo que hay que hacer es recoger los datos del ajax y pasarlos al modelo

    $objeto_alumno = json_decode($_POST['datosJSON']);

    $nombre=$objeto_alumno->nombre_alumno;
    $edad=$objeto_alumno->edad_alumno;
    $curso=$objeto_alumno->curso_alumno;

    $mi_alumno->setNombre($nombre);
    $mi_alumno->setEdad($edad);
    $mi_alumno->setCurso($curso);

    $mi_alumno->insertar_ikasle();
?>