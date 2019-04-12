<?php
include_once "../clases/familias.php";
include_once "../clases/ciclos.php";
$ciclo = new cicloClass();
$ciclo->setCod_familia($_GET['familias']);

$resultado = $ciclo->cicloPorFamilia();

$nombreFamilia = $ciclo->nombreFamilia();


include_once "index.html.php";

?>