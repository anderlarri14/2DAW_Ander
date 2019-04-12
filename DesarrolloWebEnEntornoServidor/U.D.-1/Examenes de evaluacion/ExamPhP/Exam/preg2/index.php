<?php
include_once "../clases/conexion.php";
include_once "../clases/country.php";

$objCountry = new countryModel();

if (isset($_POST['pais'])) {
    $pais = $_POST['pais'];
    setcookie("pais", $pais, time() + 3600, "/");
}


include_once "index.html.php";
?>