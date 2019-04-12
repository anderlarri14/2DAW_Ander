
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php 
if(!isset($_COOKIE['galleta'])){


echo "This is your first time bro";
}else{


?>
<h1>A sesion is active, press logout to destroy the session</h1>




    <p>Number of previous visits :  <?php echo  $_COOKIE['galleta'] ?>  </p>

    <a href="/froga/index.php/controller_CerrarSesion">Logout</a>
    <?php 
}
?>
</body>

</html>
