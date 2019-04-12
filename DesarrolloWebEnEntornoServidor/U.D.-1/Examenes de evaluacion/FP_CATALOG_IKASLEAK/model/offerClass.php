<?php

class offerClass
{
   protected $codigo;
   protected $cod_ciclo;
   protected $cod_centro;
   protected $modelo;
   protected $turno;


/**
     * @return mixed
     */
    public function getCod_ciclo()
    {
        return $this->cod_ciclo;
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
    public function getModelo()
    {
        return $this->modelo;
    }

/**
     * @return mixed
     */
    public function getTurno()
    {
        return $this->turno;
    }



/**
     * @param mixed $cod_ciclo
     */
    public function setCod_ciclo($cod_ciclo)
    {
        $this->cod_ciclo = $cod_ciclo;
    }

/**
     * @param mixed $cod_centro
     */
    public function setCod_centro($cod_centro)
    {
        $this->cod_centro = $cod_centro;
    }

/**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

/**
     * @param mixed $turno
     */
    public function setTurno($turno)
    {
        $this->turno = $turno;
    }

   
    
}

