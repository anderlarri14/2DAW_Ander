<?php
include_once "../modelo/ikasleClass.php";
include_once "../modelo/ikasleModel.php";

    $ikasle = new ikasleModel();

    $id = $_POST['id'];

    $ikasle->delIkasle($id);


?>