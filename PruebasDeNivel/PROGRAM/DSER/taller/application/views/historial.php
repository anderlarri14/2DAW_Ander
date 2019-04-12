<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Historial</h2>
    


 <?php echo $dato->getPlate()?>
 <?php echo $dato->getBrand()?>
 <?php echo $dato->getModel()?>
    <table style="border">
    <tr>
    <th>IdVisit</th>
    <th>Date</th>
    <th>Tasks</th>
    <th>Editar</th>
    </tr>
    <?php
foreach ($datos as $fila) {
?>
  <tr>
    <td><?php echo $fila->getIdVisit()?></td>
    <td><?php echo $fila->getDate()?></td>
    <td><?php echo $fila->getListTask()->getTaskDescr() ?></td>
    <td><a href="/taller/index.php/controller/Mostrarmodificar?id=<?php echo $fila->getIdVisit() ?>">Editar</a></td>
  </tr>

  <?php
}

?>


    
    
    
    
    
    </table>
</body>
</html>