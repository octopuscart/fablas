<?php
$this->load->view('layout/header');
?>


<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1>Contact With US</h1>
                    <ul>
                        <li><a href="#">Home</a> /</li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Contact Us Page Area Start Here -->
<div class="contact-us-page-area" style="padding: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="">
                <div class="contact-us-left" > 
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118309.70718967491!2d76.4218347454114!3d22.08100478737084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397d557bb2404a01%3A0x2e2051d5a2518e32!2sSant%20Singaji%20Mobile%20Shop!5e0!3m2!1sen!2sin!4v1615799227944!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="contact-us-right">
                    <h2 class="title-sidebar" style="margin-bottom: 10px;">Our Office</h2>
                    <ul style="    margin-bottom: 30px;">
                        <li class="con-address">
                            1, Subhash Chowk Mundi<br/>
                            Dist Khandwa,<br/>
                            MAdhya Pradesh,450112
                        </li>
                        <li class="con-envelope">info@shadimychoice.com</li>
                        <li class="con-phone">+91 9770675143</li>

                        <li class=""><i class="con-clock fa fa-clock-o"></i> <span class="timeing_opensm">Opening Hours</span><br/>
                            <span class="timeing_open">Mon - Sat</span>: 09:30 to 21:00 <br/>
                            <span class="timeing_open">Sun & Holidays</span>: Closed
                        </li>
                    </ul>

                    <ul>


                        <li class=""><i class="con-clock fa fa-whatsapp"></i> 
                            <span class="timeing_opensm">WhatsApp (24 Hours)</span><br> 
                            <b>+91 97706 75143</b>

                        </li>

                    </ul>


                </div>

            </div>
        </div>


        <hr/>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                <div class="contact-us-left">

                    <h2>Send Us Message</h2>
                    <div class="row">
                        <div class="contact-form">
                            <form id="contact-form" method="post" action="#">
                                <fieldset>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="last_name" type="text" placeholder="Last Name*" class="form-control" id="form-name" data-error="This field is required" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="first_name" type="text" placeholder="First Name*" class="form-control" id="form-email" data-error="This field is required" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="email" type="email" placeholder="Email*" class="form-control" id="form-email" data-error="Email field is required" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="contact" type="text" placeholder="Contact No." class="form-control" id="form-name" data-error="This field is required" >
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <select name="subject" placeholder="Subject" class="form-control" style="   " required="">
                                                <option>Enquiry</option>
                                                <option>Feedback</option>
                                            </select>
                                        </div>
                                    </div>




                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message*" class="textarea form-control" id="form-message" rows="8" cols="20" data-error="Message field is required" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" name="sendmessage" value="sendmessage" class="btn-send-message">Send Message</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class='form-response'></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Contact Us Page Area End Here -->






<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>