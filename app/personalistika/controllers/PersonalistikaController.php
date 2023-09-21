<?php
// TODO: Zaměstnanci/ nefunkční add a update
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
    private array $relate_to = array('internal'=>array('key'=>'internal', 'name'=>'Interního zaměstnance'), 'external'=>array('key'=>'external', 'name'=>'Externího zaměstnance'), 'commision_partner'=>array('key'=>'commision_partner', 'name'=>'Provizního partnera'));
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
    }

    private function setTableRows() {
        switch ($this->controller_parameters[0]) {
            case UCHAZECI:
                $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
                break;
            case ZAMESTNANCI:
                $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
                break;
            case PLATEBNI_UDAJE:
                $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
                break;
            case PRACOVNI_SMLOUVY:
                $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
                break;
            case VYBEROVE_RIZENI:
                $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
                break;
            case PRACOVNI_POZICE:
                $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
                break;
        }
    }

    private function setKindOfCollaboration() {
        if ($this->controller_parameters[0] == ZAMESTNANCI || $this->controller_parameters[0] == UCHAZECI) {
            $this->addTemplateData('kind_of_collaboration', $this->model->getFormatedRows(TABLE_KIND_OF_COLLABORATION));
        }
    }

    private function setNationality() {
        if ($this->controller_parameters[0] == ZAMESTNANCI || $this->controller_parameters[0] == UCHAZECI) {
            $this->addTemplateData('nationality', $this->model->getFormatedRows(TABLE_NATIONALITY));
        }
    }

    private function setMartialStatus() {
        if ($this->controller_parameters[0] == ZAMESTNANCI || $this->controller_parameters[0] == UCHAZECI) {
            $this->addTemplateData('martial_status', $this->model->getFormatedRows(TABLE_MARTIAL_STATUS));
        }
    }

    private function setSex() {
        if ($this->controller_parameters[0] == ZAMESTNANCI || $this->controller_parameters[0] == UCHAZECI) {
            $this->addTemplateData('sex', $this->model->getFormatedRows(TABLE_SEX));
        }
    }

    private function setJobs() {
        if ($this->controller_parameters[0] == ZAMESTNANCI || $this->controller_parameters[0] == UCHAZECI) {
            $this->addTemplateData('jobs', $this->model->getFormatedRows(TABLE_JOB));
        }
    }

    private function setLanguages() {
        if ($this->controller_parameters[0] == ZAMESTNANCI || $this->controller_parameters[0] == UCHAZECI) {
            $this->addTemplateData('languages', $this->model->getFormatedRows(TABLE_LANGUAGE));
        }
    }

    private function setTypeOfCommissionPartners() {
        if ($this->controller_parameters[0] == ZAMESTNANCI) {
            $this->addTemplateData('type_of_comm_partners', $this->model->getFormatedRows(TABLE_TYPE_OF_COMMISSION_PARTNER));
        }
    }

    private function setAssignedOperators() {
        if ($this->controller_parameters[0] == ZAMESTNANCI) {
            $this->addTemplateData('operators', $this->model->getOperators());
        }
    }

    private function setAssignedSellers() {
        if ($this->controller_parameters[0] == ZAMESTNANCI) {
            $this->addTemplateData('sellers', $this->model->getSellers());
        }
    }

    private function setEmployees() {
        if ($this->controller_parameters[0] == PRACOVNI_SMLOUVY || $this->controller_parameters[0] == PLATEBNI_UDAJE || $this->controller_parameters[0] == PRACOVNI_SMLOUVY) {
            $this->addTemplateData('employees', $this->model->getFormatedRows(TABLE_EMPLOYEE));
        }
    }

    private function setRelateTo() {
        if ($this->controller_parameters[0] == PRACOVNI_SMLOUVY) {
            $this->addTemplateData('relate_to', $this->relate_to);
        }
    }

    private function setTypeOfEmploymentContract() {
        if ($this->controller_parameters[0] == PRACOVNI_SMLOUVY) {
            $this->addTemplateData('type_of_empl_contract', $this->model->getFormatedRows(TABLE_TYPE_OF_EMPL_CONTRACT));
        }
    }

    private function setResignationPeriod() {
        if ($this->controller_parameters[0] == PRACOVNI_SMLOUVY) {
            $this->addTemplateData('resignation_period', $this->resignation_period);
        }
    }

    private function setDepartment() {
        if ($this->controller_parameters[0] == PRACOVNI_POZICE) {
            $this->addTemplateData('departments', $this->model->getFormatedRows(TABLE_DEPARTMENT));
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
            }
        }
    }

    private function addNewData(string $controller_parameter) {
        $this->model->addNewData($controller_parameter, $this->data);
        header('Location: /personalistika/'.$controller_parameter);
    }

    private function updateData(string $controller_parameter) {
        $this->model->updateData($controller_parameter, $this->data);
        header('Location: /personalistika/'.$controller_parameter);
    }

    private function deleteData(string $controller_parameter) {
        $this->model->deleteData($controller_parameter, $this->data);
        header('Location: /personalistika/'.$controller_parameter);
    }

}