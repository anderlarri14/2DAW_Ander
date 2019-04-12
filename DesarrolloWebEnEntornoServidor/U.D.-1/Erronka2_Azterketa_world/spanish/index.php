<?php
    include_once "../clases/countryClass.php";

    $country = new countryClass();
    $spanish = $country->spanish();
    unset($country);


    include_once "spanish.html.php";
?>