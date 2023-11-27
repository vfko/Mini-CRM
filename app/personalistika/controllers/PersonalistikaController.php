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

        switch ($this->controller_parameters[0]) {
            case CONTROLLER_PARAM_CANDIDATE:
                $this->setCandidateVariables();
                break;
            case CONTROLLER_PARAM_EMPLOYEES:
                $this->setEmployeesVariables();
                break;
            case CONTROLLER_PARAM_EMPL_PAYMENT:
                $this->setEmplPaymentVariables();
                break;
            case CONTROLLER_PARAM_EMPL_CONTRACT:
                $this->setEmplContractVariables();
                break;
            case CONTROLLER_PARAM_TENDER:
                $this->setTenderVariables();
                break;
            case CONTROLLER_PARAM_JOBS:
                $this->setJobsVariables();
                break;
            case CONTROLLER_PARAM_DOCUMENTS:
                $this->setDocumentVariables();
                break;
        }
    }

    private function setTableRows() {
        if ($this->controller_parameters[0] != CONTROLLER_PARAM_DOCUMENTS) {
            $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
        }
    }

    private function setCandidateVariables() {
        $this->addTemplateData('kind_of_collaboration', $this->model->getTableRows(TABLE_KIND_OF_COLLABORATION));
        $this->addTemplateData('nationality', $this->model->getTableRows(TABLE_NATIONALITY));
        $this->addTemplateData('martial_status', $this->model->getTableRows(TABLE_MARTIAL_STATUS));
        $this->addTemplateData('sex', $this->model->getTableRows(TABLE_SEX));
        $this->addTemplateData('jobs', $this->model->getTableRows(TABLE_JOB));
        $this->addTemplateData('languages', $this->model->getTableRows(TABLE_LANGUAGE));
    }

    private function setEmployeesVariables() {
        $this->addTemplateData('kind_of_collaboration', $this->model->getTableRows(TABLE_KIND_OF_COLLABORATION));
        $this->addTemplateData('nationality', $this->model->getTableRows(TABLE_NATIONALITY));
        $this->addTemplateData('martial_status', $this->model->getTableRows(TABLE_MARTIAL_STATUS));
        $this->addTemplateData('sex', $this->model->getTableRows(TABLE_SEX));
        $this->addTemplateData('jobs', $this->model->getTableRows(TABLE_JOB));
        $this->addTemplateData('languages', $this->model->getTableRows(TABLE_LANGUAGE));
        $this->addTemplateData('operators', $this->model->getOperators());
        $this->addTemplateData('sellers', $this->model->getSellers());
        $this->addTemplateData('employees', $this->model->getTableRows(TABLE_EMPLOYEE));
        $this->addTemplateData('type_of_comm_partners', $this->model->getTableRows(TABLE_TYPE_OF_COMMISSION_PARTNER));
        $this->addTemplateData('relate_to', $this->model->getTableRows(TABLE_RELATE_TO));
        $this->addTemplateData('departments', $this->model->getTableRows(TABLE_DEPARTMENT));
    }

    private function setEmplPaymentVariables() {
        $this->addTemplateData('employees', $this->model->getTableRows(TABLE_EMPLOYEE));
    }

    private function setEmplContractVariables() {
        $this->addTemplateData('employees', $this->model->getTableRows(TABLE_EMPLOYEE));
        $this->addTemplateData('relate_to', $this->model->getTableRows(TABLE_RELATE_TO));
        $this->addTemplateData('type_of_empl_contract', $this->model->getTableRows(TABLE_TYPE_OF_EMPL_CONTRACT));
        $this->addTemplateData('resignation_period', $this->resignation_period);
    }

    private function setTenderVariables() {
        $this->addTemplateData('jobs', $this->model->getTableRows(TABLE_JOB));
    }

    private function setJobsVariables() {
        $this->addTemplateData('departments', $this->model->getTableRows(TABLE_DEPARTMENT));
    }

    private function setDocumentVariables() {
        $this->addTemplateData('id', $this->data['id']);
        $this->addTemplateData('employee', $this->model->getEmployee($this->data['id']));
        $this->addTemplateData('documents', $this->model->getDocuments($this->data['id']));
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