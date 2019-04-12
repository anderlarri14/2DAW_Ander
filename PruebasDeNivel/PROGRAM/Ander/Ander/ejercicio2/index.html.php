<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Selecciona contacto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>Contact List</h1><br><br>
    <form action="modContacto" method="get" id="myForm">
        <select name="contactoSelect" form="myForm">
            <?php
            $contactos->escribirSelect();
            ?>
        </select>
        <input type="submit" value="Update">
    </form>
</body>
</html>