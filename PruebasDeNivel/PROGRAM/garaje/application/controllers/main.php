<?php
class main extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->helper("url");
        $this->load->helper("form");

    }
    public function index(){
		
    }
    public function listView(){
        $matricula = $this->input->post('selectMatricula');

        $result = $this->db->query("CALL spMostrarDatos($matricula)")->result();
        $data[]
    }

    
}



?>