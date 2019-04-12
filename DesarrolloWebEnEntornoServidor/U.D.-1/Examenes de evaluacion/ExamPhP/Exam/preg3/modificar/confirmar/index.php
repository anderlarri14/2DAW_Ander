<?php
    include_once "../../../clases/conexion.php";
    include_once "../../../clases/country.php";

    $objCountrys = new countryModel();
    $objCountry = new countryClass();
    
    $objCountry->setCode($_POST['countryCode']);
    $objCountry->setName($_POST['countryName']);
    $objCountry->setContinent($_POST['continent']);
    $objCountry->setSurfaceArea($_POST['surface']);
    $objCountry->setIndepYear($_POST['independent']);
    $objCountry->setPopulation($_POST['pop']);
    $objCountry->setLifeExpectancy($_POST['life']);
    $objCountry->setCapital($_POST['capitalName']);

    if (isset($_GET['check'])) {
        $objCountry->modCountry();
    }

    include_once "index.html.php";
?>