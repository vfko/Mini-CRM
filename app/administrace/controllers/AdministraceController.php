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
        $this->setTables();
        $this->addTemplateData('tables', $this->tables);
    }

    private function setTables() {
        $this->tables = [
            ['table_name' => 'department', 'table_alias' => 'Oddělení', 'data' => $this->model->getTableData(TABLE_DEPARTMENT)],
            ['table_name' => 'kind_of_collaboration', 'table_alias' => 'Druh spolupráce', 'data' => $this->model->getTableData(TABLE_KIND_OF_COLLABORATION)],
            ['table_name' => 'language', 'table_alias' => 'Jazyk', 'data' => $this->model->getTableData(TABLE_LANGUAGE)],
            ['table_name' => 'martial_status', 'table_alias' => 'Rodinný stav', 'data' => $this->model->getTableData(TABLE_MARTIAL_STATUS)],
            ['table_name' => 'nationality', 'table_alias' => 'Národnost', 'data' => $this->model->getTableData(TABLE_NATIONALITY)],
            ['table_name' => 'sex', 'table_alias' => 'Pohlaví', 'data' => $this->model->getTableData(TABLE_SEX)],
            ['table_name' => 'type_of_commission_partner', 'table_alias' => 'Typ provizního partnera', 'data' => $this->model->getTableData(TABLE_TYPE_OF_COMMISSION_PARTNER)],
            ['table_name' => 'type_of_empl_contract', 'table_alias' => 'Druh pracovní smlouvy', 'data' => $this->model->getTableData(TABLE_TYPE_OF_EMPL_CONTRACT)]
        ];
    }


}