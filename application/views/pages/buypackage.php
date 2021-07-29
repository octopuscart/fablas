<?php
$this->load->view('layout/header');
?>

<div class="inner-page-banner-area" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1>Buy Package</h1>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-blog-page-area" style="padding: 50px 0 30px;">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 ">

                <div class="row">
                    <div class="col-md-3">
                        <small>Selected Package</small>
                        <h3><?php echo $packageobj["title"]; ?></h3>
                    </div>

                    <div class="col-md-6">

                        <ul>
                            <li>Contacts: <?php echo $packageobj["contact_limit"]; ?></li>
                            <li>Support: <?php echo $packageobj["valid_days"]; ?> Days</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <small>Price</small>
                        <h3><a href="#">{{<?php echo $packageobj["price"]; ?>|currency:"INR "}}</a></h3>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-5">
                        Do you have coupon code? Enter here
                    </div>

                    <div class="col-md-4">
                        <form action="" method="post">
                            <div class="input-group">

                                <input type="text" class="form-control" placeholder="" name="coupon_code" required="">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" name="applycoupon">Apply</button>
                                </span>

                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <?php if($coupon_check){
                            
                        ?>
                        <small>Discount:0.00</small>
                        
                        <?php
                        }
                        ?>
                        <h3><a href="#">{{<?php echo $packageobj["price"]; ?>|currency:"INR "}}</a></h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">

                    </div>

                    <div class="col-md-4">

                    </div>
                    <div class="col-md-3">
                        <button name="buynow" type="submit" class="btn-send-message" value="">Buy Now</button>

                    </div>
                </div>




            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>







<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>