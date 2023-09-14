<?php

class HomepageController extends Controller {

    /**
     * Contain <html> or <head> data
     */
    const TITLE = 'Somnia';
    const DESCRIPTION = '';
    const KEY_WORDS = '';
    const LANG = 'cs';
    const CUSTOM_PAGE_DATA = array();
    /** */

    private object $model;

    public function __construct(array $_get_data, array $_post_data, array $controller_parameters) {
        parent::__construct($_get_data, $_post_data, $controller_parameters);
        $this->model = new HomepageModel;
        $this->addPageData(self::TITLE, self::DESCRIPTION, self::KEY_WORDS, self::LANG, self::CUSTOM_PAGE_DATA);
    }

}