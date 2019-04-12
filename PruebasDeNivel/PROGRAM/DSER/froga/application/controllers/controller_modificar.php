<?php

defined('BASEPATH') or exit('No direct script access allowed');
class controller_modificar extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('/contacts_model');
        $this->load->database();

    }

    public function index() {

        



       $id = $_POST["selecionado"];
       $md_modificar = new contacts_model();
       $md_modificar->mostrarDatos($id);
       $arr_datos['dato'] = $md_modificar;
       $this->load->view('Modificar', $arr_datos);
        




    }

}
