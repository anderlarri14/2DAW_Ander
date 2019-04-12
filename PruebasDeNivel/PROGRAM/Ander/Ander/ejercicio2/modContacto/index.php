<?php
    include_once "../../clases/conexion.php";
    include_once "../../clases/contactos.php";
    
    $contactos = new contactosModel();
    $contacto = new contactosClass();
    if (isset($_GET['id'])) {
        $contacto->setIdContact($_GET['id']);
        $contacto->setName($_GET['name']);
        $contacto->setSurname($_GET['surname']);
        $contacto->setTel($_GET['tel']);
        $contacto->modContact();

        
    }else {
        $contactoSelect = $_GET['contactoSelect'];
        $datosContacto = $contactos->infoContact($contactoSelect);

        $conexion = new conexion();
        $groups = $conexion->query("CALL spAllGroups()");

        
        include_once "index.html.php";
    }

?>