<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio03</title>
</head>
<body>
    <?php
    $semana = [
        "lunes" => 1,
        "martes" => 2,
        "miercoles" => 3,
        "jueves" => 4,
        "viernes" => 5,
        "sabado" => 6,
        "domingo" => 7
    ];

    if (isset($_GET["dia"])) {
        $url = $_GET["dia"];
        echo "La var tiene $url <br>";

        echo "El valor del $url es $semana[$url]";

    }else {
        echo "Introduce una variable en la url";
    }
    
    

    ?>
</body>
</html>