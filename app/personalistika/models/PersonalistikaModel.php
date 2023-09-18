<?php

class PersonalistikaModel extends Model {

    private array $tables = array(
        UCHAZECI => TABLE_CANDIDATE,
        ZAMESTNANCI => TABLE_EMPLOYEE,
        PLATEBNI_UDAJE => TABLE_EMPLOYEE_PAYMENT,
        PRACOVNI_SMLOUVY => TABLE_EMPLOYEE_CONTRACT,
        VYBEROVE_RIZENI => TABLE_TENDER,
        PRACOVNI_POZICE => TABLE_JOB
    );

    private array $employees = array();

    public function __construct() {
        parent::__construct();
    }

    public function getRows(string $controller_parameter, bool $sort_by_ids = false) {

        if ($controller_parameter === VYBEROVE_RIZENI) {
            return $this->getTenders($this->getTableData($this->tables[$controller_parameter]));
        }

        if ($controller_parameter === ZAMESTNANCI) {
            $this->employees = $this->sortTableRowsById($this->getTableData(TABLE_EMPLOYEE));
            return $this->employees;
        }

        if ($sort_by_ids) {
            return $this->sortTableRowsById($this->getTableData($this->tables[$controller_parameter]));
        }
        return $this->getTableData($this->tables[$controller_parameter]);
    }

    public function getFormatedRows(string $table) {
        return $this->sortTableRowsById($this->getTableData($table));
    }

    public function getOperators() {
        $result = array();
        $operators = $this->sortTableRowsById($this->getTableData(TABLE_OPERATOR));
        foreach ($operators as $operator) {
            $result[$operator['id']] = $this->employees[$operator['id']];
        }
        return $result;
    }

    public function getSellers() {
        $result = array();
        $sellers = $this->sortTableRowsById($this->getTableData(TABLE_SELLER));
        foreach ($sellers as $seller) {
            $result[$seller['id']] = $this->employees[$seller['id']];
        }
        return $result;
    }

    private function getTenders(array $tender_table_rows) {
        $result = array();
        $candidates = $this->sortTableRowsById($this->getTableData(TABLE_CANDIDATE, 'id, name, surename'));
        foreach ($tender_table_rows as $row) {
            $row['candidate_id'] = $this->formatTendersCandidatesToArray($row['candidate_id']);
            $row['candidates'] = $candidates;
            $result[$row['id']] = $row;
        }
        return $result;
    }

    public function addNewData(string $controller_parameter, array $data_to_insert) {
        if ($controller_parameter === VYBEROVE_RIZENI) {
            unset($data_to_insert['submit']);
            $data_to_insert['candidate_id'] = $this->formatTendersCandidatesToString($data_to_insert);
            return $this->insertToTable($this->tables[$controller_parameter], $data_to_insert);
        }
        unset($data_to_insert['submit']);
        return $this->insertToTable($this->tables[$controller_parameter], $data_to_insert);
    }

    public function updateData(string $controller_parameter, array $data_to_update) {
        $id = $data_to_update['id'];
        unset($data_to_update['id']);
        unset($data_to_update['submit']);
        if ($controller_parameter === VYBEROVE_RIZENI) {
            $data_to_update['candidate_id'] = $this->formatTendersCandidatesToString($data_to_update['candidate_id']);
        }
        return $this->updateTableRow($this->tables[$controller_parameter], ['id' => $id], $data_to_update);
    }

    public function deleteData(string $controller_parameter, array $data_to_delete) {
        $id = $data_to_delete['id'];
        return $this->deleteTableRow($this->tables[$controller_parameter], ['id'=>$id]);
    }


    /**
     * @return array    array('row_id' => array(row_data))
     */
    private function sortTableRowsById(array $table_rows, string $controller_parameter=null) {
        $result = array();
        foreach ($table_rows as $row) {
            $result[$row['id']] = $row;
        }
        return $result;
    }

    private function formatTendersCandidatesToArray(string $tender_candidates) {
        return explode('-', trim($tender_candidates, '-'));
    }

    private function formatTendersCandidatesToString(array $tender_candidates) {
        $result = '-';
        foreach ($tender_candidates as $candidate) {
            $result = $result.'-'.$candidate;
        }
        return $result;
    }

    
}