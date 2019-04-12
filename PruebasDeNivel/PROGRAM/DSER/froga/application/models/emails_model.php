<?php

require_once APPPATH . '/models/emails_class.php';

class emails_model extends emails_class {

    private $list;

    public function getList() {
        return $this->list;

    }

}
