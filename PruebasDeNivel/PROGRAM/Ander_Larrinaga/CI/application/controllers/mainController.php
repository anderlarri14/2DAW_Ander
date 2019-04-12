<?php
class mainController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->helper('cookie');
        $this->load->library("session");
    }

    public function index() {
        // $this->sin_login();
        $this->load->view("index.php");
    }

    public function exercise1(){
       echo "hola";
    }

    public function sinSession(){
        $this->load->view("ejercicio1/sinsesion.php");
    }
}

?>