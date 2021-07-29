<?php
$this->load->view('layout/header');
?>
<!-- Inner Page Banner Area Start Here -->

<!-- Inner Page Banner Area End Here -->
<!-- Login Registration Page Area Start Here -->
<div class="login-registration-page-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="login-registration-field">
                    <?php
                    if ($msg) {
                    ?>

                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i> </span></button>
                            <i class="fa fa-exclamation-triangle "></i> <?php echo $msg; ?>
                        </div>

                    <?php
                    }
                    ?>
                    <h2 class="cart-area-title">Login</h2>
                    <form method="post" action="#">
                        <label>Your Mobile No. *</label>
                        <input type="tel" name="contact_no" placeholder="Contact No. " required="" />
                        <label>Password *</label>
                        <input type="password" name="password" placeholder="Password *" required="" />
                        <button class="btn-send-message " name="signIn" type="submit" value="signIn">Login</button>

                        <a class="btn-send-message pull-right" href="<?php echo site_url("Account/loginotp?callback=".$next_link); ?>">OTP Login</a>
                    </form>
                    <hr />
                    <a class="buttonlink " href="<?php echo site_url("Account/registration?callback=".$next_link); ?>">Not have account? Register Now</a>

                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

            </div>
        </div>
    </div>
</div>
<!-- Login Registration Page Area End Here -->

<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>