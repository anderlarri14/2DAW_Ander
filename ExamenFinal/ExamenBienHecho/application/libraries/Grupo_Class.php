<?php
    class Grupo_class{
        private $id;
        private $grupo;
        public function __construct(){
            
        
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id=$id;
        }

        public function getGrupo(){
            return $this->grupo;
        }
        public function setGrupo($grupo){
            $this->grupo = $grupo;
        }
        
    }


?>