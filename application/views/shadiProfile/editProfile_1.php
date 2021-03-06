<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>    


<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="<?php echo base_url(); ?>assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"  />



<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<style>
    .appointmentheader div{
        font-size: 20px;
    }
    .appointmentfooter{
        border-bottom: 2px solid #000;
    }
    .list-group-item {
        position: relative;
        display: block;
        padding: 5px 3px;
        margin-bottom: -1px;
    }
</style>

<!-- Main content -->
<section class="" ng-controller="editShadiProfileController">

    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">

        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Update Member Profile #<?php echo $profile_id; ?><small></small></h1>
        <!-- end page-header -->
        <!-- begin profile-container -->
        <div class="">
            <!-- begin profile-section -->
            <div class="profile-section">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#basicinformation" data-toggle="tab">Default Tab 1</a></li>
                    <li class=""><a href="#default-tab-2" data-toggle="tab">Default Tab 2</a></li>
                    <li class=""><a href="#default-tab-3" data-toggle="tab">Default Tab 3</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="default-tab-1">
                        <h3 class="m-t-10"><i class="fa fa-cog"></i> Lorem ipsum dolor sit amet</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor, 
                            est diam sagittis orci, a ornare nisi quam elementum tortor. Proin interdum ante porta est convallis 
                            dapibus dictum in nibh. Aenean quis massa congue metus mollis fermentum eget et tellus. 
                            Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien, nec eleifend orci eros id lectus.
                        </p>
                        <p class="text-right m-b-0">
                            <a href="javascript:;" class="btn btn-white m-r-5">Default</a>
                            <a href="javascript:;" class="btn btn-primary">Primary</a>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="default-tab-2">
                        <blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                        </blockquote>
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <p>
                            Nullam ac sapien justo. Nam augue mauris, malesuada non magna sed, feugiat blandit ligula. 
                            In tristique tincidunt purus id iaculis. Pellentesque volutpat tortor a mauris convallis, 
                            sit amet scelerisque lectus adipiscing.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="default-tab-3">
                        <p>
                            <span class="fa-stack fa-4x pull-left m-r-10">
                                <i class="fa fa-square-o fa-stack-2x"></i>
                                <i class="fa fa-twitter fa-stack-1x"></i>
                            </span>
                            Praesent tincidunt nulla ut elit vestibulum viverra. Sed placerat magna eget eros accumsan elementum. 
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam quis lobortis neque. 
                            Maecenas justo odio, bibendum fringilla quam nec, commodo rutrum quam. 
                            Donec cursus erat in lacus congue sodales. Nunc bibendum id augue sit amet placerat. 
                            Quisque et quam id felis tempus volutpat at at diam. Vivamus ac diam turpis.Sed at lacinia augue. 
                            Nulla facilisi. Fusce at erat suscipit, dapibus elit quis, luctus nulla. 
                            Quisque adipiscing dui nec orci fermentum blandit.
                            Sed at lacinia augue. Nulla facilisi. Fusce at erat suscipit, dapibus elit quis, luctus nulla. 
                            Quisque adipiscing dui nec orci fermentum blandit.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <!-- begin profile-info -->
                        <div class="profile-info" style="    font-size: 14px;">
                            <!-- begin table -->
                            <div class="table-responsive">
                                <form action="#" method="post"  enctype="multipart/form-data">
                             



                               

                                    


                                   
                                    <button type="submit" name="updatememeber" class="btn btn-primary btn-lg" value="updateProfile">Update Profile</button>


                                </form>
                            </div>
                            <!-- end table -->

                        </div>
                        <!-- end profile-info -->
                    </div>

                </div>



            </div>
            <!-- end profile-section -->
            <!-- begin profile-section -->
        </div>
    </div>
</section>


<script src="<?php echo base_url(); ?>assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<!--datepicker-->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<!--end of datepicker-->
<script>
                                                                var memberprofile = "<?php echo $profile_id; ?>";
</script>
<script src="<?php echo base_url(); ?>assets/angular/shadiController.js"></script>
<?php
$this->load->view('layout/footer');
?> 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
