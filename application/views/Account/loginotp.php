<?php
$this->load->view('layout/header');
?>

<!-- Inner Page Banner Area End Here -->
<!-- Login Registration Page Area Start Here -->
<div class="login-registration-page-area"  ng-controller="varifyAccount">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <?php
                if ($mobile_no) {
                    ?>
                    <div class="login-registration-field">

                        <h2 class="cart-area-title">Login</h2>

                        <label>Your Mobile No. *</label>
                        <input type="tel" name="contact_no" placeholder="Contact No. "  readonly="" value="<?php echo $mobile_no; ?>" required=""/>


                        <h4 class="font-30 text-danger">

                            <button class="btn-send-message  varifybutton2" > <i class="fa fa-check"></i> OTP Sent</button>
                        </h4>

                        <hr/>
                        <div class="" style="display: inline-block" >
                            <form action="#" method="post">
                                <div class="input-group input-group-lg" >
                                    <input type="hidden"  name="contact_no" value="<?php echo $mobile_no; ?>" required=""/>
                                    <input type="text" class="form-control varifyinputbox" placeholder="Enter OTP" name="otp" style="    width: 130px;">
                                    <span class="input-group-btn">
                                        <button class="btn-send-message" type="submit" name="signIn"> Verify Now</button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                        <span style="text-align: center;    float: left;"><?php echo $msg; ?></span>


                    </div>
                    <?php
                } else {
                    ?>
                    <div class="login-registration-field">

                        <h2 class="cart-area-title">Login</h2>

                        <label>Your Mobile No. *</label>
                        <input type="tel" name="contact_no" placeholder="Contact No. " ng-if="varifyaccountdata.status == 0" ng-model="varifyaccountdata.mobile_no" required=""/>
                        <input type="tel" name="contact_no" placeholder="Contact No. " ng-if="varifyaccountdata.status != 0" readonly="" ng-model="varifyaccountdata.mobile_no" required=""/>


                        <h4 class="font-30 text-danger">

                            <button class="btn-send-message  varifybutton2" ng-click="sendOTP()" ng-if="varifyaccountdata.status == 0">Request OTP</button>
                            <button class="btn-send-message  varifybutton2" ng-if="varifyaccountdata.status == 1"> <i class="fa fa-spinner fa-spin"></i> Sending OTP</button>
                            <button class="btn-send-message  varifybutton2" ng-if="varifyaccountdata.status == 2"> <i class="fa fa-check"></i> OTP Sent</button>
                        </h4>

                        <span style="text-align: center;    float: left;">{{varifyaccountdata.message}}</span>

                        <hr/>
                        <div class="" style="display: inline-block" ng-if="varifyaccountdata.status == 2">
                            <form action="#" method="post">
                                <div class="input-group input-group-lg" >
                                    <input type="hidden"  name="contact_no" value="{{varifyaccountdata.mobile_no}}" required=""/>
                                    <input type="text" class="form-control varifyinputbox" placeholder="Enter OTP" name="otp" style="    width: 130px;">
                                    <span class="input-group-btn">
                                        <button class="btn-send-message" type="submit" name="submit"> Verify Now</button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                        <div class="" style="display: inline-block" ng-if="varifyaccountdata.status == 3">
                            <br/>
                            <a class="btn btn-send-message" href="<?php echo site_url("Account/login");?>">Go Back</a>
                        </div>

                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

            </div>
        </div>
    </div>
</div>
<!-- Login Registration Page Area End Here -->

<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme2/angular/accountController.js"></script>


<?php
$this->load->view('layout/footer');
?>