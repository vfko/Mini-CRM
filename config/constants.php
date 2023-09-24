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
  * Administration URL parameters
  */
  define('PERSONALISTIKA', 'personalistika');
  define('OBCHOD', 'obchod');
  define('DOPRAVA', 'doprava');
  define('REFERENCE', 'reference');

  /**
   * Personalistika URL parameters
   */
  define('UCHAZECI', 'uchazeci');
  define('ZAMESTNANCI', 'zamestnanci');
  define('PLATEBNI_UDAJE', 'platebni-udaje');
  define('PRACOVNI_SMLOUVY', 'pracovni-smlouvy'); 
  define('VYBEROVE_RIZENI', 'vyberove-rizeni');
  define('PRACOVNI_POZICE', 'pracovni-pozice');
  
  /**
   * Form action
   */
  define('ADD', 'add');
  define('UPDATE', 'update');
  define('DELETE', 'delete');

  /**
   * Jobs ID
   */
  define('COMMISSION_PARTNER_ID', 1);
  define('SALES_MANAGER_ID', 2);
  define('SELLER_ID', 3);
  define('OPERATOR_ID', 4);
  define('CEO_ID', 5);