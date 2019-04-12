
 <?php

require_once '../modelo/modelo_Ikasle.php';
// $ikasle_array =json_decode($_POST['value']);

// echo $ikasle_array;
$nombre= $_POST['nombre'];
$apellido1= $_POST['apellido1'];
$apellido2= $_POST['apellido2'];

$curso= $_POST['curso'];
$ciclo= $_POST['ciclo']; 
$id_ziklo= $_POST['id_ziklo']; 

$cont = new modelo_ikasle();
$cont->setNombre($nombre);
$cont->setApellido1($apellido1);
$cont->setApellido2($apellido2);

$cont->setCurso($curso);
$cont->setCiclo($ciclo);
$cont->setId_ziklo($id_ziklo);
$cont->insert();

unset($cont);

//necesito el id del último alumno insertado

?>