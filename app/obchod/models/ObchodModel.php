<?php

class ObchodModel extends Model {


    private array $tables = array(
        CONTROLLER_PARAM_CONTACT=>TABLE_CONTACT,
        CONTROLLER_PARAM_CONSULTATION=>TABLE_CONSULTATION,
        CONTROLLER_PARAM_ORDERS=>'',
        CONTROLLER_PARAM_REFERENCE=>'',
        CONTROLLER_PARAM_INVOICE=>'',
        CONTROLLER_PARAM_GOODS=>''
    );
    private array $contacts = array();


    public function __construct() {
        parent::__construct();
    }

    public function getRows(string $controller_parameter, int|null $page_number=null) {
        if ($controller_parameter == CONTROLLER_PARAM_CONTACT) {
            return $this->getContactRows($page_number);
        }
        return $this->getTableData($this->tables[$controller_parameter]);
    }

    private function getContactRows(int|null $page_number) {
        if ($page_number != null) {
            $this->contacts = $this->getPaginatedRows(TABLE_CONTACT, $page_number);
        } else {
            $this->contacts = $this->getPaginatedRows(TABLE_CONTACT, 1);
        }
        return $this->contacts;
    }

    public function getGdprRows() {
        $contacts_with_gdpr_record = array();
        foreach ($this->contacts as $contact) {
            if ($contact['gdpr_record'] == 1) {
                $contacts_with_gdpr_record[] = $contact['id'];
            }
        }
        foreach ($contacts_with_gdpr_record as $id) {
            $this->db->where('contact_id', $id, '=', 'OR');
        }
        
        $gdpr_records = $this->db->get(TABLE_GDPR);
        $result = array();

        foreach ($gdpr_records as $gdpr) {
            $result[$gdpr['contact_id']] = $gdpr;
        }

        return $result;
    }

    public function getData(string $table_name) {
        return $this->getTableData($table_name);
    }

    public function getCommisionPartners() {
        return $this->getTableData(TABLE_EMPLOYEE, '*', array('job_id'=>1));
    }

}