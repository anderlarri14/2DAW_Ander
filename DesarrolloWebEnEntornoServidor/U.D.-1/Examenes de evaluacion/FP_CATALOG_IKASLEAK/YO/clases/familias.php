<?php
include_once "conexion.php";
class familiaClass{
    private $cod;
    private $nom_familia_eu;
    private $nom_familia_es;
    
    public function getCod(){
		return $this->cod;
	}

	public function setCod($cod){
		$this->cod = $cod;
	}

	public function getNom_familia_eu(){
		return $this->nom_familia_eu;
	}

	public function setNom_familia_eu($nom_familia_eu){
		$this->nom_familia_eu = $nom_familia_eu;
	}

	public function getNom_familia_es(){
		return $this->nom_familia_es;
	}

	public function setNom_familia_es($nom_familia_es){
		$this->nom_familia_es = $nom_familia_es;
	}

}
class familiaModel{
    private $familias = [];

    public function __construct(){
        $con = new conexion();
        $result = $con->query("SELECT * FROM familias");
        unset($con);

        foreach ($result as $aux) {
            $familia = new familiaClass();

            $familia->setCod($aux['cod_familia']);
            $familia->setNom_familia_eu($aux['nom_familia_eu']);
            $familia->setNom_familia_es($aux['nom_familia_es']);

            $this->familias[] = $familia;
            unset($familia);
        }
    }
    public function getFamilias(){
        return $this->familias;
    }
    
}

function cicloPorFamilia($familia){
    $con = new conexion();
    $result = $con->query("CALL spCicloPorFamilia('$familia')");
    
    return $result;
}






?>