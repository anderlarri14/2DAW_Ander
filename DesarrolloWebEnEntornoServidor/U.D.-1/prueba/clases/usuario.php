<?php 
include_once "conexion.php";
session_start();

class usuarioClass{
    private $id;
    private $nombre;
    private $ciudad;
    private $edad;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getCiudad(){
		return $this->ciudad;
	}

	public function setCiudad($ciudad){
		$this->ciudad = $ciudad;
	}

	public function getEdad(){
		return $this->edad;
	}

	public function setEdad($edad){
		$this->edad = $edad;
    }
    public function login($name){
        $con = new conexion();
        $result = $con->query("SELECT * FROM usuarios");
        unset($con);

        foreach ($result as $aux) {
            if ($aux['nombre'] == $name) {
                $_SESSION['user']=$_POST['user'];
                header("Location: log/");
            }else {
                echo "No coincide";
            }
        }
    }
}

class usuarioModel{
    private $usuarios = [];

    public function __construct() {
        $conexion = new conexion();
        $result = $conexion->query("SELECT * FROM usuarios");

        foreach ($result as $aux) {
            $usuario = new usuarioClass();

            $usuario->setId($aux["id"]);
            $usuario->setNombre($aux["nombre"]);
            $usuario->setCiudad($aux["ciudad"]);
            $usuario->setEdad($aux["edad"]);
                
            $this->usuarios[$aux['id']] = $usuario;
            unset($usuario);
        }
    }
    public function viewUsuarios() {
        echo "<pre>";
        print_r($this->usuarios);
        echo "</pre>";
    }
    public function getUsuarios(){
        return $this->usuarios;
    }
}






?>