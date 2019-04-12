<?php 
    include_once "../clases/cityClass.php";

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $code = $_POST['code'];
        $population = $_POST['population'];

        $city = new cityClass();
        $city->addCity($name, $code, $population);
        unset($city);

        header("Location: ..");
    }
    



    include_once "newCity.html.php";

?>