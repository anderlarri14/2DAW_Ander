<?php
include_once "../../clases/familias.php";
include_once "../../clases/centroCiclo.php";
include_once "../../clases/ciclos.php";


$centroCiclos = new centroCicloModel($_GET['ciclo']);

$res = $centroCiclos->getCentroCiclos();



include_once "index.html.php";

?>