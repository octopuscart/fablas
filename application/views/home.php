<?php
$this->load->view('layout/header');
?>



<!-- Slider Area End Here -->
<div ng-controller="HomeController">

    <!-- Slider Area Start Here -->
    <div class="main-slider2">
        <div class="bend niceties preview-1">
            <div id="ensign-nivoslider-3" class="slides">
                <img src="<?php echo base_url(); ?>assets/sliders/banner1.jpg" alt="" title="#slider-direction-1" />
                <img src="<?php echo base_url(); ?>assets/sliders/banner2.jpg" alt="" title="#slider-direction-2" />

            </div>
            <div id="slider-direction-1" class="t-cn slider-direction">
                <div class="slider-content t-lfr s-tb slider-3 hideonmoile">
                    <div class="title-container s-tb-c">
                        <h2 class="title1" style='font-size: 18px;'>Over 2.5 crore people get married in India every year.
                            <br/>Your perfect match will not wait for you forever!
                        </h2>
                        <a href="#" class="btn-shop-now-fill-slider">Register Now</a>
                    </div>
                </div>
            </div>

            <div id="slider-direction-2" class="t-cn slider-direction">
                <div class="slider-content t-lfr s-tb slider-3 hideonmoile">
                    <div class="title-container s-tb-c">
                        <h2 class="title1" style="font-size: 18px;"><span style="font-size: 28px;">Millions found their perfect match here!

                            </span> <br>You too can find a life partner

                        </h2>
                        <a href="#" target="_blank" class="btn-shop-now-fill-slider">Search Now</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Slider Area End Here -->



    <div class="area">


        <div class="offer-area1 hidden-after-desk movieblockhome">

            <div class="" style="">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="brand-area-box-2" style="">
                            <div class="services1-area">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="section-title">
                                                <span class="title-bar-left"></span>
                                                <h2>New Offers</h2>
                                                <span class="title-bar-right"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                                            <div class="services-area-box bronzegradiant memberpackages" >
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img src="<?php echo base_url(); ?>assets/images/bronze.png" alt="services" class="img-responsive planimages">
                                                    </a>
                                                    <div class="media-body">
                                                        <span>90 Days</span>
                                                        <h3><a href="#">{{499|currency:"INR "}}</a></h3>
                                                        <p style="letter-spacing: initial">View upto 12 Contact</p>
                                                        <h5>90 Days support</h5>
                                                        <a href="#" class="btn-shop-now">Buy Now<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="services-area-box silvergradiant memberpackages" >
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img src="<?php echo base_url(); ?>assets/images/silver.png" alt="services" class="img-responsive planimages">
                                                    </a>
                                                    <div class="media-body">
                                                        <span>120 Days</span>
                                                        <h3><a href="#">{{999|currency:"INR "}}</a></h3>
                                                        <p style="letter-spacing: initial;">View upto 20 Contact</p>
                                                        <h5>90 Days support</h5>
                                                        <a href="#" class="btn-shop-now">Buy Now<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="services-area-box goldengradiant memberpackages" >
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img src="<?php echo base_url(); ?>assets/images/gold.png" alt="services" class="img-responsive planimages">
                                                    </a>
                                                    <div class="media-body">
                                                        <span>180 Days</span>
                                                        <h3><a href="#">{{1399|currency:"INR "}}</a></h3>
                                                        <p style="letter-spacing: initial" >View upto 30 Contact</p>
                                                        <h5>90 Days support</h5>
                                                        <a href="#" class="btn-shop-now">Buy Now<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>





    </div>
    <?php
    $this->load->view('layout/footer');
    ?>