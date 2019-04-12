<?php

require_once APPPATH . '/models/customers_class.php';

class customers_model extends customers_class {

    private $list;
 
    public function getList()
    {
        return $this->list;
    }
}