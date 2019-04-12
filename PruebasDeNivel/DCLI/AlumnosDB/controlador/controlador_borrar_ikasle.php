
<?php

require_once '../modelo/modelo_Ikasle.php';
$ikasle_id = $_POST['value']; 

$cont = new modelo_ikasle();
$cont->setId($ikasle_id);
$cont->delete();
unset($cont);
//$cont->borrar_ikasle($ikasle_id);
//print($ikasle_id)
?>



 