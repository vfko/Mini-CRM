<?php


/**
 * DB
 */
define('DB_HOST', 'database');
define('DB_NAME', 'somnia');
define('DB_USER', 'somnia');
define('DB_PASS', 'somnia159753');
define('DB_PORT', null);
define('DB_CHARSET', 'utf8');
define('DB_SOCKET', null);


/**
 * Home page
 */
define('HOME_PAGE', 'homepage'); // app name
define('HOME_PAGE_CONTROLLER', 'HomepageController');
define('HOME_PAGE_TEMPLATE', 'HomepageTemplate');

/**
 * Error page
 */
define('ERROR_PAGE', 'error-page'); // app name
define('ERROR_PAGE_CONTROLLER', 'ErrorpageController');
define('ERROR_PAGE_TEMPLATE', 'ErrorPageTemplate');

/**
 * Sesions
 */
define('SESSION_SUCCESS', 'success');
define('SESSION_FAILURE', 'failure');
define('SESSION_INFO', 'info');

/**
 * Flash messages
 */
define('FAILED_INSERT_MSG', 'Could not add item');
define('SUCCESSFUL_INSERT_MSG', 'Item added successfully');
define('FAILED_UPDATE_MSG', 'Položku se nepodařilo upravit');
define('SUCCESSFUL_UPDATE_MSG', 'Could not edit item');
define('FAILED_DELETE_MSG', 'Failed to delete item');
define('SUCCESSFUL_DELETE_MSG', 'The item has been removed');

/**
 * DB tables
 */

 include 'config/db_tables.php';

 /**
  * Administration controller parameters
  */
  define('CONTROLLER_PARAM_HR', 'personalistika');
  define('CONTROLLER_PARAM_TRADE', 'obchod');
  define('CONTROLLER_PARAM_DELIVERY', 'doprava');
  define('CONTROLLER_PARAM_REFERENCE', 'reference');

  /**
   * Personalistika controller parameters
   */
  define('CONTROLLER_PARAM_CANDIDATE', 'uchazeci');
  define('CONTROLLER_PARAM_EMPLOYEES', 'zamestnanci');
  define('CONTROLLER_PARAM_EMPL_PAYMENT', 'platebni-udaje');
  define('CONTROLLER_PARAM_EMPL_CONTRACT', 'pracovni-smlouvy'); 
  define('CONTROLLER_PARAM_TENDER', 'vyberove-rizeni');
  define('CONTROLLER_PARAM_JOBS', 'pracovni-pozice');
  define('CONTROLLER_PARAM_DOCUMENTS', 'dokumenty');

  /**
   * Obchod controller parameters
   */
  define('CONTROLLER_PARAM_CONTACT', 'kontakty');
  define('CONTROLLER_PARAM_CONSULTATION', 'konzultace');
  define('CONTROLLER_PARAM_ORDERS', 'objednavky');
  define('CONTROLLER_PARAM_INVOICE', 'vydane-faktury');
  define('CONTROLLER_PARAM_GOODS', 'skladove-polozky');
  
  /**
   * Form action
   */
  define('ADD', 'add');
  define('UPDATE', 'update');
  define('DELETE', 'delete');
  define('UPLOAD', 'upload');
  define('SEND_EMAIL', 'send_email');
  define('UPDATE_GDPR', 'update_gdpr');

  /**
   * Jobs ID
   */
  define('COMMISSION_PARTNER_ID', 1);
  define('SALES_MANAGER_ID', 2);
  define('SELLER_ID', 3);
  define('OPERATOR_ID', 4);
  define('CEO_ID', 5);