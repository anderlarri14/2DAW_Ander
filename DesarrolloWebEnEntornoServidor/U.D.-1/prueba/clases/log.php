<?php
include_once "conexion.php";

class logClass {
    protected $idLog;
    protected $idCookie;
    protected $log;

    public function getIdLog() {
        return $this->idLog;
    }

    public function setIdLog($idLog) {
        $this->idLog = $idLog;
    }

    public function getIdCookie() {
        return $this->idCookie;
    }
    
    public function setIdCookie($idCookie) {
        $this->idCookie = $idCookie;
    }

    public function getLog() {
        return $this->log;
    }

    public function setLog($log) {
        $this->log = $log;
    }

    public function addLog(){
        $con = new conexion();
        $con->exec("call spAddLog($this->idCookie,'$this->log')");
        unset($con);
    }
}

class logModel{
    private $logs = [];

    public function __construct(){
        $con = new conexion();
        $result = $con->query("SELECT * FROM 'log' ");
        unset($con);

        foreach ($result as $aux) {

            $log = new imageClass();

            $log->setIdLog($aux['idLog']);
            $log->setIdCookie($aux['idCookie']);
            $log->setLog($aux['log']);

            $logs[$aux['idLog']] = $log;
        }
    }
    
    public function setListLogsForCookie(){
        
    }
    public function setListLogsForCookie()  // loads in "list" all the logs in the database for a single cookie
    {
        $this->OpenConnect();
        $sql="SELECT * FROM log WHERE log.id_cookie=$this->idCookie"; // in a stored procedure generates an error phpmyadmin BUG
       
        $result=$this->link->query($sql);
        $this->CloseConnect();
        $this->list=array();
        while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $new=new self();
            $new->setIdLog($row['idLog']);
            $new->setIdCookie($this->idCookie);
            $new->setLog($row['log']);
            array_push($this->list, $new);
            // var_dump($row);
        }
         
     }     
     function getList() {
         return $this->list;
     }
    
    public function getSearchTerm()
    {
        
    }

?>