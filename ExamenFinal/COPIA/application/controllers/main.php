<?php
class main extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->helper("url");
        $this->load->helper("form");

    }
    public function index() {
    }
    public function logueo(){
        // if (isset($this->session->idUser)) {
        //     $this->session->unset_userdata("idUsuario", $usuario->idUser);
        //     $this->session->unset_userdata("userName", $usuario->userName);
        //     echo "no hay ya session";
        // }

        $user = $this->input->post('logUser');
        $pass = $this->input->post('logPass');

        $usuario = $this->db->query("CALL spUsuarioPorNombre('$user')")->row();
        $this->db->close();
        $data['ciudades'] = $this->db->get('cities')->result();
        $this->db->close();

        if ($pass == $usuario->keyWord1 || $pass == $usuario->keyWord2) {
            $this->session->set_userdata("idUsuario", $usuario->idUser);
            $this->session->set_userdata("userName", $usuario->userName);
            
            $this->load->view('newTrip', $data);
        }else {
            redirect('../../../../../');
        }
        
    }
    public function crearViaje(){
        $idUser = $this->session->idUsuario;
        $newOrigen = $this->input->post('newOrigen');
        $newDestino = $this->input->post('newDestino');
        $newFecha = $this->input->post('newFecha');

        // if (isset($newOrigen)) {
            $zonaOrigen = $this->db->query("CALL spZonaPorCiudad($newOrigen)")->row('cityZone');
            $this->db->close();
            $zonaDestino = $this->db->query("CALL spZonaPorCiudad($newDestino)")->row('cityZone');
            $this->db->close();
    
            $idPrice = $zonaOrigen - $zonaDestino;
            $idPrice = abs($idPrice);
    
            // echo $idUser;
            // echo "<br>";
            // echo $newOrigen;
            // echo "<br>";
            // echo $newDestino;
            // echo "<br>";
            // echo $newFecha;
            // echo "<br>";
            // echo $idPrice;
            // echo $zonaOrigen;
            // echo $zonaDestino;
            // INSERT INTO usertrips(idUser, idOrigin, idDestination, idPrice, date)
            $this->db->query("CALL spNewTrip($idUser, $newOrigen, $newDestino, $idPrice, '$newFecha')");
            $this->db->close();
        // }
        // if (isset($idUser)) {
        //     $data['confirmar'] = $this->db->query("CALL spViajePorUsuario($idUser)")->result();
        //     $this->db->close();
            
        // }
        // var_dump($confirmacion);
        
        
        // $this->load->view('confirmar', $data);
        redirect("../../../../confirm/historial");
    }
    


}
?>