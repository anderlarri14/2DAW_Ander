<?php


class emails_class extends CI_MODEL{


    protected $idEmail;
    protected $idContact;
    protected $e_mail;






    public function getIdEmail(){
		return $this->idEmail;
	}

	public function setIdEmail($idEmail){
		$this->idEmail = $idEmail;
	}

	public function getIdContact(){
		return $this->idContact;
	}

	public function setIdContact($idContact){
		$this->idContact = $idContact;
	}

	public function getE_mail(){
		return $this->e_mail;
	}

	public function setE_mail($e_mail){
		$this->e_mail = $e_mail;
	}

}