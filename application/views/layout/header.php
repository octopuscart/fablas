<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <?php
        meta_tags();
        ?>
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/logof.png'; ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url() . 'assets/images/logof.png'; ?>" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <!-- Normalize CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/normalize.css">
        <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/main.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/bootstrap.min.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/animate.min.css">
        <!-- Font-awesome CSS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/font-awesome.min.css">
        <!-- Flaticon CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/theme2/css//font/flaticon.css">
        <!-- Owl Caousel CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/owl.theme.default.min.css">
        <!-- Main Menu CSS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/meanmenu.min.css">
        <!-- Nivo Slider CSS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/lib/custom-slider/css/nivo-slider.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/lib/custom-slider/css/preview.css" type="text/css" media="screen" />
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/select2.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/style.css">

        <!-- no slider CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/js/vendor/nouislider.min.css">

        <!--custom css style-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/custom_style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/style2.css">

        <!-- jquery-->
        <script src="<?php echo base_url(); ?>assets/theme2/js/vendor/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/jquery-ui.js"></script>
        <!-- Modernizr Js -->
        <script src="<?php echo base_url(); ?>assets/theme2/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- JavaScripts -->
        <script src="<?php echo base_url(); ?>assets/theme/js/vendors/modernizr.js"></script>

        <!--sweet alert-->
        <script src="<?php echo base_url(); ?>assets/theme2/sweetalert2/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/sweetalert2/sweetalert2.min.css">

        <!--angular js-->
        <script src="<?php echo base_url(); ?>assets/theme2/angular/angular.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>

    <?php
    $this->checklogin = $this->session->userdata('logged_in');
    ?>
    <style>
        .preloadimage{
            background: black;
            top: 28%;
            position: absolute;
            height:100px; 

            margin-left: -90px;
        }
    </style>

    <!-- Modal Dialog Box End Here-->
    <!-- Preloader Start Here -->
    <div id="preloader">
    </div>
    <!-- Preloader End Here -->
    <body ng-app="App">
        <div class="wrapper-area" ng-controller="ShopController" id="ShopController">
            <!--[if lt IE 8]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
            <!-- Add your site or application content here -->
            <!-- Header Area Start Here -->



            <script>


                var App = angular.module('App', []).config(function ($interpolateProvider, $httpProvider) {
                //$interpolateProvider.startSymbol('{$');
                //$interpolateProvider.endSymbol('$}');
                $httpProvider.defaults.headers.common = {};
                $httpProvider.defaults.headers.post = {};
                });
                var baseurl = "<?php echo site_url(); ?>";
                var adminapiurl = "<?php echo ADMINURL . "index.php/" ?>";
                var imageurlg = "<?php echo PRODUCTIMAGELINK; ?>";
                var globlecurrency = "<?php echo globle_currency; ?>";
                var avaiblecredits = 0;</script>

            <style>
                .ownmenu .dropdown.megamenu .dropdown-menu li:last-child{
                    margin-bottom: 20px;
                }

                .ownmenu .dropdown.megamenu .dropdown-menu li a{
                    line-height: 25px;
                }
                .account-wishlist ul li a {
                    font-size: 12px;
                }
            </style>


            <!-- Header Area Start Here -->
            <header>
                <!--                <div class="header-top-inner-top" style="color: white;background: red;">
                                    <div class="container">
                                        <h2 style="margin: 0;">
                                            <marquee>
                                                Due to COVID-19 we are not accepting orders online at present. We will resume soon.
                                            </marquee>
                                        </h2>
                                    </div>
                                </div>-->
                <div class="header-area-style3 " id="sticker">
                    <div class="header-top">
                        <div class="header-top-inner-top pinkgradiant">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <div class="header-contact">
                                            <ul>
                                                <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+91-9770675143">+91-9770675143</a></li>
                                                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> info@shadimychoice.com</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="account-wishlist">
                                            <ul>
<?php
if ($this->checklogin) {
    ?>
                                                    <li><a href="<?php echo site_url('Account/profile'); ?>"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                                    <li><a href="<?php echo site_url('Account/logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>

    <?php
} else {
    ?>
                                                    <li><a href="<?php echo site_url('Account/login'); ?>"><i class="fa fa-lock" aria-hidden="true"></i> Account</a></li>

                                                    <?php
                                                }
                                                ?>



                                                <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> Wishlist</a></li>
                                                <li><a href="#"><?php echo globle_currency; ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="header-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-2 hidden-xs text-center">
                                    <div class="logo-area" style="display: inline-block;">
                                        <a href="<?php echo site_url("/"); ?>" style="display: inline-block;"><img class="img-responsive" src="<?php echo site_mail_logo; ?>" alt="logo" style="height: 75px;"></a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="logo-area">
                                        <a href="<?php echo site_url("/"); ?>"><img class="img-responsive" src="<?php echo site_mail_logo; ?>" alt="logo"></a>
                                    </div>
                                    <div class="main-menu-area home2-sticky-area text-center">
                                        <nav>
                                            <ul>
                                                <li class="active"><a href="#">Home</a>

                                                </li>
                                                <li><a href="<?php echo site_url("Profile/profileList") ?>">Search Partners</a></li>
                                                <li><a href="<?php echo site_url("our-packages");?>">Order Packages</a></li>
                                                <li><a href="">Become Partner</a></li>

                                                <li><a href="<?php echo site_url("privacy-policy") ?>"">Privacy Policy</a></li>
                                                <li><a href="<?php echo site_url("terms-and-conditions") ?>">Terms & Condition</a></li>
                                                <li><a href="<?php echo site_url("contact")?>">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu Area Start Here -->
                        <div class="mobile-menu-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mobile-menu">
                                            <nav id="dropdown">
                                                <ul>
                                                    <li class="active"><a href="#">Home</a>

                                                    </li>
                                                    <li><a href="<?php echo site_url("Profile/profileList") ?>">Search Partners</a></li>
                                                    <li><a href="shop7.html">Happy Stories</a></li>
                                                    <li><a href="<?php echo site_url("our-packages");?>">Order Packages</a></li>
                                                    <li><a href="shop4.html">Become Partner</a></li>

                                                    <li><a href="#">FAQ's</a></li>
                                                    <li><a href="contact.html">Contact</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu Area End Here -->
                    </div>
                </div>
            </header>




            <!--mobile model-->



            <style>
                .wh-widget-right{
                    z-index:40000000000000!important;
                }
            </style>


