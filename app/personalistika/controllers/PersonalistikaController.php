<?php

class PersonalistikaController extends Controller {

    /**
     * Contain <html> or <head> data
     */
    const TITLE = '';
    const DESCRIPTION = '';
    const KEY_WORDS = '';
    const LANG = '';
    const CUSTOM_PAGE_DATA = array('example_key'=>'example_value');
    /** */

    private object|bool $model = false;
    private array $resignation_period = array(
        0=>array('days'=>0, 'name'=>'stanovena dohodou'),
        30=>array('days'=>30, 'name'=>'30 dnů'),
        60=>array('days'=>60, 'name'=>'60 dnů'),
        120=>array('days'=>120, 'name'=>'120 dnů')

    );

    public function __construct(array $_get_data, array $_post_data, array $controller_parameters) {
        parent::__construct($_get_data, $_post_data, $controller_parameters);
        $this->addPageData(self::TITLE, self::DESCRIPTION, self::KEY_WORDS, self::LANG, self::CUSTOM_PAGE_DATA);
        $this->model = new PersonalistikaModel;
        
        $this->setTableData();
        $this->processData();
    }

    private function setTableData() {
        $this->setTableRows();
        $this->setTypeOfCommissionPartners();
        $this->setAssignedOperators();
        $this->setAssignedSellers();
        $this->setEmployees();
        $this->setRelateTo();
        $this->setTypeOfEmploymentContract();
        $this->setResignationPeriod();
        $this->setLanguages();
        $this->setJobs();
        $this->setSex();
        $this->setMartialStatus();
        $this->setNationality();
        $this->setKindOfCollaboration();
        $this->setDepartment();
        $this->setEmployeeId();
        $this->setEmployeeDocuments();
        $this->setEmployee();
    }

    private function setTableRows() {
        switch ($this->controller_parameters[0]) {
            case CONTROLLER_PARAM_CANDIDATE:
                $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
                break;
            case CONTROLLER_PARAM_EMPLOYEES:
                $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
                break;
            case CONTROLLER_PARAM_EMPL_PAYMENT:
                $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
                break;
            case CONTROLLER_PARAM_EMPL_CONTRACT:
                $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
                break;
            case CONTROLLER_PARAM_TENDER:
                $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
                break;
            case CONTROLLER_PARAM_JOBS:
                $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
                break;
        }
    }

