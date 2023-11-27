<?php

class ObchodController extends Controller {

    /**
     * Contain <html> or <head> data
     */
    const TITLE = '';
    const DESCRIPTION = '';
    const KEY_WORDS = '';
    const LANG = '';
    const CUSTOM_PAGE_DATA = array('example_key'=>'example_value');
    /** */

    private object $model;

    public function __construct(array $_get_data, array $_post_data, array $controller_parameters) {
        parent::__construct($_get_data, $_post_data, $controller_parameters);
        $this->addPageData(self::TITLE, self::DESCRIPTION, self::KEY_WORDS, self::LANG, self::CUSTOM_PAGE_DATA);
        $this->model = new ObchodModel;

        $this->setTableData();
        $this->processData();
    }

    private function setTableData() {
        $this->setTableRows();

        switch ($this->controller_parameters[0]) {
            case CONTROLLER_PARAM_CONTACT:
                $this->setContactVariables();
                break;
            case CONTROLLER_PARAM_CONSULTATION:
                $this->setConsultationVariables();
                break;
            case CONTROLLER_PARAM_ORDERS:
                $this->setOrdersVariables();
                break;
            case CONTROLLER_PARAM_REFERENCE:
                $this->setReferenceVariables();
                break;
            case CONTROLLER_PARAM_INVOICE:
                $this->setInvoicesVariables();
                break;
            case CONTROLLER_PARAM_GOODS:
                $this->setGoodsVariables();
                break;
        }
    }

    private function setTableRows() {
        $page_number = (isset($this->data['page'])) ? $this->data['page'] : 1;
        $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]), $page_number);
    }

    private function setContactVariables() {
        $page_number = (isset($this->data['page'])) ? $this->data['page'] : 1;
        $this->addTemplateData('gdpr', $this->model->getGdprRows());
        $this->addTemplateData('gdpr_conditions', $this->model->getData(TABLE_GDPR_CONDITIONS));
        $this->addTemplateData('type_of_contact', $this->model->getData(TABLE_TYPE_OF_CONTACT));
        $this->addTemplateData('district', $this->model->getData(TABLE_DISTRICT));
        $this->addTemplateData('region', $this->model->getData(TABLE_REGION));
        $this->addTemplateData('household_type', $this->model->getData(TABLE_HOUSEHOLD_TYPE));
        $this->addTemplateData('type_of_relationship', $this->model->getData(TABLE_TYPE_OF_RELATIONSHIP));
        $this->addTemplateData('commision_partners', $this->model->getCommisionPartners());
        $this->addTemplateData('operators', $this->model->getOperators());
        $this->addTemplateData('sellers', $this->model->getSellers());
        $this->addTemplateData('num_of_pages', $this->model->getNumOfPages());
        $this->addTemplateData('current_page_number', $page_number);
        $this->addTemplateData('page_button_background', 'background-color: #009688;');
        // TODO
        // Add
        // Update
        // Delete
        // GDPR actions
        // Filter
        // Import kontaktů
    }

    private function setConsultationVariables() {

    }

    private function setOrdersVariables() {

    }

    private function setReferenceVariables() {

    }

    private function setInvoicesVariables() {

    }

    private function setGoodsVariables() {

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
                case UPDATE_GDPR:
                    $this->updateGdpr();
                    break;
            }
        }
    }

    private function addNewData(string $controller_parameter) {
        $this->model->addNewData($controller_parameter, $this->data);
        Link::redirect('obchod', $this->controller_parameters);
    }

    private function updateData(string $controller_parameter) {
        $this->model->updateData($controller_parameter, $this->data);
        Link::redirect('obchod', $this->controller_parameters);
    }

    private function deleteData(string $controller_parameter) {
        $this->model->deleteData($controller_parameter, $this->data);
        Link::redirect('obchod', $this->controller_parameters);
    }

    private function updateGdpr() {
        $this->model->updateGdpr($this->data);
        Link::redirect('obchod', $this->controller_parameters);
    }
}