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
        return $this->getTableData(TABLE_EMPLOYEE, 'id,name,surename', array('job_id'=>1));
    }

    public function getOperators() {
        return $this->getTableData(TABLE_EMPLOYEE, 'id,name,surename', array('job_id'=>4));
    }

    public function getSellers() {
        return $this->getTableData(TABLE_EMPLOYEE, 'id,name,surename', array('job_id'=>3));
    }

    public function getNumOfPages() {
        $num_of_contacts = $this->getTableData(TABLE_CONTACT, 'count(*)')[0]['count(*)'];
        $num_of_pages = ceil($num_of_contacts / 20);
        return $num_of_pages;
    }

    public function addNewData(string $controller_parameter, array $data_to_insert) {
        unset($data_to_insert['submit']);
        return $this->insertToTable($this->tables[$controller_parameter], $data_to_insert);
    }

    public function updateData(string $controller_parameter, array $data_to_update) {
        if ($controller_parameter == 'GDPR') {
            return $this->updateGdpr($data_to_update);
        }
        $id = $data_to_update['id'];
        unset($data_to_update['id']);
        unset($data_to_update['submit']);
        return $this->updateTableRow($this->tables[$controller_parameter], ['id' => $id], $data_to_update);
    }

    public function deleteData(string $controller_parameter, array $data_to_delete) {
        $id = $data_to_delete['id'];
        return $this->deleteTableRow($this->tables[$controller_parameter], ['id'=>$id]);
    }

    private function updateGdpr(array $data_to_update) {

    }
}