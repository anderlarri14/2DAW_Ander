<?php
include_once "conexion.php";
include_once "centroCiclo.php";

class cicloClass {
    private $cod_ciclo;
    private $cod_familia;
    private $tipo;
    private $nom_ciclo_es;
    private $nom_ciclo_eu;

	public function getCod_ciclo(){
		return $this->cod_ciclo;
	}

	public function setCod_ciclo($cod_ciclo){
		$this->cod_ciclo = $cod_ciclo;
	}

	public function getCod_familia(){
		return $this->cod_familia;
	}

	public function setCod_familia($cod_familia){
		$this->cod_familia = $cod_familia;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getNom_ciclo_es(){
		return $this->nom_ciclo_es;
	}

	public function setNom_ciclo_es($nom_ciclo_es){
		$this->nom_ciclo_es = $nom_ciclo_es;
	}

	public function getNom_ciclo_eu(){
		return $this->nom_ciclo_eu;
	}

	public function setNom_ciclo_eu($nom_ciclo_eu){
		$this->nom_ciclo_eu = $nom_ciclo_eu;
    }

    public function cicloPorFamilia(){
        $con = new conexion();

        $result = $con->query("CALL spCicloPorFamilia('$this->cod_familia')");
        
        return $result;
    }
    
    public function nombreFamilia(){
        $con = new conexion();

        $result = $con->query("CALL spNombreFamilia('$this->cod_familia')");

        foreach ($result as $aux) {
            $nombreFamilia = $aux['eu']." / ".$aux['es'];
        }
        return $nombreFamilia;
    }

    
}

class cicloModel {
    private $ciclos = [];

    public function __construct() {
        $con = new conexion();
        $result = $con->query("SELECT * FROM ciclos");
        unset($con);

        foreach ($result as $aux) {
            $ciclo = new cicloClass();

            $ciclo->setCod_ciclo($aux['cod_ciclo']);
            $ciclo->setCod_familia($aux['cod_familia']);
            $ciclo->setTipo($aux['tipo']);
            $ciclo->setNom_ciclo_es($aux['nom_ciclo_es']);
            $ciclo->setNom_ciclo_eu($aux['nom_ciclo_eu']);

            $this->ciclos[] = $ciclo;
            unset($ciclo);
        }
    }
    public function getciclos() {
        return $this->ciclos;
    }
    
}

function cicloCod($COD){
    $miguel= [];
    $con = new conexion();
    $result = $con->query("CALL spCentroOferta('$COD')");
    unset($con);

    foreach ($result as $aux) {
        $miguel[] = [
            "cicloEu"=>$aux['cicloEu'],
            "cicloEs"=>$aux['cicloEs'],
            "familiEu"=>$aux['familiEu'],
            "familiEs"=>$aux['familiEs']

        ];
    }
     return $miguel;
}