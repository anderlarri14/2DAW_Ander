<?php // 

include_once("../modelo/ikasleClass.php");
include_once("../modelo/ikasleModel.php");

$ikasle=new ikasleModel();

$ikasle->monstraralumnos();
$arr_alumnos=$ikasle->getListJSON();

$alumnos=json_encode($arr_alumnos);
echo ($alumnos);

   
?>


