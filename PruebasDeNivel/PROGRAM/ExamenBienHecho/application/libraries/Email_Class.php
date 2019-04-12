<?php
    class Email_class{
        private $id;
        private $email;
        public function __construct(){
            
        
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id=$id;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        
    }


?>