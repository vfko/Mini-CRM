<!DOCTYPE html>
<html lang="<?= $page_data['lang'] ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $page_data['description'] ?>">
    <meta name="keywords" content="<?= $page_data['key_words'] ?>">
    <title><?= $page_data['title'] ?></title>
</head>
<body>
    


<!DOCTYPE html>
<html lang="<?= $page_data['lang'] ?>">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $page_data['description'] ?>">
    <meta name="keywords" content="<?= $page_data['key_words'] ?>">
    <title><?= $page_data['title'] ?></title>
	
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="/assets/dist/img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->

      <!-- lobicard tather css -->
      <link rel="stylesheet" href="/assets/plugins/lobipanel/css/tether.min.css" />
      <!-- Bootstrap -->
      <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
       <!-- lobicard tather css -->
      <link rel="stylesheet" href="/assets/plugins/lobipanel/css/jquery-ui.min.css" />
      <!-- lobicard min css -->
      <link href="/assets/plugins/lobipanel/css/lobicard.min.css" rel="stylesheet" />
      <!-- lobicard github css -->
      <link href="/assets/plugins/lobipanel/css/github.css" rel="stylesheet" />
      <!-- Pace css -->
      <link href="/assets/plugins/pace/flash.css" rel="stylesheet" />
      <!-- Font Awesome -->
      <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Pe-icon -->
      <link href="/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" />
      <!-- Themify icons -->
      <link href="/assets/themify-icons/themify-icons.css" rel="stylesheet" />
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start page Label Plugins 
         =====================================================================-->
      <!-- Emojionearea -->
      <link href="/assets/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" />
      <!-- Monthly css -->
      <link href="/assets/plugins/monthly/monthly.css" rel="stylesheet" />
      <!-- End page Label Plugins 
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="/assets/dist/css/stylecrm.css" rel="stylesheet" />
      <!-- Theme style rtl -->
      <!--<link href="/assets/dist/css/stylecrm-rtl.css" rel="stylesheet" />-->
      <!-- End Theme Layout Style
         =====================================================================-->
</head>

<body>

      <!-- Site wrapper -->
      <div class="wrapper">
         <header class="main-header">
            <a href="/" class="logo">
               <!-- Logo -->
               <span class="logo-mini">
               <img src="/assets/dist/img/mini-logo.png" alt="">
               </span>
               <span class="logo-lg">
               <img src="/assets/dist/img/logo.png" alt="">
               </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-expand py-0">
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <!-- Sidebar toggle button-->
                  <span class="sr-only">Toggle navigation</span>
                  <span class="pe-7s-angle-left-circle"></span>
               </a>
               <!-- searchbar-->
               <a href="#search"><span class="pe-7s-search"></span></a>
               <div id="search">
                  <button type="button" class="close">×</button>
                  <form>
                     <input type="search" value="" placeholder="Search.." />
                     <button type="submit" class="btn btn-add">Search...</button>
                  </form>
               </div>
               <div class="collapse navbar-collapse navbar-custom-menu" >
                 <ul class="navbar-nav ml-auto">
                  
                  <!-- User -->
                   <li class="nav-item dropdown dropdown-user">
                     <a class="nav-link" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">



						<!-- USER IMG -->
                         <img src="/assets/dist/img/avatar5.png" class="rounded-circle" width="50" height="50" alt="user"></a>
						<!-- /USER IMG -->
                    


                     <div class="dropdown-menu drop_down">
                          <div class="menus">
                              <a class="dropdown-item" href="#"><i class="fa fa-user"></i> User Profile</a>
                              <a class="dropdown-item" href="#"><i class="fa fa-inbox"></i> Inbox</a>
                              <a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Signout</a>
                          </div>
                     </div>
                   </li>
                 </ul>
               </div>
             </nav>
            </header>
         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">

				<!-- Dashboard -->
                  <li class="active">
                     <a href="/"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
				<!-- /Dashboard -->

            <!-- Hr -->
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-users"></i>
                     <span>Personalistika</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left float-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="/zamestnanci">Zaměstnanci</a></li>
                        <li><a href="/platebni-udaje">Platební údaje</a></li>
                        <li><a href="/uchazeci">Uchazeči</a></li>
                        <li><a href="/#">Pracovní smlouvy</a></li>
                        <li><a href="/vyberove-rizeni">Výběrové řízení</a></li>
                        <li><a href="/pracovni-pozice">Pracovní pozice</a></li>
                     </ul>
                  </li>
				<!-- /Hr -->
                  
				<!-- Settings -->
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-gear"></i>
                     <span>Administrace</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left float-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="/administrace/personalistika">Personalistika</a></li>
                        <li><a href="/administrace/obchod">Obchod</a></li>
                        <li><a href="/administrace/doprava">Doprava</a></li>
                        <li><a href="/administrace/reference">Reference</a></li>
                     </ul>
                  </li>
				<!-- /Settings -->
                  
               </ul>
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="<?= (isset($page_data['header-icon'])) ? $page_data['header-icon'] : null ?>"></i>
               </div>
               <div class="header-title">
                  <h1><?= (isset($page_data['header'])) ? $page_data['header'] : null ?></h1>
                  <small><?= (isset($page_data['small-header'])) ? $page_data['small-header'] : null ?></small>
               </div>
            </section>
