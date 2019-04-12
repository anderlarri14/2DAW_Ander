<?php

require_once APPPATH . '/models/vehicles_class.php';
require_once APPPATH . '/models/customers_class.php';

class vehicles_model extends vehicles_class {

    private $list;


    public function getList() {
        return $this->list;
    }

  


    public function mostrarvehiculos() {
        $this->load->database();
        $sql = "CALL spMostrarVehiculos()";
        $this->list = array();
        $result = $this->db->query($sql);
        foreach ($result->result() as $row) {
            $new = new self();
            $new->setPlate($row->plate);
            $new->setBrand($row->brand);
            $new->setModel($row->model);
            $new->setColor($row->color);
            $new->setObjetcustomer($row->customer);
            array_push($this->list, $new);

            $this->db->close();

        }
    }

    public function mostrarDatos($matricula){

$this->load->database();
$sql = "CALL spMostrarDatos('$matricula')";
$result = $this->db->query($sql);
foreach ($result->result() as $row) {
    $this->setPlate($row->plate);
    $this->setModel($row->model);
    $this->setBrand($row->brand);
    $this->setColor($row->color);

    $customer = new customers_class();
    $customer->setName($row->name);
    $this->setObjetcustomer($customer);
    $this->db->close();

}


    }
    

    
}
