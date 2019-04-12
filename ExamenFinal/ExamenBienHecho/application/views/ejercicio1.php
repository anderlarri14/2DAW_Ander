<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ejercicio1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
        // $galleta = $this->input->get_cookie('contador');
        if (0 == $galleta) {
            echo "Es la primera vez que inicias session!<br>";
            echo "<a href=\"logout\">Logout</a>";
        } else {
            echo "Bienvenido.<br>";
            echo "Visitas anteriores: ". $galleta. "<br>";
            echo "<a href=\"logout\">Logout</a>";

        }
        
    ?>
</body>
</html>