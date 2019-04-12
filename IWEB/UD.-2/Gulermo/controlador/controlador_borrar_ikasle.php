<?php
require_once("../modelo/ikasleClass.php");
require_once("../modelo/ikasleModel.php");
$cont=new ikasleModel();

$objeto_alumno = json_decode($_POST['datosJSON']);

$id=$objeto_alumno->id;


$cont->setId($id);


$cont->borrar_ikasle();

?>