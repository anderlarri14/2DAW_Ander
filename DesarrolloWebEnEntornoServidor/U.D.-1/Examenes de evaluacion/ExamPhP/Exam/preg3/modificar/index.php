<?php
    include_once "../../clases/conexion.php";
    include_once "../../clases/country.php";

    $objCountrys = new countryModel();
    $objCountry = new countryClass();
    
    if (isset($_POST['countryCode'])) {
        include_once "confirmar.html.php";

        $objCountry->setCode($_POST['countryCode']);
        $objCountry->setName($_POST['countryName']);
        $objCountry->setContinent($_POST['continent']);
        $objCountry->setSurfaceArea($_POST['surface']);
        $objCountry->setIndepYear($_POST['independent']);
        $objCountry->setPopulation($_POST['pop']);
        $objCountry->setLifeExpectancy($_POST['life']);
        $objCountry->setCapital($_POST['capitalName']);
        
        echo "<pre>";
        echo print_r($objCountry);
        echo "</pre>";

        if (isset($_GET['check'])) {
            $objCountry->modCountry();
        }
        
    } else {
        if (isset($_GET['nombre'])) {
            $check = true;
        }else {
            $check = false;
        }
        
        $objCountry->getCountry();
    
        include_once "modificar.html.php";
    }
    
?>