    private function setKindOfCollaboration() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_EMPLOYEES || $this->controller_parameters[0] == CONTROLLER_PARAM_CANDIDATE) {
            $this->addTemplateData('kind_of_collaboration', $this->model->getTableRows(TABLE_KIND_OF_COLLABORATION));
        }
    }

    private function setNationality() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_EMPLOYEES || $this->controller_parameters[0] == CONTROLLER_PARAM_CANDIDATE) {
            $this->addTemplateData('nationality', $this->model->getTableRows(TABLE_NATIONALITY));
        }
    }

    private function setMartialStatus() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_EMPLOYEES || $this->controller_parameters[0] == CONTROLLER_PARAM_CANDIDATE) {
            $this->addTemplateData('martial_status', $this->model->getTableRows(TABLE_MARTIAL_STATUS));
        }
    }

    private function setSex() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_EMPLOYEES || $this->controller_parameters[0] == CONTROLLER_PARAM_CANDIDATE) {
            $this->addTemplateData('sex', $this->model->getTableRows(TABLE_SEX));
        }
    }

    private function setJobs() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_EMPLOYEES || $this->controller_parameters[0] == CONTROLLER_PARAM_CANDIDATE || $this->controller_parameters[0] == CONTROLLER_PARAM_TENDER) {
            $this->addTemplateData('jobs', $this->model->getTableRows(TABLE_JOB));
        }
    }

    private function setLanguages() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_EMPLOYEES || $this->controller_parameters[0] == CONTROLLER_PARAM_CANDIDATE) {
            $this->addTemplateData('languages', $this->model->getTableRows(TABLE_LANGUAGE));
        }
    }

    private function setTypeOfCommissionPartners() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_EMPLOYEES) {
            $this->addTemplateData('type_of_comm_partners', $this->model->getTableRows(TABLE_TYPE_OF_COMMISSION_PARTNER));
        }
    }

    private function setAssignedOperators() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_EMPLOYEES) {
            $this->addTemplateData('operators', $this->model->getOperators());
        }
    }

    private function setAssignedSellers() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_EMPLOYEES) {
            $this->addTemplateData('sellers', $this->model->getSellers());
        }
    }

    private function setEmployees() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_EMPL_CONTRACT || $this->controller_parameters[0] == CONTROLLER_PARAM_EMPL_PAYMENT || $this->controller_parameters[0] == CONTROLLER_PARAM_EMPLOYEES) {
            $this->addTemplateData('employees', $this->model->getTableRows(TABLE_EMPLOYEE));
        }
    }

    private function setRelateTo() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_EMPL_CONTRACT || $this->controller_parameters[0] == CONTROLLER_PARAM_EMPLOYEES) {
            $this->addTemplateData('relate_to', $this->model->getTableRows(TABLE_RELATE_TO));
        }
    }

    private function setTypeOfEmploymentContract() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_EMPL_CONTRACT) {
            $this->addTemplateData('type_of_empl_contract', $this->model->getTableRows(TABLE_TYPE_OF_EMPL_CONTRACT));
        }
    }

    private function setResignationPeriod() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_EMPL_CONTRACT) {
            $this->addTemplateData('resignation_period', $this->resignation_period);
        }
    }

    private function setDepartment() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_JOBS || $this->controller_parameters[0] == CONTROLLER_PARAM_EMPLOYEES) {
            $this->addTemplateData('departments', $this->model->getTableRows(TABLE_DEPARTMENT));
        }
    }

    private function setEmployeeId() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_DOCUMENTS) {
            $this->addTemplateData('id', $this->data['id']);
        }
    }

    private function setEmployee() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_DOCUMENTS) {
            $this->addTemplateData('employee', $this->model->getEmployee($this->data['id']));
        }
    }

    private function setEmployeeDocuments() {
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_DOCUMENTS) {
            $this->addTemplateData('documents', $this->model->getDocuments($this->data['id']));
        }
    }

    private function processData() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            switch ($this->data['submit']) {
                case ADD:
                    $this->addNewData($this->controller_parameters[0]);
                    break;
                case UPDATE:
                    $this->updateData($this->controller_parameters[0]);
                    break;
                case DELETE:
                    $this->deleteData($this->controller_parameters[0]);
                    break;
                case UPLOAD:
                    $this->uploadData();
                    break;
                case SEND_EMAIL:
                    $this->sendDocument();
                    break;
            }
        }
    }

    private function addNewData(string $controller_parameter) {
        $this->model->addNewData($controller_parameter, $this->data);
        Link::redirect(CONTROLLER_PARAM_HR, [$controller_parameter]);
    }

    private function updateData(string $controller_parameter) {
        $this->model->updateData($controller_parameter, $this->data);
        Link::redirect(CONTROLLER_PARAM_HR, [$controller_parameter]);
    }

    private function deleteData(string $controller_parameter) {
        $this->model->deleteData($controller_parameter, $this->data);
        if ($this->controller_parameters[0] == CONTROLLER_PARAM_DOCUMENTS) {
            Link::redirect(CONTROLLER_PARAM_HR, [$controller_parameter], ['id'=>$this->data['id']]);
        }
        Link::redirect(CONTROLLER_PARAM_HR, [$controller_parameter]);
    }

    private function uploadData() {
        $this->model->uploadDocument(UPLOAD, $this->data['id']);
        Link::redirect(CONTROLLER_PARAM_HR, ['dokumenty'], ['id'=>$this->data['id']]);
    }
    
    private function sendDocument() {
        $result = $this->model->sendDocument($this->data['id'], $this->data['file_name'], $this->data['email']);
        if ($result) {
            FlashMessage::setSession(SESSION_SUCCESS, 'Email odeslán');
        } else {
            FlashMessage::setSession(SESSION_FAILURE, 'Dokument se nepodařilo odeslat');
        }
        Link::redirect(CONTROLLER_PARAM_HR, ['dokumenty'], ['id'=>$this->data['id']]);
    }

}