<?php require_once '../vendor/autoload.php';
  use  App\Classes\Session;
  $session  = new Session;
  $session->check();

 ?>
<!doctype html>
<html lang="en" class="fixed left-sidebar-top">
  <head>
    <!-- =========================================================
                        meta tag
    ========================================================== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="This is Library Management Project">
    <meta name="author" content="Md. Banjir Ahammad(https://www.banjir-ahammad.com)">
    <meta name="keywords" content="Banjir, banjir, Banjir Ahammad, benajir, web designer, web developer, freelancer">


    <!-- =========================================================
                         page title
    ========================================================== -->
    <title><?= ucwords(basename($_SERVER['PHP_SELF'],'.php')); ?> || Corpboot</title>

    <!-- =========================================================
                          faveicon
    ========================================================== -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="images/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">


    <!--load progress bar-->
    <script src="assets/vendor/pace/pace.min.js"></script>
    <link href="assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->

    <!--Notification msj-->
    <link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css">

    <!--Select with searching & tagging-->
    <link rel="stylesheet" href="assets/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/vendor/select2/css/select2-bootstrap.min.css">


    <!--dataTable-->
    <link rel="stylesheet" href="assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">

    <!-- datepicker css file -->
    <link rel="stylesheet" href="assets/vendor/bootstrap_date-picker/css/bootstrap-datepicker3.min.css">

    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/stylesheets/css/style.css">
    <link rel="stylesheet" href="assets/stylesheets/css/custom.css">


  </head>

  <body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header p4">
                <div class="logo">
                    <a href="index.php" class="on-click">
                        <img alt="logo" src="img/logo.png">
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--NOCITE HEADERBOX-->

                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="img/avatar.jpg" />
                        </div>
                        <div class="user-info">
                            <span class="user-name"><?= ucwords(Session::get('username'));   ?></span>
                            <span class="user-profile">Admin</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href=""><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>

                                <li> <a href="logout.php" onclick="return confirm('Are You Sure to Logout Your Account')"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout" onclick="return confirm('Are You Sure to Logout Your Account')"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>

                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="<?= basename($_SERVER['PHP_SELF'])=='dashbord.php'?'active-item':'' ?>"><a href="dashbord.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <li class="has-child-item close-item <?= basename($_SERVER['PHP_SELF'])=='allslider.php'?'open-item':'' ?> <?= basename($_SERVER['PHP_SELF'])=='menu.php'?'open-item':'' ?> <?= basename($_SERVER['PHP_SELF'])=='addslider.php'?'open-item':'' ?>">
                                    <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Front-End Part</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class="<?= basename($_SERVER['PHP_SELF'])=='menu.php'?'active-item':'' ?>"><a href="menu.php">menus</a></li>
                                        <li class="has-child-item close-item <?= basename($_SERVER['PHP_SELF'])=='allslider.php'?'open-item':'' ?> <?= basename($_SERVER['PHP_SELF'])=='addslider.php'?'open-item':'' ?>">
                                            <a>Slider</a>
                                            <ul class="nav child-nav level-2 ">
                                                <li class="<?= basename($_SERVER['PHP_SELF'])=='allslider.php'?'active-item':'' ?>"><a href="allslider.php">All Sliders</a></li>
                                                <li class="<?= basename($_SERVER['PHP_SELF'])=='addslider.php'?'active-item':'' ?>"><a href="addslider.php">Add Slider</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="ui-elements_animations-appear.html">Animations</a></li>
                                        <li><a href="ui-elements_badges-tags.html">Badge & Tags</a></li>
                                    </ul>
                                </li>
                                <li class="has-child-item close-item ">
                                    <a><i class="fa fa-book" aria-hidden="true"></i><span>Slider</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class=""><a href="">Add Slider</a></li>
                                        <li class=""><a href="">Manage Slider</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="#"><i class="fa fa-users" aria-hidden="true"></i><span>students</span></a></li>
                                <!--Books-->
                                <!-- <li class="has-child-item close-item open-item">
                                    <a><i class="fa fa-book" aria-hidden="true"></i><span>Books</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class="active-item"><a href="">Add Books</a></li>
                                        <li class=""><a href="">Manage Books</a></li>
                                    </ul>
                                </li> -->
                                <li class="has-child-item close-item ">
                                    <a><i class="fa fa-book" aria-hidden="true"></i><span>Books</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class=""><a href="">Add Books</a></li>
                                        <li class=""><a href="">Manage Books</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href=""><i class="fa fa-book" aria-hidden="true"></i><span>Issue Book</span></a></li>
                                <li class=""><a href=""><i class="fa fa-book" aria-hidden="true"></i><span>Return Book</span></a></li>
                                <!--PAGES-->

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
