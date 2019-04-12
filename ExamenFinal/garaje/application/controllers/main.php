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
        $historial = $this->input->post('historial');
        $nuevo = $this->input->post('nuevo');
        $matricula = $this->input->post('selectMatricula');

		if (isset($historial)) {
            $this->listView();
        }if (isset($nuevo)) {
            $this->addView();
        }
        
    }
    public function listView(){
        $matricula = $this->input->post('selectMatricula');
        
        $data['historial'] = $this->db->query("CALL spHistorial('$matricula')")->result();
        $this->load->view('historial', $data);
    }

    public function addView(){
        $matricula = $this->input->post('selectMatricula');
        
        $data['vehiculo'] = $this->db->query("CALL spVehiculoPorMatricula('$matricula')")->row();
        $this->db->close();
        $data['contacto'] = $this->db->query("CALL spContactoPorMatricula('$matricula')")->row();
        $this->db->close();
        $data['allTareas'] = $this->db->get("tasks")->result();
        $this->db->close();
        
        $this->load->view('nuevo', $data);
        
    }
    public function editar(){

        $idVisit = $this->input->get('id');
        
        $matricula = $this->db->query("CALL spMatriculaPorIdVisit($idVisit)")->row('plate');
        $this->db->close();
        
        $data['vehiculo'] = $this->db->query("CALL spVehiculoPorMatricula('$matricula')")->row();
        $this->db->close();
        $data['contacto'] = $this->db->query("CALL spContactoPorMatricula('$matricula')")->row();
        $this->db->close();
        $data['allTareas'] = $this->db->get("tasks")->result();
        $this->db->close();
        $data['chkTareas'] = $this->db->query("CALL spTareasPorVisita($idVisit)")->result();
        $this->db->close();
        
        $this->load->view('nuevo', $data);
        
    }

    public function addReparacion(){
        $idCliente = $this->input->post('idCliente');
        $matricula = $this->input->post('newMatricula');
        // $matriculaa = $this->input->post('newMatricula');
        $modelo = $this->input->post('newModelo');
        $marca = $this->input->post('newMarca');
        $cliente = $this->input->post('newCliente');
        $fecha = $this->input->post('newFecha');
        $tareas = $this->input->post('newTareas');
        
        
        $this->db->query("CALL spUpdateCliente('$cliente', $idCliente)");
        $this->db->close();
        $this->db->query("CALL spUpdateVehiculo('$matricula','$marca','$modelo')");
        $this->db->close();
        $this->db->query("CALL spNewVisita('$matricula','$fecha')");
        $this->db->close();
        $topVisitId = $this->db->query("CALL spTopId()")->row('id');
        $this->db->close();

        if (isset($tareas)) {
            foreach ($tareas as $aux) {
                $this->db->query("CALL spNewTareasPorVisita($topVisitId,$aux)");
                $this->db->close(); 
            }
        }
        

    }


    
}



?>