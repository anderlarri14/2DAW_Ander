<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modificar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Make changes and press submit</h1><br>
    <form action="../modContacto" method="get">
        <?php
        echo "<label for=\"id\">Id: </label>";
        echo  $datosContacto['id'];
        echo "<input type=\"hidden\" name=\"id\" value=\"". $datosContacto['id'] ."\">";
        echo "<br><label for=\"name\">Name: </label>";
        echo "<input name=\"name\" type=\"text\" value=\"". $datosContacto['Name'] ."\"><br>";
        echo "<label for=\"surname\">Surname: </label>";
        echo "<input name=\"surname\" type=\"text\" value=\"". $datosContacto['Surname'] ."\"><br>";
        echo "<label for=\"tel\">Telephone: </label>";
        echo "<input name=\"tel\" type=\"text\" value=\"". $datosContacto['Telephone'] ."\"><br>";
        // echo "<input name=\"email1\" type=\"text\" value=\"". $datosEmail['email'] ."\"><br>";





        ?>
        <br>
            <?php
                foreach ($groups as $aux) {
                    // echo"<option value=\"" . $aux['idGroup'] . "\"> " . $aux['groupName'] ." </option>";
                    echo "<input type=\"checkbox\" name=\"checks\" value=\"" . $aux['idGroup'] . "\">";
                    echo "<label for=\"checks\">" . $aux['groupName'] ."</label><br>";
                }
            ?>
            
        <br>
        <input type="submit" value="Modificar">
    </form>
</body>
</html>