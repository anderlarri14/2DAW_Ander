<?php
include_once "conexion.php";

class cityClass {
    protected $ID;
    protected $Name;
    protected $CountryCode;
    protected $Population;

    public function getID() {
        return $this->ID;
    }

    public function getName() {
        return $this->Name;
    }

    public function getCountryCode() {
        return $this->CountryCode;
    }

    public function getPopulation() {
        return $this->Population;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setName($Name) {
        $this->Name = $Name;
    }

    public function setCountryCode($CountryCode) {
        $this->CountryCode = $CountryCode;
    }

    public function setPopulation($Population) {
        $this->Population = $Population;
    }

}
class cityModel{
    private $citys = [];

    public function __construct() {
        $conexion = new conexion();
        $resultado = $conexion->query("SELECT * FROM city");
        unset($conexion);

        foreach ($resultado as $aux) {
            $city = new cityClass();

            $city->setID($aux["ID"]);
            $city->setName($aux["Name"]);
            $city->setCountryCode($aux["CountryCode"]);
            $city->setPopulation($aux["Population"]);

                
            $this->citys[$aux['ID']] = $city;
            unset($city);
        }
    }
}


?>