<?php
include_once "../../../clases/centroCiclo.php";
include_once "../../../clases/ciclos.php";

$num = $_GET['COD'];
$con = new conexion();
$res = $con->query("CALL spCentro('$num')");

foreach ($res as $aux) {
    $centroName = $aux['Nombre'];
}

$miguel = cicloCod($num);


 include_once "index.html.php";

?>