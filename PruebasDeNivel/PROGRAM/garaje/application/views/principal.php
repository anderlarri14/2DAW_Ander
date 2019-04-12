<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Garaje</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    <h1>Elije tu matrícula</h1><br>
    <form action="main/listView" method="POST">

        <select name="selectMatricula">
            <?php
        foreach ($vehiculos as $aux) {
            echo "<option value=\"$aux->plate\">". $aux->plate ."</option>";
            
        }
        ?>
    </select><br><br>
    <input type="submit" value="List">
    <a href="Nuevo"><button>Nueva</button></a>
</form>
</body>
</html>