<?php


class visits_tasks_class extends CI_MODEL{

    protected $idVisitTask;
    protected $idVisit;
    protected $idTask;

    /**
     * Get the value of idVisitTask
     */ 
    public function getIdVisitTask()
    {
        return $this->idVisitTask;
    }

    /**
     * Set the value of idVisitTask
     *
     * @return  self
     */ 
    public function setIdVisitTask($idVisitTask)
    {
        $this->idVisitTask = $idVisitTask;

        return $this;
    }

    /**
     * Get the value of idVisit
     */ 
    public function getIdVisit()
    {
        return $this->idVisit;
    }

    /**
     * Set the value of idVisit
     *
     * @return  self
     */ 
    public function setIdVisit($idVisit)
    {
        $this->idVisit = $idVisit;

        return $this;
    }

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
}