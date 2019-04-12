<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>LANBIDE ARLOAK/FAMILIAS PROFESIONALES</h1>
    <?php
    echo "<h1>".$nombreFamilia."</h1>";
    ?>
    <br><br>
    <h3>HEZIKETA-ZIKLOAK / CICLOS FORMATIVOS</h3>
    <br><br>
    <form action="centros" method="get">
    <select name="ciclo">
    <?php
        foreach ($resultado as $aux) {
            $option = "<option value=".$aux['cod_ciclo'].">".$aux['nom_ciclo_eu']."/".$aux['nom_ciclo_es']."</option>";
            echo $option;
        }
    ?>
    </select>
    <br><br>
    <input type="submit" value="OK">
    </form>
</body>
</html>