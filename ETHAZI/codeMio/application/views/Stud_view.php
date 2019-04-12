<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Students</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <table border= "1">
        <tr>
            <td>Numero</td>
            <td>Id</td>
            <td>Nombre</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
        <?php
            $i = 1;
            foreach ($todo as $aux) {
                echo "<tr>";
                echo "<td>".$i++."</td>";
                echo "<td>".$aux->id."</td>";
                echo "<td>".$aux->name."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>