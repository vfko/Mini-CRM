<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/config/loader.php';

// session_start();
// if (!isset($_SESSION['user_logged_in']) && $_SERVER['REQUEST_URI'] != '/login') {
// 	header('Location:/login');
// }

$page = new App($_SERVER['REQUEST_URI']);
$template = $page->getTemplate();
$page_data = $page->getPagedata();
$template_data = $page->getTemplateData();



include_once $_SERVER['DOCUMENT_ROOT'].'/page/header.php';
include_once $template;
include_once $_SERVER['DOCUMENT_ROOT'].'/page/footer.php';
?>