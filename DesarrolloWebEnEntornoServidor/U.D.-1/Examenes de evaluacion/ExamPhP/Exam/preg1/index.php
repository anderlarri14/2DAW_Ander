<?php
include_once "../clases/myfunctions.php";

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = getLanguage();
}


include_once "index.html.php";

?>