<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/froga/index.php/controller_modificarDatos" method="POST">

    id<input type="text" name="id" value="<?php echo $dato->getIdContact();?>" readonly></br>
    Name<input type="text" name="nombre" value="<?php echo $dato->getName();?>"></br>
    Surname<input type="text" name="apellido"value="<?php echo $dato->getSurname();?>"></br>
    Telephone<input type="text" name="telefono"value="<?php echo $dato->getTel();?>"></br>
   
  
    Email<input type="text" name="email1" value="<?php if(isset($dato->getListEmails()[0])){echo($dato->getListEmails()[0]->getE_mail());} ?>"></br>
    Email2<input type="text" name="email2" value="<?php if(isset($dato->getListEmails()[1])){echo($dato->getListEmails()[1]->getE_mail());} ?>"></br>
    Email3<input type="text" name="email3" value="<?php if(isset($dato->getListEmails()[2])){echo($dato->getListEmails()[2]->getE_mail());} ?>"></br>

<?php

$Lagunak = "";
$Lanak = "";
$familia = "";

for ($i = 0; $i < count($dato->getListGroups()); $i++) {

    if (($dato->getListGroups()[$i]->getGroupName() == "Lagunak")) {
        $Lagunak = "checked";
    } else if (($dato->getListGroups()[$i]->getGroupName() == "Familia")) {
        $familia = "checked";
    } else if (($dato->getListGroups()[$i]->getGroupName() == "Lana")) {
        $Lanak = "checked";
    }

}
?>
    
    <input type="checkbox"  name="chk[]" value='2'<?php echo $familia ?> > Familia<br>
    <input type="checkbox" name="chk[]" value='3'<?php echo $Lanak ?> > Lanak<br>
    <input type="checkbox" name="chk[]" value='1'<?php echo $Lagunak ?> > Lagunak
  
<input type="submit" value="modificar"/>


   

</br>
</br>
</br>
</br>
</br>
</br>

    </form>
</body>
</html>