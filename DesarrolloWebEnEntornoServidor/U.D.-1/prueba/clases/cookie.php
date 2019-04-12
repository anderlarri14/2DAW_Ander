<?php
include_once "conexion.php";

class cookieClass {
    protected $id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNewCookie(){
        $con = new conexion();
        $result=$con->query("call spGetNewCookie()");
        
        foreach ($result as $aux) {
            return $aux['id'];
        }
        
    }
}

class cookieModel{
    private $cookies = [];  
    
    public function __construct(){
        $con = new conexion();
        $result = $con->query("SELECT * FROM cookies");
        unset($con);

        foreach ($result as $aux) {
            $cookie = new  cookieClass();

            $cokie->setId($aux['idCookie']);

            $cookies[] = $cookie;

        }
    }
}

?>