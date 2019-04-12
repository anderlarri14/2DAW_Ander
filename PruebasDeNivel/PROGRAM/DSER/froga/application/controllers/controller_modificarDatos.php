<?php
defined('BASEPATH') or exit('No direct script access allowed');

class controller_modificarDatos extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('/contacts_model');
        $this->load->database();

    }

     public function index() {


        
        $id = $_POST["id"];
        $nombre =  $_POST["nombre"];
        $apellido =  $_POST["apellido"];
        $telefono =  $_POST["telefono"];
        $email1 =  $_POST["email1"];
        $email2 =  $_POST["email2"];
        $email3 =  $_POST["email3"];
        $checked =  $_POST["chk"];

       
        
        $contact = new contacts_model();
        $contact->setIdContact($id);
        $contact->setName($nombre);
        $contact->setSurname($apellido);
        $contact->setTel($telefono);
        $contact->ModificarDatos();
        $contact->BorrarEmails();
        $contact->insertarEmails($email1, $email2, $email3);
        $contact->BorrarGrupos();
        $contact->insertarGrupos($checked);




       
    //    header("Location: /froga");

    }
}
