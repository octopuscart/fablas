<?php
$this->load->view('layout/header');
?>



<!-- Slider Area End Here -->
<div ng-controller="HomeController">

 
    <!-- Slider Area End Here -->
<div class="login-registration-page-area" style="">
    <div class="container">
        <div class="row">


            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">


                <div class="login-registration-field">
                
                    <h2 class="cart-area-title">Register</h2>
                    <form action="<?php echo site_url("Account/registration")?>" method="post">
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


    <div class="area">


        <div class="offer-area1 hidden-after-desk movieblockhome">
         

            <div class="" style="">
                <div class="row">
             <?php
            $this->load->view('pages/packageblock');
            ?>


                </div>
            </div>
        </div>





    </div>
    <?php
    $this->load->view('layout/footer');
    ?>