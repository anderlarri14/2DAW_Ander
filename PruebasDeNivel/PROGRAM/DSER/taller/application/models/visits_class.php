<?php


class visits_class extends CI_MODEL{

    protected $idVisit;
    protected $plate;
    protected $date;
    


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
     * Get the value of plate
     */ 
    public function getPlate()
    {
        return $this->plate;
    }

    /**
     * Set the value of plate
     *
     * @return  self
     */ 
    public function setPlate($plate)
    {
        $this->plate = $plate;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}