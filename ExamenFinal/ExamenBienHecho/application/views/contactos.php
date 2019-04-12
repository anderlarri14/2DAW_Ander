<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contactos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>Información del contacto</h1><br><br>
    <form action="modContact" method="post">
        <?php
        foreach ($contacto as $aux) {
            echo "<input type=\"hidden\" name=\"modId\" value=\"". $aux->id ."\"><br>";
            echo "<label for=\"modNombre\">Nombre: </label>";
            echo "<input type=\"text\" name=\"modNombre\" value=\"". $aux->Name ."\"><br>";
            echo "<label for=\"modApellido\">Apellido: </label>";
            echo "<input type=\"text\" name=\"modApellido\" value=\"". $aux->Surname ."\"><br>";
            echo "<label for=\"modTelefono\">Telefono: </label>";
            echo "<input type=\"number\" name=\"modTelefono\" value=\"". $aux->Telephone ."\"><br>";
        }
        if (isset($email[0]->e_mail)) {
            echo "<label for=\"\">Email1: </label>";
            echo "<input type=\"email\" name=\"modEmail1\" value=\"".$email[0]->e_mail."\"><br>";
        } else {
            echo "<label for=\"\">Email1: </label>";
            echo "<input type=\"email\" name=\"modEmail1\" value=\"\"><br>";   
        }

        if (isset($email[1]->e_mail)) {
            echo "<label for=\"\">Email2: </label>";
            echo "<input type=\"email\" name=\"modEmail2\" value=\"".$email[1]->e_mail."\"><br>";
        } else {
            echo "<label for=\"\">Email2: </label>";
            echo "<input type=\"email\" name=\"modEmail2\" value=\"\"><br>";   
        }

        if (isset($email[2]->e_mail)) {
            echo "<label for=\"\">Email3: </label>";
            echo "<input type=\"email\" name=\"modEmail3\" value=\"".$email[2]->e_mail."\"><br>";
        } else {
            echo "<label for=\"\">Email3: </label>";
            echo "<input type=\"email\" name=\"modEmail3\" value=\"\"><br>";   
        }
?>
        <h3>Groups</h3>
        <br>
<?php

        foreach ($allGroups as $listaGrupos) {
            $encontrado = false;
            foreach ($group as $grupoUser) {
                if ($listaGrupos->idGroup == $grupoUser->idGroup) {
                    $encontrado = true;
                }
            }

            if ($encontrado == true) {
                echo "<input type=\"radio\"value=\"". $listaGrupos->idGroup ."\" name=\"modGrupo[]\" checked>". $listaGrupos->groupName ."<br>";
            }else {
                echo "<input type=\"radio\"value=\"" . $listaGrupos->idGroup . "\" name=\"modGrupo[]\" >" . $listaGrupos->groupName . "<br>";         
            }
        }
        ?>
        
        <input type="submit" value="Modificar">
    </form><br>
    <?php
    var_dump($contacto);
    var_dump($email);
    var_dump($allGroups);
    
    
    ?>
</body>
</html>