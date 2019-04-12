<?php
    class Contacto_model{
        private $lista_contactos;
        private $lista_emails;
        private $lista_grupos;
        private $listaTodos_grupos;
        protected $CI;
        
        public function __construct(){
            $this->CI =& get_instance();
            $this->CI->load->library("Contacto_class");
            $this->CI->load->library("Email_class");
            $this->CI->load->library("Grupo_class");
            $this->CI->load->database();
        }
        public function getContactos(){
            return $this->lista_contactos;
        }
        public function getEmails(){
            return $this->lista_emails;
        }
        public function getGrupos(){
            return $this->lista_grupos;
        }
        public function rellenarContactos(){
            $contactos = $this->CI->db->get("contacts")->result();
            foreach ($contactos as $linea) {
                $contacto = new Contacto_class();
                $contacto->setId($linea->idContact);
                $contacto->setNombre($linea->name);
                $contacto->setApellido($linea->surname);
                $contacto->setTelefono($linea->tel);
                $this->lista_contactos[] =$contacto;
            }
        }
        
        

     
    }


?>