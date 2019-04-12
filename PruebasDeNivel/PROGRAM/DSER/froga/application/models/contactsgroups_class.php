<?php


class contactsgroups_class extends CI_MODEL{


protected $idContact;
protected $idGroup;



public function getIdContact(){
		return $this->idContact;
	}

	public function setIdContact($idContact){
		$this->idContact = $idContact;
	}

	public function getIdGroup(){
		return $this->idGroup;
	}

	public function setIdGroup($idGroup){
		$this->idGroup = $idGroup;
	}

}