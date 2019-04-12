<?php

require_once APPPATH . '/models/task_class.php';

class task_model extends task_class {

    private $list;

    public function getList() {
        return $this->list;
    }

public function mostrarTareas() {
        $this->load->database();
        $sql = "CALL spMostrarTareas()";
        $this->list = array();
        $result = $this->db->query($sql);
        foreach ($result->result() as $row) {
            $new = new self();
            $new->setIdTask($row->idTask);
            $new->setTaskDescr($row->taskDescr);
            array_push($this->list, $new);

            $this->db->close();

        }
    }

}
