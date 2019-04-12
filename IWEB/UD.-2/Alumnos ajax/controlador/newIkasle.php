<?php

include_once("../modelo/ikasleClass.php");
include_once("../modelo/ikasleModel.php");

    $alumno = new ikasleModel();

    $nombre=$_POST["nombre"];
    $edad=$_POST["edad"];
    $curso=$_POST["curso"];

    $alumno->setNombre($nombre);
    $alumno->setEdad($edad);
    $alumno->setCurso($curso);

    $alumno->insertar_ikasle();

?>