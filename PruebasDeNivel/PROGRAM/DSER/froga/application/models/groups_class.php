<?php


class groups_class extends CI_MODEL{



    protected $idGroup;
    protected $groupName;




    public function getIdGroup(){
		return $this->idGroup;
	}

	public function setIdGroup($idGroup){
		$this->idGroup = $idGroup;
	}

	public function getGroupName(){
		return $this->groupName;
	}

	public function setGroupName($groupName){
		$this->groupName = $groupName;
	}
}