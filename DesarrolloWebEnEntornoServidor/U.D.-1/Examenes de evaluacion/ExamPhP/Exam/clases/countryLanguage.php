<?php
include_once "conexion.php";

class countryLanguageClass {
    protected $CountryCode;
    protected $Language;
    protected $IsOfficial;
    protected $Percentage;

    public function getCountryCode() {
        return $this->CountryCode;
    }

    public function getLanguage() {
        return $this->Language;
    }

    public function getIsOfficial() {
        return $this->IsOfficial;
    }

    public function getPercentage() {
        return $this->Percentage;
    }

    public function setCountryCode($CountryCode) {
        $this->CountryCode = $CountryCode;
    }

    public function setLanguage($Language) {
        $this->Language = $Language;
    }

    public function setIsOfficial($IsOfficial) {
        $this->IsOfficial = $IsOfficial;
    }

    public function setPercentage($Percentage) {
        $this->Percentage = $Percentage;
    }

}

?>