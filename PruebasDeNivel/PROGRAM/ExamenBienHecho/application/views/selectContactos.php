<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ElegirContacto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<h1>Elige el contacto a modificar:</h1><br><br>

<form action="modificarView" method="post">
    <select name="selectContacto">
    <?php
        foreach ($contactosSelect as $aux) {
            echo "<option value=\"". $aux->idContact ."\">". $aux->name ." ". $aux->surname ."</option>";
        }
    ?>
    </select>
    <input type="submit" value="Modificar">
</form>
</body>
</html>