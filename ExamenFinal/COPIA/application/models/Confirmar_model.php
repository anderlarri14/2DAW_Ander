<?php
class Confirmar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function getAllConfirmar() {
        $idUser = $this->session->idUsuario;
        $result = $this->db->query("CALL spViajePorUsuario($idUser)");
        $this->db->close();

        return $result->result();

    }
    
}
?>