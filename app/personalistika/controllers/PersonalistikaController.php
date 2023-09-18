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

    public function __construct(array $_get_data, array $_post_data, array $controller_parameters) {
        parent::__construct($_get_data, $_post_data, $controller_parameters);
        $this->addPageData(self::TITLE, self::DESCRIPTION, self::KEY_WORDS, self::LANG, self::CUSTOM_PAGE_DATA);
        $this->model = new PersonalistikaModel;
        
        $this->setTableData();
        $this->processData();
    }

    private function setTableData() {
        $this->setTableRows();
        $this->addTemplateData('languages', $this->model->getLanguages(true));
        $this->addTemplateData('jobs', $this->model->getJobs(true));
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