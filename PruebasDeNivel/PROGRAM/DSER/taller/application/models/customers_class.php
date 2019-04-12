<?php


class customers_class extends CI_MODEL{


    protected $idCustomers;
    protected $name;
    protected $surname;
    protected $telephone;


    /**
     * Get the value of idCustomers
     */ 
    public function getIdCustomers()
    {
        return $this->idCustomers;
    }

    /**
     * Set the value of idCustomers
     *
     * @return  self
     */ 
    public function setIdCustomers($idCustomers)
    {
        $this->idCustomers = $idCustomers;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of surname
     */ 
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */ 
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get the value of telephone
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }
}
