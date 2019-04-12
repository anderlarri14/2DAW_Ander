<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <h1>LANBIDE-ARLOAK/FAMILIAS PROFESIONALES</h1>


    <h2>HEZIKETA-ZIKLOAK/CICLOS FORMATIVOS</h2>
    <table>
    <tr>
        <th>School</th>
        <th>Town</th>
        <th>Territory</th>
        <th>Model</th>
        <th>Turn</th>
        <a href=""></a>
    </tr>
    <?php

    

    foreach ($res as $aux) {
        echo "<tr>";
        echo "<td><a href=\"centro/?COD=".$aux->getCOD()." \">".$aux->getSchool()."</a></td>";
        echo "<td>".$aux->getTown()."</td>";
        echo "<td>".$aux->getTerritory()."</td>";
        echo "<td>".$aux->getModel()."</td>";
        echo "<td>".$aux->getTurn()."</td>";
        echo "</tr>";
    }
    
    ?>
    </table>
</body>
</html>