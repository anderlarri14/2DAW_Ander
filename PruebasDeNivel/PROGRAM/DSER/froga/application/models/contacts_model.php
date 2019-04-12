<?php

require_once APPPATH . '/models/contacts_class.php';
require_once APPPATH . '/models/emails_class.php';
require_once APPPATH . '/models/groups_class.php';
require_once APPPATH . '/models/contactsgroups_class.php';

class contacts_model extends contacts_class {

    private $listEmails = array();
    private $listGroups = array();
    private $list;

    public function getListEmails() {
        return $this->listEmails;
    }
    public function getList() {
        return $this->list;
    }

    public function setListEmails($listEmails) {
        $this->listEmails = $listEmails;
    }

    public function getListGroups() {
        return $this->listGroups;
    }

    public function setListGroups($listGroups) {
        $this->listGroups = $listGroups;
    }

    public function mostrarContactos() {
        $this->load->database();
        $sql = "CALL spMostrarContactos()";
        $this->list = array();
        $result = $this->db->query($sql);
        foreach ($result->result() as $row) {
            $new = new self();
            $new->setIdContact($row->idContact);
            $new->setName($row->name);
            $new->setSurname($row->surname);
            $new->setTel($row->tel);
            array_push($this->list, $new);

            $this->db->close();

        }
    }
    public function mostrarDatos($id) {
        
        $this->load->database();
        $sql = "CALL spMostrarDatos($id)";
        $result = $this->db->query($sql);
//solo devuelve un resultado

        foreach ($result->result() as $row) {
            $this->setIdContact($row->idContact);
            $this->setName($row->name);
            $this->setSurname($row->surname);
            $this->setTel($row->tel);

            $arr_emails = explode(",", $row->e_mail);
            $arr_idEmails = explode(",", $row->idEmail);

            for ($i = 0; $i < count($arr_emails); $i++) {
                $email = new emails_class();

                $email->setE_mail($arr_emails[$i]);
                $email->setIdEmail($arr_idEmails[$i]);
                array_push($this->listEmails, $email);

            }

            $arr_groups = explode(",", $row->groupName);

            for ($i = 0; $i < count($arr_groups); $i++) {

                $groupsContact = new groups_class;
                $groupsContact->setGroupName($arr_groups[$i]);
                array_push($this->listGroups, $groupsContact);

            }

            $this->db->close();

        }

    }

    public function ModificarDatos() {
        $this->load->database();
        $sql = "CALL spModificarDato($this->idContact,'$this->name','$this->surname','$this->tel')";
        $this->db->query($sql);
        $this->db->close();

    }


    public function BorrarEmails(){
        $this->load->database();
        $sql = "CALL spBorrarEmails($this->idContact)";
        $this->db->query($sql);
        $this->db->close();


    }
     public function BorrarGrupos(){
        $this->load->database();
        $sql = "CALL spBorrarGrupos($this->idContact)";
        $this->db->query($sql);
        $this->db->close();


    }

    function insertarGrupos($checked) {
    $this->load->database();
    foreach ($checked as $idGroup) {
        $sql = "CALL spInsertarGrupo($this->idContact,$idGroup)";

        $this->db->query($sql);
    }
    $this->db->close();
}


    function insertarEmails($email1, $email2, $email3) {
    $this->load->database();
    if ($email1 != "") {
        $sql = "CALL spInsertarEmail($this->idContact,'$email1')";
        $this->db->query($sql);
    }
    if ($email2 != "") {
        $sql = "CALL spInsertarEmail($this->idContact,'$email2')";
        $this->db->query($sql);

    }
    if ($email3 != "") {
        $sql = "CALL spInsertarEmail($this->idContact,'$email3')";
        $this->db->query($sql);

    }
    $this->db->close();

}


}
