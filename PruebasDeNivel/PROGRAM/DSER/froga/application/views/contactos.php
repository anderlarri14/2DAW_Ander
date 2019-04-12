<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ýyyyyy</title>
</head>
<body>
    

 <form action="/froga/index.php/controller_modificar" method='POST'>


<select name="selecionado">




<?php
foreach ($listacontactos as $datos) {

echo "<option value=".$datos->getIdContact().">";?> <?php echo $datos->getName(). " / " . $datos->getSurname()?>
 </option>
<?php
}
?>

</select>

<input type="submit" value="update"/>
  </form>
</body>
</html>