<?php
    include_once "conexion.php";
    class contactosClass{
        private $idContact;
        private $name;
        private $surname;
        private $tel;

        public function __construct(){

        }
        
        public function setIdContact($idContact){
            $this->idContact = $idContact;
        }
        public function getIdContact(){
            return $this->idContact;  
        }
        public function setName($name){
            $this->name = $name;
        }
        public function getName(){
            return $this->name;  
        }
        public function setSurname($surname){
            $this->surname = $surname;
        }
        public function getSurname(){
            return $this->surname;  
        }
        public function setTel($tel){
            $this->tel = $tel;
        }
        public function getTel(){
            return $this->tel;  
        }
        public function modContact(){
            $conexion = new conexion();
            $id = $this->getIdContact();
            $nombre = $this->getName();
            $apellido = $this->getSurname();
            $tel = $this->getTel();
            $result = $conexion->query("CALL spModContact('$id','$nombre','$apellido','$tel')");
            header("Location:../");

        }
    }

    class contactosModel{
        
        private $contactos = [];

        public function __construct(){
            $conexion = new conexion();
            $resultado = $conexion->query("CALL spGetAllContacts");
            unset($conexion);

            foreach ($resultado as $aux) {
                $contacto = new contactosClass();

                $contacto->setIdContact($aux["idContact"]);
                $contacto->setName($aux["name"]);
                $contacto->setSurname($aux["surname"]);
                $contacto->setTel($aux["tel"]);

                $this->contactos[] = $contacto;
                unset($contacto);
            }
        }
        public function getContactos(){
            return $this->contactos;
        }

        public function escribirSelect(){
            $todos = $this->getContactos();

            foreach ($todos as $aux) {
                echo"<option value=\"" . $aux->getIdContact() . "\"> " . $aux->getName() ." ". $aux->getSurname() ." </option>";
            }
        }

        public function infoContact($id){
            $conexion = new conexion();
            $result = $conexion->query("CALL spContactDetails('$id')");
            
            return $result->fetch();
        }
        
        
    }



?>