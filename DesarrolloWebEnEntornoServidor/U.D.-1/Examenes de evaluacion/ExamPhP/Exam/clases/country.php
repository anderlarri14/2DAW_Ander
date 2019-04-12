<?php
include_once "conexion.php";

class countryClass {

    protected $Code;
    protected $Name;
    protected $Continent;
    protected $SurfaceArea;
    protected $IndepYear;
    protected $Population;
    protected $LifeExpectancy;
    protected $Capital;

    public function getCode() {
        return $this->Code;
    }
    public function getName() {
        return $this->Name;
    }

    public function getContinent() {
        return $this->Continent;
    }

    public function getSurfaceArea() {
        return $this->SurfaceArea;
    }

    public function getIndepYear() {
        return $this->IndepYear;
    }

    public function getPopulation() {
        return $this->Population;
    }

    public function getLifeExpectancy() {
        return $this->LifeExpectancy;
    }

    public function getCapital() {
        return $this->Capital;
    }

    public function setCode($Code) {
        $this->Code = $Code;
    }
    public function setName($Name) {
        $this->Name = $Name;
    }

    public function setContinent($Continent) {
        $this->Continent = $Continent;
    }

    public function setSurfaceArea($SurfaceArea) {
        $this->SurfaceArea = $SurfaceArea;
    }

    public function setIndepYear($IndepYear) {
        $this->IndepYear = $IndepYear;
    }

    public function setPopulation($Population) {
        $this->Population = $Population;
    }

    public function setLifeExpectancy($LifeExpectancy) {
        $this->LifeExpectancy = $LifeExpectancy;
    }

    public function setCapital($Capital) {
        $this->Capital = $Capital;
    }
    public function escribirModificar($check){
        if ($check) {
            echo "<form action=\"\" method=\"post\">";
                echo "Country code <input type=\"text\" name=\"countryCode\" value=\"". $this->getCode() ."\"><br>";
                echo "Country name: <input type=\"text\" name=\"countryName\" value=\"". $this->getName() ."\"><br>";
                echo "Continent: <input type=\"text\" name=\"continent\" value=\"". $this->getContinent() ."\"><br>";
                echo "Surface area: <input type=\"text\" name=\"surface\" value=\"". $this->getSurfaceArea() ."\"><br>";
                echo "Independent year: <input type=\"text\" name=\"independent\" value=\"". $this->getIndepYear() ."\"><br>";
                echo "Country population: <input type=\"text\" name=\"pop\" value=\"". $this->getPopulation() ."\"><br>";
                echo "Life expectancy: <input type=\"text\" name=\"life\" value=\"". $this->getLifeExpectancy() ."\"><br>";
                echo "Capital name: <input type=\"text\" name=\"capitalName\" value=\"". $this->getCapital() ."\"><br>";
                echo "<input type=\"submit\" value=\"ok\">";
            echo "</form>";
        }else {
            echo "<form action=\"confirmar\" method=\"post\">";
                echo "Country code <input type=\"text\" name=\"countryCode\" value=\"". $this->getCode() ."\"><br>";
                echo "Continent: <input type=\"text\" name=\"continent\" value=\"". $this->getContinent() ."\"><br>";
                echo "Surface area: <input type=\"text\" name=\"surface\" value=\"". $this->getSurfaceArea() ."\"><br>";
                echo "Independent year: <input type=\"text\" name=\"independent\" value=\"". $this->getIndepYear() ."\"><br>";
                echo "Country population: <input type=\"text\" name=\"pop\" value=\"". $this->getPopulation() ."\"><br>";
                echo "Life expectancy: <input type=\"text\" name=\"life\" value=\"". $this->getLifeExpectancy() ."\"><br>";
                echo "<input type=\"submit\" value=\"ok\">";
            echo "</form>";
        }
    }

    public function modCountry(){
        $conexion = new conexion();
        $conexion->exec("CALL spModCountry()");
    }

    public function getCountry(){
        $conexion = new conexion();
        $sql = $_GET['country'];
        $result = $conexion->query("CALL spCountryCapital('$sql')");

        foreach ($result as $aux) {
            $this->setCode($aux['Code']);
            $this->setName($aux['Name']);
            $this->setContinent($aux['Continent']);
            $this->setSurfaceArea($aux['SurfaceArea']);
            $this->setIndepYear($aux['IndepYear']);
            $this->setPopulation($aux['Population']);
            $this->setLifeExpectancy($aux['LifeExpectancy']);
            $this->setCapital($aux['Capital']);
        }
    }
}

class countryModel {
    private $countrys = [];

    public function __construct() {
            $conexion = new conexion();
            $resultado = $conexion->query("SELECT * FROM country");
            unset($conexion);

            foreach ($resultado as $aux) {
                $country = new countryClass();

                $country->setCode($aux["Code"]);
                $country->setName($aux["Name"]);
                $country->setContinent($aux["Continent"]);
                $country->setSurfaceArea($aux["SurfaceArea"]);
                $country->setIndepYear($aux["IndepYear"]);
                $country->setPopulation($aux["Population"]);
                $country->setLifeExpectancy($aux["LifeExpectancy"]);
                $country->setCapital($aux["Capital"]);

                $this->countrys[] = $country;
                unset($country);
            }
        
    }
    public function getCountrys(){
        return $this->countrys;
    }

    public function option(){
            foreach ($this->countrys as $aux) {
                $option = "<option value='".$aux->getCode()."'>".$aux->getName()."</option>";
                echo $option;
            }
    
    }

}

?>