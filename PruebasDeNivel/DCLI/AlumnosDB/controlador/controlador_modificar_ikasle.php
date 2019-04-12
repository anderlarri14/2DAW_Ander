
<?php
require_once '../modelo/modelo_ikasle.php';
 
$id=$_POST['id'];
$nombre= $_POST['nombre'];
$apellido1= $_POST['apellido1'];
$apellido2= $_POST['apellido2'];
$ciclo=$_POST['ciclo'];
$Curso= $_POST['curso'];
$id_ziklo=$_POST['id_ziklo'];

$cont = new modelo_ikasle();
$cont->setId($id);
$cont->setNombre($nombre);
$cont->setApellido1($apellido1);
$cont->setApellido2($apellido2);
$cont->setCurso($Curso); 
$cont->setCiclo($ciclo);
$cont->setId_ziklo($id_ziklo);

// echo "Id: " . $id;
// echo "Nombre: " . $nombre;
// echo "Apellido1: " . $apellido1;
// echo "Apellido2: " . $apellido2;
// echo "Curso: " . $Curso;
// echo "Ciclo: " . $ciclo;
// echo "IdZiklo: " . $id_ziklo;

$cont->update();
// print($nombre)


?>