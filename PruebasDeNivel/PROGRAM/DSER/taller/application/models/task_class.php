<?php


class task_class extends CI_MODEL{


    protected $idTask;
    protected $taskDescr;


    /**
     * Get the value of idTask
     */ 
    public function getIdTask()
    {
        return $this->idTask;
    }

    /**
     * Set the value of idTask
     *
     * @return  self
     */ 
    public function setIdTask($idTask)
    {
        $this->idTask = $idTask;

        return $this;
    }

    /**
     * Get the value of taskDescr
     */ 
    public function getTaskDescr()
    {
        return $this->taskDescr;
    }

    /**
     * Set the value of taskDescr
     *
     * @return  self
     */ 
    public function setTaskDescr($taskDescr)
    {
        $this->taskDescr = $taskDescr;

        return $this;
    }
}