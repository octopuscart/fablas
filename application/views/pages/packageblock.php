<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">

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

                    <?php
                    $packageslist = $this->User_model->packages();
                    foreach ($packageslist as $key => $package) {
                        ?>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                            <div class="services-area-box <?php echo $package["style"];?> memberpackages" >
                                <div class="media">

                                    <div class="media-body">
                                        <span><?php echo $package["valid_days"];?> Days</span>
                                        <h3><a href="#">{{<?php echo $package["price"];?>|currency:"INR "}}</a></h3>
                                        <p style="letter-spacing: initial">View up to <?php echo $package["contact_limit"];?> Contact</p>
                                        <a href="<?php echo site_url("Account/buypackage/".$package["id"])?>" class="btn-shop-now">Buy Now<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>