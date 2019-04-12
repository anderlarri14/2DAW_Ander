<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Control</title>
</head>
<body>
    <?php 
    $usr = $_POST["usr"];
    $pass = $_POST["pass"];
    if ($usr == "desarrollador" && $pass == "1234") {
        echo "<h1>Login correcto crack</h1>";
    }else {
        echo "<h1>Login incorrecto</h1>";
    }
    ?>
    <a href="Ejercicio01.php">Volver</a>
</body>
</html>