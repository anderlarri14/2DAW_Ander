<?php

defined('BASEPATH') or exit('No direct script access allowed');
class controller_MostrarContactos extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('/contacts_model');
        $this->load->database();


    }

    public function index() {

        // $obj_usuario = new usuario_model();
        // $obj_usuario->mostrarUsuarios();
        // $data['listausuario']=$obj_usuario->getList();
        // $this->load->view('listausuario',$data);

        $obj_contacto = new contacts_model();
        $obj_contacto->mostrarContactos();
        $datos['listacontactos'] = $obj_contacto->getList();
       
        $this->load->view('contactos', $datos);

    }

}
