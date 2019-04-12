<?php
include_once "conexion.php";

class imageClass {
    protected $idImage;
    protected $url;
    protected $key;

    public function getIdImage() {
        return $this->idImage;
    }

    public function setIdImage($idImage) {
        $this->idImage = $idImage;
    }

    public function getUrl() {
        return $this->url;
    }
    public function setUrl($url) {
        $this->url = $url;
    }

    public function getKey() {
        return $this->key;
    }

    public function setKey($key) {
        $this->key = $key;
    }

}

class imageModel {
    private $imagenes = [];

    public function __construct(){
        $con = new conexion();
        $result = $con->query("SELECT * FROM images");
        unset($con);

        foreach ($result as $aux) {

            $image = new imageClass();

            $image->setIdImage($aux['idImage']);
            $image->setUrl($aux['url']);
            $image->setKey($aux['key']);

            $imagenes[$aux['idImage']] = $image;
        }
    }

    public function getImageUrl($keyWord) {
        $con = new conexion();

        $TrimmedKeyWord = trim($keyWord); //delete whitespaces (or other characters) from the beginning and end of a string
        $result = $con->query("CALL spGetImageUrl('$TrimmedKeyWord')");

        foreach ($result as $aux) {
            return $aux['url'];
        }
    }
}

?>