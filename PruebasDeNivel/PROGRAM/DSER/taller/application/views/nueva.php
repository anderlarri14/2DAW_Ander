<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Nueva Tarea</br></br></br></br>
    

<?php $fecha_actual = date('m/d/Y'); ?>

    <form action="/taller/index.php/controller/insertar" method="POST">
   
        Matricula: <input type="text" name="matricula" value="<?php echo $dato->getPlate() ?>"></br>
        Nombre Cliente: <input type="text" name="nombre" value="<?php echo $dato->getObjetcustomer()->getName() ?>"></br>
        Modelo : <input type="text" name="modelo" value="<?php echo $dato->getModel() ?>"></br>
        Marca: <input type="text" name="marca" value="<?php echo $dato->getBrand() ?>"></br>
        Fecha: <input type="text" name="fecha" value="<?php echo $fecha_actual ?>"></br></br></br>

        <?php


foreach ($listaTareas as $tarea) {

    ?>
        
    <input type="checkbox"  name="chk[]" value='<?php echo $tarea->getIdTask() ?>' > <?php echo $tarea->getTaskDescr() ?>
<br>

<?php
}
?>
    
    <input type="submit" values="Insertar">
    </form>
</body>
</html>