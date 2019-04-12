<?php

include("connect_data.php");

class ikasleModel extends ikasleClass {

    private $link;
    private $usuario;

    function getList() {
        return $this->list;
    }
    function getListJSON() {
    return $this->listaNueva;
}


    public function OpenConnect() {
        $konDat = new connect_data();
        try {
            $this->link = new mysqli($konDat->host, $konDat->userbbdd, $konDat->passbbdd, $konDat->ddbbname);
            // mysqli klaseko link objetua sortzen da dagokion konexio datuekin
            // se crea un nuevo objeto llamado link de la clase mysqli con los datos de conexión. 
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta 
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }

    public function CloseConnect() {
        mysqli_close($this->link);
    }

    public function monstraralumnos() {
        $this->OpenConnect();
        $sql = "CALL sp_mostrar_ikasleak()";
        $this->list = array();
        $this->listaNueva = array();

        $result = $this->link->query($sql);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $new = new self();
            $new->setId($row['id']);
            $new->setNombre($row['Nombre']);
            $new->setEdad($row['Edad']);
            $new->setCurso($row['Curso']);
            array_push($this->list, $new);
            array_push($this->listaNueva, $row);

        }
        mysqli_free_result($result);
        $this->CloseConnect();
//        return $this->usuario;
    }

    public function insertar_ikasle() {
         $this->OpenConnect();
          $nombre = "'" . $this->getNombre(). "'";
        $edad = $this->getEdad();
        $curso = $this->getCurso();
        $consulta = $this->link->query("CALL sp_insertar_ikasle($nombre, $edad, $curso)");
       
      $this->CloseConnect();
    }
//
    public function borrar_ikasle() {
         $this->OpenConnect();
         $id=$this->getId();
        $consulta = $this->link->query("CALL sp_borrar_ikasle($id)");
         $this->CloseConnect();
    }

    public function modificar_ikasle() {
        $this->OpenConnect();
        $id = $this->getId();
        $nombre = "'" . $this->getNombre(). "'";
        $edad = $this->getEdad();
        $curso = $this->getCurso();
        $consulta = $this->link->query("CALL sp_modificar_ikasle($id, $nombre, $edad, $curso)");
        $this->CloseConnect();
    }

//
//    public function id_azken_ikaslea() {
//        $sql = "CALL sp_azkenId_ikasleak()";
//        $consulta = $this->link->query($sql);
//        while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
//            $this->id[] = $row;
//        }
//        $consulta->free_result();
//        $this->link->close();
//        return $this->id;
//    }
//
//    public function insertar_matricula($idAzkena, $modulo) {
//        $consulta = $this->link->query("CALL sp_insertar_matricula('$idAzkena', '$modulo')");
//    }
}

?>
