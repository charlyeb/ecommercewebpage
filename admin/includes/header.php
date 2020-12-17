<?php
session_start();
$php_self = explode('/',$_SERVER['PHP_SELF']);
$ac_class = end($php_self);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">
    <title><?= isset($title)?$title:'' ?></title>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--dynamic table-->
    <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>

<body>

<section id="container" class="">
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <i class="fa fa-bars"></i>
        </div>
        <!--logo start-->
        <a href="index.html" class="logo">Eagle<span>Drones</span></a>
        <!--logo end-->
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li class="sb-toggle-right">
                    <i onclick="window.location.href='logout.php'" class="fa  fa-power-off"></i>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <li class="">
                    <a class="<?= $ac_class=='index.php'?'active':'' ?>" href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Orders</span>
                    </a>
                </li>

                <!--multi level menu start-->
                <li class="sub-menu">
                    <a class="<?= $ac_class=='add-product.php'?'active':'' ?><?= $ac_class=='view-product.php'?'active':'' ?>" href="javascript:;" >
                        <i class="fa fa-sitemap"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub">
                        <li class="<?= $ac_class=='add-product.php'?'active':'' ?>"><a href="add-product.php">Add Product</a></li>
                        <li class="<?= $ac_class=='view-product.php'?'active':'' ?>"><a href="view-product.php">View Products</a></li>
                    </ul>
                </li>
                <!--multi level menu end-->

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>