<?php

require_once APPPATH . '/models/visits_class.php';
require_once APPPATH . '/models/task_class.php';

class visits_model extends visits_class {

    private $list;
    private $listTask = array();

    public function getList() {
        return $this->list;
    }

     public function getListTask()
    {
        return $this->listTask;
    }

  
    public function setListTask($listTask)
    {
        $this->listTask = $listTask;

        return $this;
    }
    

    public function insertarVisita(){



$this->load->database();
$matricula = $this->getPlate();
$fecha = $this->getDate();
$sql = "CALL spInsertarVisita('$matricula','$fecha')";
$result = $this->db->query($sql);
$this->db->close();

// foreach ($result->result() as $row) {
return $result->row()->idVisit;
// }

    }



    public function mostrarHistorial($matricula){

        $this->load->database();
        $sql = "CALL spMostrarHistorial('$matricula')";
        $result = $this->db->query($sql);

        $this->list = array();
        foreach ($result->result() as $row) {
            $new = new self();
            $new->setIdVisit($row->idVisit);
            $new->setDate($row->date);
            
            $obj_task = new  task_class();
            $obj_task->setTaskDescr($row->taskDescr);
          
            $new->setListTask($obj_task);
            array_push($this->list, $new);

$this->db->close();

        }

    }


    public function mostrarParaModificar($id){
$this->load->database();
$sql = "CALL spMostrarParaModificar($id)";
$result = $this->db->query($sql);

foreach ($result->result() as $row) {
   
    $this->setIdVisit($row->idVisit);
    $this->setDate($row->date);
  
    $arr_tareas = explode(",", $row->taskDescr);


    for($i = 0; $i<count($arr_tareas); $i++){

        $task = new task_model();

        $task->setTaskDescr($arr_tareas[$i]);
        array_push($this->listTask, $task);
    }

    $this->db->close();

}


    }


 public function BorrarTareas(){
        $this->load->database();
        $sql = "CALL spBorrarTareas($this->idVisit)";
        $this->db->query($sql);
        $this->db->close();
    }

    public function modificarVisits(){
$this->load->database();
$sql = "CALL spModificarDate($this->idVisit,'$this->date')";
$this->db->query($sql);
$this->db->close();



    }
    

 
   
}
