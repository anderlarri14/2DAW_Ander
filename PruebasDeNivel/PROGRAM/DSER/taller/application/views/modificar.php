<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>MODIFICAR</h2>

<form action="/taller/index.php/controller/modificar" method="POST">

    idVisit: <input type="text" name="id" value="<?php echo $datos->getIdVisit() ?>"></br>
    Date: <input type="text" name="date" value="<?php echo $datos->getDate() ?>"><br>


    <?php

$Brakes = "";
$Oil = "";
$Front = "";
$Rear = "";
$Fuel = "";
$Air = "";
$Battery = "";
$Brake = "";

for ($i = 0; $i < count($datos->getListTask()); $i++) {

    if (($datos->getListTask()[$i]->getTaskDescr() == "Brakes")) {
        $Brakes = "checked";
    } else if (($datos->getListTask()[$i]->getTaskDescr() == "Oil")) {
        $Oil = "checked";
    } else if (($datos->getListTask()[$i]->getTaskDescr() == "Front weels")) {
        $Front = "checked";
    }else if (($datos->getListTask()[$i]->getTaskDescr() == "Rear weels")) {
        $Rear = "checked";
    }else if (($datos->getListTask()[$i]->getTaskDescr() == "Fuel filter")) {
        $Fuel = "checked";
    }else if (($datos->getListTask()[$i]->getTaskDescr() == "Air filter")) {
        $Air = "checked";
    }else if (($datos->getListTask()[$i]->getTaskDescr() == "Battery")) {
        $Battery = "checked";
    }else if (($datos->getListTask()[$i]->getTaskDescr() == "Brake fluid")) {
        $Brake = "checked";
    }

}
?>

 <input type="checkbox"  name="chk[]" value='1'<?php echo $Brakes ?> > Brakes<br>
    <input type="checkbox" name="chk[]" value='2'<?php echo $Oil ?> > Oil<br>
    <input type="checkbox" name="chk[]" value='3'<?php echo $Front ?> > Front weels<br>
    <input type="checkbox" name="chk[]" value='4'<?php echo $Rear ?> > Rear weels<br>
    <input type="checkbox" name="chk[]" value='5'<?php echo $Fuel ?> > Fuel filter<br>
    <input type="checkbox" name="chk[]" value='6'<?php echo $Air ?> > Air filter<br>
    <input type="checkbox" name="chk[]" value='7'<?php echo $Battery ?> > Battery<br>
    <input type="checkbox" name="chk[]" value='8'<?php echo $Brake ?> > Brake fluid<br>
   <input type="submit" value="Modificar">
</form>
</body>
</html>