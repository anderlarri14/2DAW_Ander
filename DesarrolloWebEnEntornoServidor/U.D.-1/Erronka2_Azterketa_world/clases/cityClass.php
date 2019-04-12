<?php
include_once "conexion.php";

class cityClass {
    protected $ID;
    protected $Name;
    protected $CountryCode;
    protected $Population;
    
    
    function getID() {
        return $this->ID;
    }

    function getName() {
        return $this->Name;
    }

    function getCountryCode() {
        return $this->CountryCode;
    }

    function getPopulation() {
        return $this->Population;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setName($Name) {
        $this->Name = $Name;
    }

    function setCountryCode($CountryCode) {
        $this->CountryCode = $CountryCode;
    }

    function setPopulation($Population) {
        $this->Population = $Population;
    }

    function addCity($name, $code, $population){

        $conexion = new conexion();
        $conexion->query("CALL spNewCity('$name', '$code', '$population')");
        unset($conexion);
    }
    
    function infoCity($id){
        $conexion = new conexion();
        $city = $conexion->query("CALL spInfoCity('$id')");
        unset($conexion);

        return $city;
    }
    
}
