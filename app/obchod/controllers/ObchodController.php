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
        $this->addTemplateData('gdpr', $this->model->getGdprRows());
        $this->addTemplateData('gdpr_conditions', $this->model->getData(TABLE_GDPR_CONDITIONS));
        $this->addTemplateData('type_of_contact', $this->model->getData(TABLE_TYPE_OF_CONTACT));
        $this->addTemplateData('district', $this->model->getData(TABLE_DISTRICT));
        $this->addTemplateData('region', $this->model->getData(TABLE_REGION));
        $this->addTemplateData('household_type', $this->model->getData(TABLE_HOUSEHOLD_TYPE));
        $this->addTemplateData('type_of_relationship', $this->model->getData(TABLE_TYPE_OF_RELATIONSHIP));
        $this->addTemplateData('commision_partners', $this->model->getCommisionPartners());
        // jak vyřešit doporučitele? Ručně zadat client_id (prozatím)?
        // typ vztahu s doporučitelem +
        // okres +
        // kraj +
        // typ domácnosti +
        // provizní partner +
        // operátoři
        // obchodníci
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