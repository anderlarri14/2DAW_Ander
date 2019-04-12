<?php
class emailClass{
    private $idEmail;
    private $idContact;
    private $e_mail;

    public function setIdEmail($idEmail){
            $this->idEmail = $idEmail;
    }
    public function getIdEmail(){
        return $this->idEmail;  
    }
    public function setIdContact($idContact){
            $this->idContact = $idContact;
    }
    public function getIdContact(){
        return $this->idContact;  
    }
    public function setE_mail($e_mail){
            $this->e_mail = $idContact;
    }
    public function getE_mail(){
        return $this->e_mail;  
    }
    public function modEmail(){
        $conexion = new conexion();
        $idEmail = $this->getIdEmail();
        $email = $this->getE_mail();
        $result = $conexion->query("CALL spModEmail('$idEmail','$email')");
    }
}

?>