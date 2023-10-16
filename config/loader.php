<?php

/**
 * Includer of classes
*/


// Config
include $_SERVER['DOCUMENT_ROOT'].'/config/constants.php';

// Router
include $_SERVER['DOCUMENT_ROOT'].'/vendor/built-in/Router.php';

// Application
include $_SERVER['DOCUMENT_ROOT'].'/vendor/built-in/App.php';

// Database
include_once $_SERVER['DOCUMENT_ROOT'].'/vendor/built-in/MysqliDb.php';

// Parent Controller
include $_SERVER['DOCUMENT_ROOT'].'/vendor/built-in/Controller.php';

// Parent Model
include $_SERVER['DOCUMENT_ROOT'].'/vendor/built-in/Model.php';

// Authenticate
include $_SERVER['DOCUMENT_ROOT'].'/vendor/built-in/Authenticate.php';

// Flash message
include $_SERVER['DOCUMENT_ROOT'].'/vendor/built-in/FlashMessage.php';

// File Controller
include $_SERVER['DOCUMENT_ROOT'].'/vendor/built-in/FileController.php';

// Link
include $_SERVER['DOCUMENT_ROOT'].'/vendor/built-in/Link.php';

// PHPMailer
include $_SERVER['DOCUMENT_ROOT'].'/vendor/PHPMailer/src/Exception.php';
include $_SERVER['DOCUMENT_ROOT'].'/vendor/PHPMailer/src/SMTP.php';
include $_SERVER['DOCUMENT_ROOT'].'/vendor/PHPMailer/src/PHPMailer.php';
include $_SERVER['DOCUMENT_ROOT'].'/vendor/Mailer.php';

// App homepage
include $_SERVER['DOCUMENT_ROOT'].'/app/homepage/controllers/HomepageController.php';
include $_SERVER['DOCUMENT_ROOT'].'/app/homepage/models/HomepageModel.php';

// App error-page
include $_SERVER['DOCUMENT_ROOT'].'/app/error-page/controllers/ErrorPageController.php';

// App Administrace
include $_SERVER['DOCUMENT_ROOT'].'/app/administrace/controllers/AdministraceController.php';
include $_SERVER['DOCUMENT_ROOT'].'/app/administrace/models/AdministraceModel.php';

// App Personalistika
include $_SERVER['DOCUMENT_ROOT'].'/app/personalistika/controllers/PersonalistikaController.php';
include $_SERVER['DOCUMENT_ROOT'].'/app/personalistika/models/PersonalistikaModel.php';
include $_SERVER['DOCUMENT_ROOT'].'/app/personalistika/models/helpers/PersonalistikaMailHelpe.php';