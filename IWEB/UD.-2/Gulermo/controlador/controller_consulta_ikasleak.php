<?php // 

require_once("../modelo/ikasleClass.php");
require_once("../modelo/ikasleModel.php");

$cont=new ikasleModel();

$cont->monstraralumnos();
$arr_alumnos=$cont->getListJSON();

$alumnos=json_encode($arr_alumnos);
echo ($alumnos);
/////////////////////CONTINUAR//////////////////
   
?>


