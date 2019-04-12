<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio01</title>
</head>
<body>
    <?php
    $estaciones=["Primavera", "Verano", "Otoño", "Invierno"];
    echo "Las estaciones son: ";
    foreach ($estaciones as $aux) {
        echo " $aux ";
    }
    ?>
</body>
</html>