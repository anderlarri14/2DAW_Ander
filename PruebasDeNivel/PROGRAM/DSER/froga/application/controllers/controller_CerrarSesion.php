<?php
defined('BASEPATH') or exit('No direct script access allowed');

class controller_CerrarSesion extends CI_Controller {

    public function index() {
        session_start();
        session_destroy();
        
    //    $this->load->view('index');

    header("Location: /froga");
    }
}
