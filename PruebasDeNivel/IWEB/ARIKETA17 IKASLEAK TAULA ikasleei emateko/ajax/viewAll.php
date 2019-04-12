<?php
include_once "../clases/conexion.php";

$conexion = new conexion();
$result = $conexion->query("CALL spAllAlumnos()");

echo json_encode($result->fetchAll());

?>