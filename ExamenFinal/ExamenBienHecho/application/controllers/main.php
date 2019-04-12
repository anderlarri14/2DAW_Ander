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
    public function ejercicio1(){
        if (!isset($this->session->ses)) {
            $this->session->set_userdata("ses", true);
            
            $data['contactosSelect'] = $this->db->query("CALL spGetAllContacts()")->result();
            $this->db->close();
            $this->load->view('selectContactos',$data);
        } else {
            if (is_null(get_cookie('contador'))) {
                $cookie = array(
                    'name' => 'contador',
                    'value' => 0,
                    'expire' => '3700',
                );
                $this->input->set_cookie($cookie);
            } else {
                
                $contador = $_COOKIE['contador'];
                $cookie = array(
                    'name' => 'contador',
                    'value' => $contador + 1,
                    'expire' => '3700',
                );
                $this->input->set_cookie($cookie);
            }
            $data['galleta'] = $cookie['value'];
            $this->load->view('ejercicio1', $data);
            
        }
    }

    public function logout(){
        $this->session->unset_userdata("ses");
        redirect('../../../../');
    }

    public function ejercicio2(){
        $data['contactosSelect'] = $this->db->query("CALL spGetAllContacts()")->result();
        $this->db->close();
        $this->load->view('selectContactos',$data);
        
        
    }

    public function modificarView(){
        $idUsuario = $this->input->post('selectContacto');
        
        $data['contacto'] = $this->db->query("CALL spContactDetails($idUsuario)")->result();
        $this->db->close();
        $data['email'] = $this->db->query("CALL spEmailContact($idUsuario)")->result();
        $this->db->close();
        $data['group'] = $this->db->query("CALL spGroupContact($idUsuario)")->result();
        $this->db->close();
        $data['allGroups'] = $this->db->query("CALL spAllGroups()")->result();
        $this->db->close();
        
        $this->load->view('contactos', $data);
    }
    public function modContact(){
        $idUsuario = $this->input->post('modId');
        $nombre = $this->input->post('modNombre');
        $apellido = $this->input->post('modApellido');
        $telefono = $this->input->post('modTelefono');
        $email1 = $this->input->post('modEmail1');
        $email2 = $this->input->post('modEmail2');
        $email3 = $this->input->post('modEmail3');
        $grupos = $this->input->post('modGrupo[]');

        
        $this->db->query("CALL spModContact($idUsuario, '$nombre', '$apellido',$telefono)");
        $this->db->close();
        $this->db->query("CALL spDelEmails($idUsuario)");
        $this->db->close();
        $this->db->query("CALL spNewEmail($idUsuario,'$email1')");
        $this->db->close();
        $this->db->query("CALL spNewEmail($idUsuario,'$email2')");
        $this->db->close();
        $this->db->query("CALL spNewEmail($idUsuario,'$email3')");
        $this->db->close();
        $this->db->query("CALL spDelGroups($idUsuario)");
        $this->db->close();
        
        foreach ($grupos as $aux) {
            $this->db->query("CALL spNewGroup($idUsuario,$aux)");
            $this->db->close();
        }

        redirect("../../../../");
    }

    
}



?>