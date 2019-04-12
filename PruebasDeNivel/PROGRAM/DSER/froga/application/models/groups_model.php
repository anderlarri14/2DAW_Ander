<?php

require_once APPPATH . '/models/groups_class.php';

class groups_model extends groups_class {

    private $list;

    public function getList() {
        return $this->list;

    }

}
