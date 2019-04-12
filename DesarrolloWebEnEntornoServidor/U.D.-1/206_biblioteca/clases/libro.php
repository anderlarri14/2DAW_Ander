<?php
    include_once "conexion.php";

    class libro{
        private $id;
        private $titulo;
        private $autor;
        private $numPag;

        public function __construct(){

        }
        
        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
            
        }
        public function setTitulo($titulo){
            $this->titulo =$titulo;
        }
        public function getTitulo(){
            return $this->titulo;            
        }
        public function setAutor($autor){
            $this->autor = $autor;
        }
        public function getAutor(){
            return $this->autor;
            
        }
        public function setNumPag($numPag){
            $this->numPag = $numPag;
        }
        public function getNumPag(){    
            return $this->numPag;
        }

        public function insertarLibro(){
            if($this->titulo && $this->autor && $this->numPag){
                $conexion = new conexion();
                $conexion->exec("CALL spInsert('$this->titulo','$this->autor','$this->numPag')");
                unset($conexion);
            }
        }
    }
    
    class libros {
        
        private $libros = [];
        
        public function __construct(){

            $conexion = new conexion();
            $resultado = $conexion->query("CALL `spAllBooks`()");
            unset($conexion);

            foreach ($resultado as $linea) {

                $libro = new libro();

                $libro->setId($linea["id"]);
                $libro->setTitulo($linea["titulo"]);
                $libro->setAutor($linea["autor"]);
                $libro->setNumPag($linea["numPag"]);
                
                $this->libros[] = $libro;
                unset($libro);
            } 

        }
        public function mostrarDatos(){
            echo "<pre>";
            print_r($this->libros);
            echo "</pre>";
        }
        public function escribirtAtablaAutor($autor){

            
        }
        public function escribirTabla(){
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Autor</th><th>Paginas</th></tr>";
            foreach ($this->libros as $libro) {
                echo "<tr><td>". $libro->getId()."</td>";
                echo "<td>". $libro->getTitulo()."</td>";
                echo "<td>". $libro->getAutor()."</td>";
                echo "<td>". $libro->getNumPag()."</td>";
                echo "<td><a href=\"?modificar=".$libro->getId()."\">Modificar</a></td>";
                echo "<td><a href=\"eliminar\">Eliminar</a></td></tr>";
            }   
            echo "</table>";
        }




        public function escribirTablaModificar($id){
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Autor</th><th>Paginas</th></tr>";
            echo "<tr>";
            foreach ($this->libros as $libro) {
                if($id == $libro->getId()){
                    echo "<form action=\"\" method=\"post\">";
                    echo "<td>".$libro->getId()."</td>";
                    echo "<td><input type=\"text\" name=\"titulo\" value=\"".$libro->getTitulo()."\"></td>";
                    echo "<td><input type=\"text\" name=\"autor\" value=\"".$libro->getAutor()."\"></td>";
                    echo "<td><input type=\"number\" name=\"nPaginas\" value=\"". $libro->getNumPag()."\"></td>";
                    echo "<td><input type=\"submit\" value=\"Aplicar\"></td>";
                    echo "</form>";
                } else {
                    echo "<td>". $libro->getId()."</td>";
                    echo "<td>". $libro->getTitulo()."</td>";
                    echo "<td>". $libro->getAutor()."</td>";
                    echo "<td>". $libro->getNumPag()."</td>";
                    echo "<td><a href=\"?modificar=".$libro->getId()."\">Modificar</a></td>";
                    echo "<td><a href=\"eliminar\">Eliminar</a></td>";
                }
                echo "</tr>";
            }   
            echo "</table>";
        }
   

        
    }
?>