<?php
defined('BASEPATH') or exit('No direct script access allowed');

class controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('/vehicles_model');
        $this->load->model('/task_model');
        $this->load->model('/visits_model');
        $this->load->model('/visits_tasks_model');

    }
    public function index() {

            //Cargo el index y el combobox con las matriculas
        $obj_vehiculo = new vehicles_model();
        $obj_vehiculo->mostrarvehiculos();
        $datos['listavehiculos'] = $obj_vehiculo->getList();
        $this->load->view('index', $datos);
    }

    public function nuevo() {
        
        $matricula = $_POST["selecionado"];
        $nuevo = filter_input(INPUT_POST, 'nuevo');
        $historial = filter_input(INPUT_POST, 'historial');
        $checkeado = filter_input(INPUT_POST, 'checkeado');
//Recojo el valor del boton y  dependiendo a cual le des hace una cosa o otra//
        if ($nuevo == "el nuevo") {
                //Si no existe la sesion creamela
            if (!isset($_SESSION['sesion'])) {
                session_start();
                $usuario = "glinfor";
                $_SESSION["sesion"] = $usuario;
                    //Si no existe la cookie creamela
                if (!isset($_COOKIE['galleta'])) {

                    $matricula = $_POST["selecionado"];

                    setcookie('galleta', $matricula, +time() + 60 * 60 * 24 * 365, "/");

                } else {
                    //Vuelvo a crear la cookie para guardar la ultima matricula que e seleccionado
                    $matricula = $_POST["selecionado"];

                    setcookie('galleta', $matricula, +time() + 60 * 60 * 24 * 365, "/");

                }
            
            }
            //Cargo la vista Nueva con los checkoboxes con las tareas
            $obj_tareas = new task_model();
            $obj_tareas->mostrarTareas();
            $datos['listaTareas'] = $obj_tareas->getList();

            //Cargo la vista Nueva con los datos del vehiculo
            $obj_vehi = new vehicles_model();
            $obj_vehi->mostrarDatos($matricula);
            $datos['dato'] = $obj_vehi;
            $this->load->view('nueva', $datos);

        } else {
            //Cargo la vista de historial con los datos del vehiculo
            $obj_vehi = new vehicles_model();
            $obj_vehi->mostrarDatos($matricula);
            $arr_datos['dato'] = $obj_vehi;
            //Cargo la vista de historial con la tabla rellena
            $obj_mostrarHistorial = new visits_model();
            $obj_mostrarHistorial->mostrarHistorial($matricula);
            $arr_datos['datos'] = $obj_mostrarHistorial->getList();
            $this->load->view('historial', $arr_datos);

        }
    }

    public function insertar() {

        $matricula = filter_input(INPUT_POST, 'matricula');
        $fecha = filter_input(INPUT_POST, 'fecha');
        $obj_insertar_visita = new visits_model();
        $obj_insertar_visita->setPlate($matricula);
        $obj_insertar_visita->setDate($fecha);
        $id = $obj_insertar_visita->insertarVisita();

        $checked = $_POST["chk"];

        $obj_insertar_visita_tarea = new visits_tasks_model();
        $obj_insertar_visita_tarea->insertarVisitaTarea($id, $checked);

    }

    public function Mostrarmodificar() {

        $id = $_GET['id'];

        

        $obj_MostrarModificar = new visits_model();
        $obj_MostrarModificar->mostrarParaModificar($id);
        $array_datos['datos'] = $obj_MostrarModificar;
        $this->load->view('modificar', $array_datos);

    }

    public function modificar() {

        $id = $_POST["id"];
        $date = $_POST["date"];
        $checked = $_POST["chk"];

        $visits = new visits_model();
        $visits->setIdVisit($id);
        $visits->setDate($date);
        $visits->modificarVisits();
        $visits->BorrarTareas();

        $visitstTask = new visits_tasks_model();
        $visitstTask->setIdVisit($id);
        $visitstTask->insertarTareas($checked);

    }

}
