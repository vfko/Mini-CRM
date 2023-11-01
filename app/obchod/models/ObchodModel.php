<?php

class ObchodModel extends Model {


    private array $tables = array(
        CONTROLLER_PARAM_CONTACT=>TABLE_CONTACT,
        CONTROLLER_PARAM_CONSULTATION=>TABLE_CONSILTATION,
        CONTROLLER_PARAM_ORDERS=>'',
        CONTROLLER_PARAM_REFERENCE=>'',
        CONTROLLER_PARAM_INVOICE=>'',
        CONTROLLER_PARAM_GOODS=>''
    );


    public function __construct() {
        parent::__construct();
    }

    public function getRows(string $controller_parameter) {
        return $this->getTableData($this->tables[$controller_parameter]);
    }
}