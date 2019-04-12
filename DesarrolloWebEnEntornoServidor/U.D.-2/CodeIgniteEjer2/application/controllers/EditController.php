<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class EditController extends CI_Controller{
    
    public function index(){
        $this->load->view('edit');
    }
}


