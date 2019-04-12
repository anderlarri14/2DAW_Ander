<?php 
include_once "conexion.php";

class usuarioClass{
    private $idUser;
    private $username;
    private $password;
    private $name;
    private $surname;
    private $email;
    private $rango;

    public function getIdUser(){
		return $this->idUser;
	}

	public function setIdUser($idUser){
		$this->idUser = $idUser;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getSurname(){
		return $this->surname;
	}

	public function setSurname($surname){
		$this->surname = $surname;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getRango(){
		return $this->rango;
	}

	public function setRango($rango){
		$this->rango = $rango;
	}
}

class usuarioModel {
    private $usuarios = [];

    public function __construct($confirmacion) {
        if ($confirmacion) {
            $conexion = new conexion();
            $resultado = $conexion->query("SELECT * FROM usuario");
            unset($conexion);

            foreach ($resultado as $aux) {
                $usuario = new usuarioClass();

                $usuario->setIdUser($aux["idUser"]);
                $usuario->setUsername($aux["username"]);
                $usuario->setPassword($aux["password"]);
                $usuario->setName($aux["name"]);
                $usuario->setSurname($aux["surname"]);
                $usuario->setEmail($aux["email"]);
                $usuario->setRango($aux["rango"]);
                
                $this->usuarios[$aux['id']] = $usuario;
                unset($usuario);
            }
        }
    }
    public function getUsuarios(){
		return $this->usuarios;
	}

	public function setUsuarios($usuarios){
		$this->usuarios = $usuarios;
	}
}


?>