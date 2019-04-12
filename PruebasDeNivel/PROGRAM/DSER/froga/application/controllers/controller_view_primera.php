<?php
session_start();
defined('BASEPATH') or exit('No direct script access allowed');

class controller_view_primera extends CI_Controller {

      public function __construct() {

        parent::__construct();
       

    }
   
    public function index() {


if (!isset($_SESSION['start'])) {



        $sesion = true;
        $_SESSION['start'] = $sesion;

       

$this->load->view('primera');



        // header("Location: /froga/index.php/primera");

        
}else{

if(!isset($_COOKIE['galleta'])){

 
    $contador = 1;
setcookie('galleta', $contador, +time() + 60 * 60 * 24 * 365, "/");

     
}else{

    $cookie = $_COOKIE['galleta'];
    $contador = $cookie+1;
    setcookie('galleta', $contador, +time() + 60 * 60 * 24 * 365, "/");

}
$this->load->view('segunda');

    }
    

    } 

}
