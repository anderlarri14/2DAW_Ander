<!DOCTYPE html>
<?php session_start() ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<H1>Las matriculas</H1>
     <form action="/taller/index.php/controller/nuevo" method='POST'>


  <?php 
  if(isset($_SESSION['sesion'])){
    echo "Sesion iniciada con nombre " . $_SESSION['sesion'] . "</br></br></br>";
  
  if(isset($_COOKIE['galleta'])){
echo " Y con una cookie llamada " . $_COOKIE['galleta']. "</br></br>"; 

  }else{
   
  }
  }else{
    echo "No tienes una sesion iniciada";
  }
  ?>


<select name="selecionado">




<?php
foreach ($listavehiculos as $datos) {

echo "<option value=".$datos->getPlate().">";?> <?php echo $datos->getPlate()?>
 </option>
<?php
}
?>

</select>
</br>
</br>
</br>
</br>
<input type="submit" name="historial"value="historial"/>
<input type="submit" name="nuevo"value="el nuevo"/>

  </form>
  
</body>
</html>