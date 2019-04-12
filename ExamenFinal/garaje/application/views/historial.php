<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Historial</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>Historial</h1><br>
    <table border="1px">
        <tr>
            <th>IdVisita</th>
            <th>Fecha</th>
            <th>Tareas</th>
            <th></th>
        </tr>

        <?php
            foreach ($historial as $aux) {
                echo "<tr>";
                echo "<td>". $aux->idVisita ."</td>";
                echo "<td>". $aux->fecha ."</td>";
                echo "<td>". $aux->Tareas ."</td>";
                echo "<td><a href=\"main/editar/?id=".$aux->idVisita."\">Editar</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>