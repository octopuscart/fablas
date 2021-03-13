<?php
$this->load->view('layout/header');
?>







<!-- Content -->
<div class="login-registration-page-area" >
    <div id="content" class="my-account-page-area" ng-controller="varifyAccount">

        <!-- Blog -->
        <section class="woocommerce ">
            <div class="container">

                <!-- News Post -->
                <div class="news-post">
                    <div class="row">
                        <?php
                        if ($member_profile) {
                            
                        } else {
                            ?>

                            <div class="col-md-12 checkout-form">
                                <?php
                                if ($msg) {
                                    ?>
                                    <div class="col-md-12">
                                        <div class="alert alert-warning alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i> </span></button>
                                            <i class="fa fa-exclamation-triangle fa-2x"></i><?php echo $msg; ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class=" woocommerce-MyAccount-content">
                                    <?php
                                    if ($user_details["status"] == "active") {
                                        ?>

                                        <div class="panel panel-default">
                                            <div class="panel-body text-center">
                                                <h4>
                                                    Your account is active.<br />
                                                    <hindi class="font-15">आपका अक्काउंट एक्टिव है</hindi>
                                                </h4>
                                                <h4 class="font-30 text-success">
        <?php echo $user_details["contact_no"]; ?> &nbsp;&nbsp;&nbsp;<i class="fa fa-check"></i>

                                                </h4>
                                                <a class="btn-send-message  "  href="<?php echo site_url("ShadiProfile/addBaseProfile"); ?>">Create  Profile</a>


                                                <hr />
                                                <div class="" style="display: inline-block" ng-if="varifyaccountdata.status == 2">
                                                    <form action="#" method="post">
                                                        <div class="input-group input-group-lg" style="width:250px;">
                                                            <input type="text" class="form-control" placeholder="Enter OTP" name="otp">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-warning" type="submit" name="submit"> Verify Now</button>
                                                            </span>
                                                        </div><!-- /input-group -->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                } else {
                                    ?>

                                    <div class="panel panel-default">
                                        <div class="panel-body text-center">
                                            <h4>
                                                Your account is not activate, please verify your mobile no.<br />
                                                <hindi class="font-15">आपका अक्काउंट एक्टिव नहीं है, कृपया अपना मोबाइल नंबर वेरीफाई करें।</hindi>
                                            </h4>
                                            <h4 class="font-30 text-danger">
        <?php echo $user_details["contact_no"]; ?> &nbsp;&nbsp;&nbsp;
                                                <input type="hidden" ng-model="varifyaccountdata.mobile_no" ng-init="varifyaccountdata.mobile_no = '<?php echo $user_details["contact_no"]; ?>'">
                                                <button class="btn btn-success btn-lg varifybutton" ng-click="sendOTP()" ng-if="varifyaccountdata.status == 0">Request OTP</button>
                                                <button class="btn btn-success btn-lg varifybutton" ng-if="varifyaccountdata.status == 1"> <i class="fa fa-spinner fa-spin"></i> Sending OTP</button>
                                                <button class="btn btn-success btn-lg varifybutton" ng-if="varifyaccountdata.status == 2"> <i class="fa fa-check"></i> OTP Sent</button>
                                            </h4>

                                            <hr />
                                            <div class="" style="display: inline-block" ng-if="varifyaccountdata.status == 2">
                                                <form action="#" method="post">
                                                    <div class="input-group input-group-lg" style="width:250px;">
                                                        <input type="text" class="form-control" placeholder="Enter OTP" name="otp">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-warning" type="submit" name="submit"> Verify Now</button>
                                                        </span>
                                                    </div><!-- /input-group -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>
                            <?php }
                        ?>
                    </div>



                </div>
        </section>
    </div>
    <!-- End Content -->

</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal  fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    z-index: 20000000;">
    <div class="modal-dialog modal-sm woocommerce" role="document" style="width: 300px">
        <form action="#" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel" style="font-size: 15px">Change Password</h4>
                </div>
                <div class="modal-body checkout-form ">

                    <label class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                        Old Password
                        <input type="text" name="old_password" value="" class=" woocommerce-Input woocommerce-Input--text input-text">
                    </label>

                    <label class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                        New Password
                        <input type="text" name="new_password" value="" class=" woocommerce-Input woocommerce-Input--text input-text">
                    </label>
                    <br />
                    <label class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                        Confirm Password
                        <input type="text" name="re_password" value="" class=" woocommerce-Input woocommerce-Input--text input-text">
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="change_password" class="btn btn-primary">Change Password</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="<?php echo base_url(); ?>assets/theme2/angular/accountController.js"></script>

<?php
$this->load->view('layout/footer');
?>