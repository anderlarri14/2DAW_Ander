<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class PerfilController extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('/userModel');
    }
    public function index(){
$user=filter_input(INPUT_POST, "usuario");
$contra=filter_input(INPUT_POST, "contra");

$usuario= new userModel();
$usuario->setNombreUsu($user);
$usuario->setContra($contra);
$entrar=$usuario->login();


if($entrar!=""){
    
    $_SESSION['id'] = $entrar;
    $_SESSION['usuario'] = $user;
    $this->load->view('perfil');  
}else{
    header("Location: /CodeIgniteEjer2");
}
     
    }
}

