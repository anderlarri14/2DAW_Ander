<?php
class Trip_class{

  private $date;
  private $origin;
  private $destination;
  private $price;

  public function __construct() {
         
  }
  public function getDate(){
	  return $this->date;
  }
  
  public function setDate($date){
	  $this->date = $date;
  }

  public function getPrice(){
		return $this->price;
	}

	public function setPrice($price){
		$this->price = $price;
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