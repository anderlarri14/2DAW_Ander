<?php
class userClass extends CI_Model
{
    protected $id;
    protected $nombreUsu;
    protected $contra;
    protected $nombre;
    protected $apellido;
    protected $email;

    
    function getId() {
        return $this->id;
    }

    function getNombreUsu() {
        return $this->nombreUsu;
    }

    function getContra() {
        return $this->contra;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombreUsu($nombreUsu) {
        $this->nombreUsu = $nombreUsu;
    }

    function setContra($contra) {
        $this->contra = $contra;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setEmail($email) {
        $this->email = $email;
    }


    
    
    
}

