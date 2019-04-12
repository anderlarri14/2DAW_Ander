<?php
    include_once "../clases/countryClass.php";
    



    if (isset($_GET["cmbContinent"])) {

        $continente = $_GET["cmbContinent"];

        $paises = new countryClass();

        $listaPaises = $paises->viewCountry($continente);

        unset($paises);

    } else {
        header("Location: ..");
    }

    
    include_once "listado.html.php";

?>