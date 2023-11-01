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
        $this->addTemplateData('rows', $this->model->getRows($this->controller_parameters[0]));
    }

    private function setContactVariables() {

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
}