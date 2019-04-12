<?php

class cycleClass
{
    protected $cod_ciclo;
    protected $cod_familia;
    protected $tipo;
    protected $nom_ciclo_es;
    protected $nom_ciclo_eu;
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
    public function getCod_familia()
    {
        return $this->cod_familia;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @return mixed
     */
    public function getNom_ciclo_es()
    {
        return $this->nom_ciclo_es;
    }

    /**
     * @return mixed
     */
    public function getNom_ciclo_eu()
    {
        return $this->nom_ciclo_eu;
    }

    /**
     * @param mixed $cod_ciclo
     */
    public function setCod_ciclo($cod_ciclo)
    {
        $this->cod_ciclo = $cod_ciclo;
    }

    /**
     * @param mixed $cod_familia
     */
    public function setCod_familia($cod_familia)
    {
        $this->cod_familia = $cod_familia;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @param mixed $nom_ciclo_es
     */
    public function setNom_ciclo_es($nom_ciclo_es)
    {
        $this->nom_ciclo_es = $nom_ciclo_es;
    }

    /**
     * @param mixed $nom_ciclo_eu
     */
    public function setNom_ciclo_eu($nom_ciclo_eu)
    {
        $this->nom_ciclo_eu = $nom_ciclo_eu;
    }

    
}

