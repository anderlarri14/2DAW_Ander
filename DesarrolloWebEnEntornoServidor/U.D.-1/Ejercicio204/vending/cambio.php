<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambio</title>
</head>
<body>
    <?php 
    $billete=$_POST["billete"];
    $price=$_POST["price"];
    $cambio= $billete - $price;

    if ($cambio >= 0) {
        $arr_cambiosPosible= ["500", "100", "50", "20", "10", "5", "2", "1", "0.50", "0.20", "0.10", "0.05"];
        $arr_cambioFinal= [
            "500" => 0,
            "100" => 0,
            "50" => 0,
            "20" => 0,
            "10" => 0,
            "5" => 0,
            "2" => 0, 
            "1" => 0, 
            "0.50" => 0,
            "0.20" => 0,
            "0.10" => 0,
            "0.05" => 0
        ];

        //Relleno el array asociativo con el tipo de cambio necesario
        $cont = 0;
        foreach ($arr_cambiosPosible as $aux) {

            while ($cambio >= $aux) {

                $cambio = $cambio - $aux;
                $arr_cambioFinal["$aux"] = $arr_cambioFinal["$aux"] +1;

            }

        }
        ?>
        <!-- Formulario a rellenar con los valores del array -->
        <form action="" method="post">
        <?php
        foreach ($arr_cambioFinal as $aux2 => $valor) {
            echo "$aux2 €:<input type=\"text\" value=\"$valor\"><br>";
        }
    } else {
    ?>
        <script>alert("Que no puedes estafar dinero crack!!!")</script>
    <?php
    }
    ?>
        <a href="index.php">Volver</a>
    </form>
</body>
</html>