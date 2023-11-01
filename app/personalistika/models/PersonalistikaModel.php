<?php

use PHPMailer\PHPMailer\PHPMailer;

class PersonalistikaModel extends Model {

    private array $tables = array(
        CONTROLLER_PARAM_CANDIDATE => TABLE_CANDIDATE,
        CONTROLLER_PARAM_EMPLOYEES => TABLE_EMPLOYEE,
        CONTROLLER_PARAM_EMPL_PAYMENT => TABLE_EMPLOYEE_PAYMENT,
        CONTROLLER_PARAM_EMPL_CONTRACT => TABLE_EMPLOYMENT_CONTRACT,
        CONTROLLER_PARAM_TENDER => TABLE_TENDER,
        CONTROLLER_PARAM_JOBS => TABLE_JOB
    );

    private array $employees = array();

    public function __construct() {
        parent::__construct();
    }

    public function getRows(string $controller_parameter) {

        if ($controller_parameter === CONTROLLER_PARAM_TENDER) {
            return $this->getTenders($this->getTableData($this->tables[$controller_parameter]));
        }

        if ($controller_parameter === CONTROLLER_PARAM_EMPLOYEES) {
            $this->employees = $this->getTableData(TABLE_EMPLOYEE);
            return $this->employees;
        }

        return $this->getTableData($this->tables[$controller_parameter]);
    }

    public function getTableRows(string $table) {
        return $this->getTableData($table);
    }

    public function getOperators() {
        $result = array();
        foreach ($this->employees as $employee) {
            if ($employee['job_id'] == OPERATOR_ID) {
                $result[$employee['id']] = $employee;
            }
        }
        return $result;
    }

    public function getSellers() {
        $result = array();
        foreach ($this->employees as $employee) {
            if ($employee['job_id'] == SELLER_ID || $employee['job_id'] == SALES_MANAGER_ID) {
                $result[$employee['id']] = $employee;
            }
        }
        return $result;
    }

    private function getTenders(array $tender_table_rows) {
        $result = array();
        $candidates = $this->getTableData(TABLE_CANDIDATE, 'id, name, surename');
        foreach ($tender_table_rows as $row) {
            $row['candidate_id'] = $this->formatTendersCandidatesToArray($row['candidate_id']);
            $row['candidates'] = $candidates;
            $result[$row['id']] = $row;
        }
        return $result;
    }

    public function getEmployee(string|int $id) {
        return $this->getTableData(TABLE_EMPLOYEE, 'id,name,surename,work_email', ['id'=>$id]);
    }

    public function getDocuments(string|int $id) {
        $path = $_SERVER['DOCUMENT_ROOT'].'/files/documents/'.$id;
        if (is_dir($path)) {
            $files = scandir($path);
            unset($files[array_search('.', $files)]);
            unset($files[array_search('..', $files)]);
            return $files;
        }
        return array();
    }

    public function addNewData(string $controller_parameter, array $data_to_insert) {
        if ($controller_parameter == CONTROLLER_PARAM_EMPLOYEES) {
            return $this->addEmployee($data_to_insert);
        }

        if ($controller_parameter === CONTROLLER_PARAM_TENDER) {
            return $this->addTender($data_to_insert);
        }
        unset($data_to_insert['submit']);
        return $this->insertToTable($this->tables[$controller_parameter], $data_to_insert);
    }

    private function addEmployee(array $data_to_insert) {
        unset($data_to_insert['submit']);
        $this->insertToTable(TABLE_EMPLOYEE, $data_to_insert);
        $employee_id = $this->db->getInsertId();
        $this->insertToTable(TABLE_SELLER, array('employee_id'=>$employee_id));
        return $this->insertToTable(TABLE_EMPLOYEE_PAYMENT, array('employee_id'=>$employee_id));
    }

    private function addTender(array $data_to_insert) {
        unset($data_to_insert['submit']);
        $data_to_insert['candidate_id'] = $this->formatTendersCandidatesToString($data_to_insert);
        return $this->insertToTable(TABLE_TENDER, $data_to_insert);
    }

