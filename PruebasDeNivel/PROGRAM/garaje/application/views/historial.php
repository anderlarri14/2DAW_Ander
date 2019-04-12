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
    <table>
        <tr>
            <th>IdVisita</th>
            <th>Fecha</th>
            <th>Tareas</th>
        </tr>

        <?php
            foreach ($historial as $aux) {
                echo "";
                echo "";
                echo "<td>";
                foreach ($tareas as $aux) {
                    echo "$aux->";
                }
                echo"</td>";
            }
        ?>
    </table>
</body>
</html>