<?php

class ikasleClass {
protected $id;
protected $Nombre;
protected $Edad;
protected $Curso;

function getId(){
    return $this->id;
}
function getNombre(){
    return $this->Nombre;
}
function getEdad(){
    return $this->Edad;
}
function getCurso(){
    return $this->Curso;
}
function setId($id){
    $this->id=$id;
}
function setNombre($Nombre){
    $this->Nombre=$Nombre;
}
function setEdad($Edad){
    $this->Edad=$Edad;
}
function setCurso($Curso){
    $this->Curso=$Curso;
}
}

?>
