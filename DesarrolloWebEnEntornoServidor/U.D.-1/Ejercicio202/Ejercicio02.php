<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio02</title>
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
    
    print_r($semana);

    echo "<br>El total de los valores es: " . array_sum($semana);

    echo "<br>El average es: ";
    $average = array_sum($semana)/count($semana);
    echo $average;
    ?>
</body>
</html>