<?php

class schoolClass
{
    protected $territorio;
    protected $dependencia;
    protected $cod_centro;
    protected $nom_centro;
    protected $direccion;
    protected $municipio;
    protected $cp;
    protected $telefono;
    protected $fax;
    protected $email;
    protected $web;
    protected $coord_x;
    protected $coord_y;
    /**
     * @return mixed
     */
    public function getTerritorio()
    {
        return $this->territorio;
    }

    /**
     * @return mixed
     */
    public function getDependencia()
    {
        return $this->dependencia;
    }

    /**
     * @return mixed
     */
    public function getCod_centro()
    {
        return $this->cod_centro;
    }

    /**
     * @return mixed
     */
    public function getNom_centro()
    {
        return $this->nom_centro;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @return mixed
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * @return mixed
     */
    public function getCoord_x()
    {
        return $this->coord_x;
    }

    /**
     * @return mixed
     */
    public function getCoord_y()
    {
        return $this->coord_y;
    }

    /**
     * @param mixed $territorio
     */
    public function setTerritorio($territorio)
    {
        $this->territorio = $territorio;
    }

    /**
     * @param mixed $dependencia
     */
    public function setDependencia($dependencia)
    {
        $this->dependencia = $dependencia;
    }

    /**
     * @param mixed $cod_centro
     */
    public function setCod_centro($cod_centro)
    {
        $this->cod_centro = $cod_centro;
    }

    /**
     * @param mixed $nom_centro
     */
    public function setNom_centro($nom_centro)
    {
        $this->nom_centro = $nom_centro;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @param mixed $municipio
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @param mixed $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $web
     */
    public function setWeb($web)
    {
        $this->web = $web;
    }

    /**
     * @param mixed $coord_x
     */
    public function setCoord_x($coord_x)
    {
        $this->coord_x = $coord_x;
    }

    /**
     * @param mixed $coord_y
     */
    public function setCoord_y($coord_y)
    {
        $this->coord_y = $coord_y;
    }

    
}

