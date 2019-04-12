<?php
class confirm extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->model("Confirmar_model");

    }
    public function index() {
    }
    
    public function historial() {
        $idUser = $this->session->idUsuario;
        
        if (isset($idUser)) {
            // $data['confirmar'] = $this->db->query("CALL spViajePorUsuario($idUser)")->result();
            $data['confirmar'] = $this->Confirmar_model->getAllConfirmar();
            // $this->db->close();

            $this->load->view('confirmar', $data);
        }else{

            $this->load->view('confirmar');
        }

    }

}
?>