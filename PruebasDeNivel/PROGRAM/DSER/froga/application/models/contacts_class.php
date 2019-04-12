<?php


class contacts_class extends CI_MODEL{


protected $idContact;
protected $name;
protected $surname;
protected $tel;



public function getIdContact(){
		return $this->idContact;
	}

	public function setIdContact($idContact){
		$this->idContact = $idContact;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getSurname(){
		return $this->surname;
	}

	public function setSurname($surname){
		$this->surname = $surname;
	}

	public function getTel(){
		return $this->tel;
	}

	public function setTel($tel){
		$this->tel = $tel;
	}
}