    public function updateData(string $controller_parameter, array $data_to_update) {
        $id = $data_to_update['id'];
        unset($data_to_update['id']);
        unset($data_to_update['submit']);
        if ($controller_parameter === CONTROLLER_PARAM_TENDER) {
            $data_to_update['candidate_id'] = $this->formatTendersCandidatesToString($data_to_update['candidate_id']);
        }
        return $this->updateTableRow($this->tables[$controller_parameter], ['id' => $id], $data_to_update);
    }

    public function deleteData(string $controller_parameter, array $data_to_delete) {
        if ($controller_parameter == CONTROLLER_PARAM_EMPLOYEES) {
            return $this->deleteEmployee($data_to_delete);
        }
        if ($controller_parameter == CONTROLLER_PARAM_JOBS) {
            return $this->deleteJob($data_to_delete);
        }
        if ($controller_parameter == CONTROLLER_PARAM_DOCUMENTS) {
            return $this->deleteDocument($data_to_delete);
        }
        $id = $data_to_delete['id'];
        return $this->deleteTableRow($this->tables[$controller_parameter], ['id'=>$id]);
    }

    private function deleteEmployee(array $data_to_delete) {
        $id = $data_to_delete['id'];
        $employee_contract = $this->getTableData(TABLE_EMPLOYMENT_CONTRACT, 'id', array('employee_id'=>$id));
        if ($employee_contract) {
            FlashMessage::setSession(SESSION_FAILURE, 'Odstraňte nejprve pracovní smlouvu zaměstnance.');
            Link::redirect('personalistika', array('zamestnanci'));
            exit();
        }
        $this->deleteTableRow(TABLE_EMPLOYEE, ['id'=>$id]);
        return $this->deleteTableRow(TABLE_EMPLOYEE_PAYMENT, ['employee_id'=>$id]);
    }

    private function deleteJob(array $data_to_delete) {
        $id = $data_to_delete['id'];
        $this->updateTableRow(TABLE_EMPLOYEE, array('job_id'=>$id), array('job_id'=>NULL));
        $this->updateTableRow(TABLE_TENDER, array('job_id'=>$id), array('job_id'=>NULL));
        $this->updateTableRow(TABLE_CANDIDATE, array('job_id'=>$id), array('job_id'=>NULL));
        return $this->deleteTableRow(TABLE_JOB, array('id'=>$id));
    }

    private function deleteDocument(array $data_to_delete) {
        $id = $data_to_delete['id'];
        $file_name = $data_to_delete['file_name'];
        $path = $_SERVER['DOCUMENT_ROOT'].'/files/documents/'.$id.'/'.$file_name;
        return unlink($path);
    }

    private function formatTendersCandidatesToArray(string $tender_candidates): array {
        return explode('-', trim($tender_candidates, '-'));
    }

    private function formatTendersCandidatesToString(array $tender_candidates): string {
        $result = '-';
        foreach ($tender_candidates as $candidate) {
            $result = $result.'-'.$candidate;
        }
        return $result;
    }

    public function uploadDocument(string $input_name_param, int|string $id) {
        $upload_path = $this->createDocumentDirectory($id);
        FileController::uploadFile($input_name_param, $upload_path);
    }

    private function createDocumentDirectory(string|int $id) {
        if (!is_dir($_SERVER['DOCUMENT_ROOT'].'/files/documents/'.$id)) {
            mkdir($_SERVER['DOCUMENT_ROOT'].'/files/documents/'.$id);
            return '/files/documents/'.$id;
        } else {
            return '/files/documents/'.$id;
        }
    }

    public function sendDocument(string|int $id, string $file_name, string $email) {
        if ($this->checkIfFileExist($file_name, $id)) {
            return PersonalistikaMailHelpe::sendDocument($email, $file_name, $id);
        }
        return false;
    }

    private function checkIfFileExist(string $file_name, string|int $id) {
        return file_exists($_SERVER['DOCUMENT_ROOT'].'/files/documents/'.$id.'/'.$file_name);
    }
    
}