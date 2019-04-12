<?php
class Confirmar_model extends CI_Model {
    private $list = [];
    public function __construct() {
        parent::__construct();
        $this->load->model("City_class");
        $this->load->model("Price_class");
        $this->load->model("Trip_class");
        $this->load->model("Destino_Class");
    }
    public function getAllConfirmar() {
        $idUser = $this->session->idUsuario;
        $result = $this->db->query("CALL spViajePorUsuario($idUser)")->result();
        $this->db->close();
        // var_dump($result);
        foreach ($result as $aux) {
            $trip = new Trip_Class();
            $trip->setDate($aux->date);

            $cityOrigen = new City_class();
            $cityOrigen->setOrigin($aux->origin);
            $trip->setOrigin($cityOrigen);
            unset($cityOrigen);
            
            $cityDestino = new Destino_class();
            $cityDestino->setDestination($aux->destination);
            $trip->setDestination($cityDestino);
            unset($cityDestino);
            
            $price = new Price_class();
            $price->setPrice($aux->price);
            $trip->setPrice($price);
            unset($price);

            // var_dump($trip);
            array_push($this->list, $trip);
            unset($trip);
            
        }
        // var_dump($this->list);
        return $this->list;

    }
    
}
?>