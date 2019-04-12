<?php
class City_class{
    private $origin;
    public function __construct() {
         
    }
  public function getOrigin(){
		return $this->origin;
	}

	public function setOrigin($origin){
		$this->origin = $origin;
	}

	public function getDestination(){
		return $this->destination;
	}

	public function setDestination($destination){
		$this->destination = $destination;
	}

}
?>