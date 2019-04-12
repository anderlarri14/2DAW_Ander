<?php

require_once APPPATH . '/models/contactsgroups_class.php';

class contactsgroups_model extends contactsgroups_class {

    private $list;

    public function getList() {
        return $this->list;

    }

}
