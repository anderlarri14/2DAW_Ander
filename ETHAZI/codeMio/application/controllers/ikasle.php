<?php
    class ikasle extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        public function index(){
            $query = $this->db->get("stud");
            $data["todo"] = $query->result();

            $this->load->helper("url");
            $this->load->view("Stud_view",$data);

        }
        
    }
?>