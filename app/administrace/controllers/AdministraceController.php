<?php

class AdministraceController extends Controller {

    /**
     * Contain <html> or <head> data
     */
    const TITLE = 'Somnia Bona | Administrace';
    const DESCRIPTION = '';
    const KEY_WORDS = '';
    const LANG = 'cs';
    private array $CUSTOM_PAGE_DATA = array('header'=>'Administrace', 'header-icon'=>'fa fa-cog');
    /** */

    private object|bool $model = false;
    private array $tables = array();

    public function __construct(array $_get_data, array $_post_data, array $controller_parameters) {
        parent::__construct($_get_data, $_post_data, $controller_parameters);
        $this->CUSTOM_PAGE_DATA['small-header'] = ucfirst($this->controller_parameters[0]);
        $this->addPageData(self::TITLE, self::DESCRIPTION, self::KEY_WORDS, self::LANG, $this->CUSTOM_PAGE_DATA);
        $this->model = new AdministraceModel;
        $this->setTemplateData();
        $this->processData();
    }

    private function setTemplateData() {
        $this->setTables($this->controller_parameters[0]);
        $this->addTemplateData('tables', $this->tables);
    }

    private function setPersonalistikaTables() {
        $this->tables = [
            ['table_name' => TABLE_DEPARTMENT, 'table_alias' => 'Oddělení', 'data' => $this->model->getTableData(TABLE_DEPARTMENT)],
            ['table_name' => TABLE_KIND_OF_COLLABORATION, 'table_alias' => 'Druh spolupráce', 'data' => $this->model->getTableData(TABLE_KIND_OF_COLLABORATION)],
            ['table_name' => TABLE_LANGUAGE, 'table_alias' => 'Jazyk', 'data' => $this->model->getTableData(TABLE_LANGUAGE)],
            ['table_name' => TABLE_MARTIAL_STATUS, 'table_alias' => 'Rodinný stav', 'data' => $this->model->getTableData(TABLE_MARTIAL_STATUS)],
            ['table_name' => TABLE_NATIONALITY, 'table_alias' => 'Národnost', 'data' => $this->model->getTableData(TABLE_NATIONALITY)],
            ['table_name' => TABLE_SEX, 'table_alias' => 'Pohlaví', 'data' => $this->model->getTableData(TABLE_SEX)],
            ['table_name' => TABLE_TYPE_OF_COMMISSION_PARTNER, 'table_alias' => 'Typ provizního partnera', 'data' => $this->model->getTableData(TABLE_TYPE_OF_COMMISSION_PARTNER)],
            ['table_name' => TABLE_TYPE_OF_EMPL_CONTRACT, 'table_alias' => 'Druh pracovní smlouvy', 'data' => $this->model->getTableData(TABLE_TYPE_OF_EMPL_CONTRACT)]
        ];
    }

    private function setObchodTables() {
        $this->tables = [
            ['table_name' => TABLE_CC_STATE, 'table_alias' => 'Stav CC', 'data' => $this->model->getTableData(TABLE_CC_STATE)],
            ['table_name' => TABLE_SK_STATE, 'table_alias' => 'Stav SK', 'data' => $this->model->getTableData(TABLE_SK_STATE)],
            ['table_name' => TABLE_CONSULTATION_STATE, 'table_alias' => 'Stav konzultace', 'data' => $this->model->getTableData(TABLE_CONSULTATION_STATE)],
            ['table_name' => TABLE_PLACE_OF_CONSULTATION, 'table_alias' => 'Místo konání', 'data' => $this->model->getTableData(TABLE_PLACE_OF_CONSULTATION)],
            ['table_name' => TABLE_HOUSEHOLD_TYPE, 'table_alias' => 'Typ domácnosti', 'data' => $this->model->getTableData(TABLE_HOUSEHOLD_TYPE)],
            ['table_name' => TABLE_CUSTOMER_STATUS, 'table_alias' => 'Stav zákazníka', 'data' => $this->model->getTableData(TABLE_CUSTOMER_STATUS)],
            ['table_name' => TABLE_ORDER_STATUS, 'table_alias' => 'Stav objednávky', 'data' => $this->model->getTableData(TABLE_ORDER_STATUS)],
            ['table_name' => TABLE_GDPR_CONDITIONS, 'table_alias' => 'GDPR podmínky použití', 'data' => $this->model->getTableData(TABLE_GDPR_CONDITIONS)],
            ['table_name' => TABLE_DISTRICT, 'table_alias' => 'Okres', 'data' => $this->model->getTableData(TABLE_DISTRICT)],
            ['table_name' => TABLE_REGION, 'table_alias' => 'Kraj', 'data' => $this->model->getTableData(TABLE_REGION)],
            ['table_name' => TABLE_TYPE_OF_CONTACT, 'table_alias' => 'Typ kontaktu', 'data' => $this->model->getTableData(TABLE_TYPE_OF_CONTACT)],
            ['table_name' => TABLE_TYPE_OF_RELATIONSHIP, 'table_alias' => 'Typ vztahu s doporučitelem', 'data' => $this->model->getTableData(TABLE_TYPE_OF_RELATIONSHIP)]
        ];
    }

    private function setDopravaTables() {
        $this->tables = [
            ['table_name' => TABLE_DELIVERY_METHOD, 'table_alias' => 'Způsob doručení', 'data' => $this->model->getTableData(TABLE_DELIVERY_METHOD)]
        ];
    }

    private function setReferenceTables() {
        $this->tables = [
            ['table_name' => TABLE_TYPE_OF_REFERENCE, 'table_alias' => 'Typ reference', 'data' => $this->model->getTableData(TABLE_TYPE_OF_REFERENCE)],
            ['table_name' => TABLE_METHOD_OF_RECEIVING_REF, 'table_alias' => 'Způsob přijetí reference', 'data' => $this->model->getTableData(TABLE_METHOD_OF_RECEIVING_REF)]
        ];
    }

    private function setTables(string $controller_parameter) {
        switch ($controller_parameter) {
            case CONTROLLER_PARAM_HR:
                $this->setPersonalistikaTables();
                break;
            case CONTROLLER_PARAM_TRADE:
                $this->setObchodTables();
                break;
            case CONTROLLER_PARAM_DELIVERY:
                $this->setDopravaTables();
                break;
            case CONTROLLER_PARAM_REFERENCE:
                $this->setReferenceTables();
                break;
        }
    }

    private function processData() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            switch ($this->data['submit']) {
                case ADD:
                    $this->addNewItem();
                    header('Location: /administrace/'.$this->controller_parameters[0]);
                    break;
                case UPDATE:
                    $this->updateItem();
                    header('Location: /administrace/'.$this->controller_parameters[0]);
                    break;
                case DELETE:
                    $this->deleteItem();
                    header('Location: /administrace/'.$this->controller_parameters[0]);
                    break;
            }
        }
    }

    private function addNewItem() {
        $this->model->addNewItem($this->data);
    }

    private function updateItem() {
        $this->model->updateItem($this->data);
    }

    private function deleteItem() {
        $this->model->deleteItem($this->data);
    }

}