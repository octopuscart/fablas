<?php
$this->load->view('layout/header');
?>

<!-- Inner Page Banner Area End Here -->
<!-- Login Registration Page Area Start Here -->
<div class="login-registration-page-area" >
    <div class="container">
        <div class="row">


            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"></div>
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
                    <h2 class="cart-area-title">Register</h2>
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Name *</label>
                                <input type="text" name="name" placeholder="Full Name *" required="">
                            </div>
                            <div class="col-md-12">
                                <label>Contact No. *</label>
                                <input type="tel" name="contact_no" placeholder="Contact No *" required="" min='10' max="10">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <label>Password *</label>
                                <input type="password" class="pass" name="password" placeholder="Password" required="">

                            </div>

                        </div>


                        <button name = "registration" class="btn-send-message disabled" type="submit" value="Login">Register</button>
                    </form>
                    <hr/>
                    <a class="buttonlink "  href="<?php echo site_url("Account/login"); ?>">Already have account? Login Now</a>

                </div>
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