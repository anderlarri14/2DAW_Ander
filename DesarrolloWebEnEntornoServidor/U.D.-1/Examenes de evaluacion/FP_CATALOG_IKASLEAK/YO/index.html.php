<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Titulo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>LANBIDE ARLOAK/FAMILIAS PROFESIONALES</h1>
    <form action="ciclos" method="get">
    <select name="familias">
<?php
    $f = new familiaModel();

    $familias = $f->getFamilias();

    foreach ($familias as $aux) {
            $option = "<option value='".$aux->getCod()."'>".$aux->getNom_familia_eu()."/".$aux->getNom_familia_es()."</option>";
            echo $option;
        }
?>
    </select><br><br>
    <input type="submit" value="Cycles View">
    </form>
</body>
</html>