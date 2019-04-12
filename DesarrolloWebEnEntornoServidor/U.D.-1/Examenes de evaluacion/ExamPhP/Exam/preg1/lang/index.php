<?php
include_once "../../clases/myfunctions.php";

if (!isset($_SESSION['lang'])) {
    header("Location: ../../");
}

include_once "index.html.php";

?>