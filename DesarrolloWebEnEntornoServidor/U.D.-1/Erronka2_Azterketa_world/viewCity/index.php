<?php
    include_once "../clases/cityClass.php";

    if (isset($_GET['idCity'])) {
        $city = new cityClass();
        $info = $city->infoCity($_GET['idCity']);
        unset($city);
    }

    include_once "viewCity.html.php";
?>