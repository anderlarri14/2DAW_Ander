<?php

require_once APPPATH . '/models/visits_tasks_class.php';

class visits_tasks_model extends visits_tasks_class {

    private $list;

    public function getList() {
        return $this->list;
    }





    public function insertarVisitaTarea($id,$checked){
       
$this->load->database();

        for($i = 0; $i<count($checked);$i++){
            
$sql = "CALL spInsertarVisitaTarea($id,$checked[$i])";
$this->db->query($sql);


        }
    
$this->db->close();




    }

   

    public function insertarTareas($checked){
        $this->load->database();
        foreach ($checked as $idTask) {
$sql = "CALL spInsertarTareas($this->idVisit,$idTask)";
$this->db->query($sql);

}
$this->db->close();

}
}