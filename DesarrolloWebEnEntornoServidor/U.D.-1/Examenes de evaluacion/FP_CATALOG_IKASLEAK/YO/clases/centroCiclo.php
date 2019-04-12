<?php
include_once "conexion.php";
class centroCicloClass{
	private $COD;
    private $school;
    private $town;
    private $territory;
    private $model;
    private $turn;

	public function getCOD(){
		return $this->COD;
	}

	public function setCOD($COD){
		$this->COD = $COD;
	}
	public function getSchool(){
		return $this->school;
	}

	public function setSchool($school){
		$this->school = $school;
	}

	public function getTown(){
		return $this->town;
	}

	public function setTown($town){
		$this->town = $town;
	}

	public function getTerritory(){
		return $this->territory;
	}

	public function setTerritory($territory){
		$this->territory = $territory;
	}

	public function getModel(){
		return $this->model;
	}

	public function setModel($model){
		$this->model = $model;
	}

	public function getTurn(){
		return $this->turn;
	}

	public function setTurn($turn){
		$this->turn = $turn;
    }
    

}

class centroCicloModel{
    private $centroCiclos = [];

    function __construct($ciclo){
		$con = new conexion();
		$result = $con->query("CALL spCentroPorCiclo('$ciclo')");
		
        foreach ($result as $aux) {
            $centroCiclo = new centroCicloClass();

			$centroCiclo->setCOD($aux['COD']);
            $centroCiclo->setSchool($aux['School']);
            $centroCiclo->setTown($aux['Town']);
            $centroCiclo->setTerritory($aux['Territory']);
            $centroCiclo->setModel($aux['Model']);
            $centroCiclo->setTurn($aux['Turn']);
            
            $this->centroCiclos[] = $centroCiclo;
            unset($centroCiclo);
            
        }
    }
    public function getCentroCiclos(){
        return $this->centroCiclos;
    }
}





?>