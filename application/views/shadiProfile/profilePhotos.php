<?php
$this->load->view('layout/header');
?>    



<link href="<?php echo ADMINURL; ?>assets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" />
<link href="<?php echo ADMINURL; ?>assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />

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
    .profilemiddlesection table td, .profilemiddlesection table th{
        border-bottom: 1px solid #d9e0e7!important;
        padding:4px 0px;

    } 
    .profileimageblock{
        background-size: cover!important;
        background-position: center!important;

    }
</style>

<!-- Main content -->
<div class="inner-page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1 style="font-size: 15px;">Member Profile #<?php echo $profile_id; ?> <small></small></h1>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-blog-page-area" style="margin: 0;    padding-top: 20px;">
    <div class="container-fluid">
        <div class="row">
            <section class="" ng-controller="photosShadiProfileController">

                <!-- begin #content -->
                <div id="content" class="content">

                    <div class="profile-section">

                        <div class="row">
                            <div class="col-md-3">
                                <?php
                                $this->load->view('shadiProfile/sidebarprofile');
                                ?>
                                <?php
                                $this->load->view('shadiProfile/sidebar');
                                ?>
                            </div>

                            <div class="profile-section col-md-9 profilephotosection">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="profile-info" style="">
                                            <p>Add New Photo</p>
                                            <img src="<?php echo ADMINURL; ?>assets/emoji/user.png" id="previewImage" class="thumbnail" style="height: 200px;    display: inline-block;" />
                                            <form action="<?php echo ADMINURL . "index.php/ShadiProfile/profilePhotosFrontEnd/$profile_id" ?>" method="post" enctype="multipart/form-data">
                                                <input type='hidden' name='siteurl' value='<?php echo site_url('ShadiProfile/profilePhotos/' . $profile_id); ?>'>
                                                <div class="btn-group" role="group" aria-label="..." style="    width: 100%;">
                                                    <span class="btn btn-success col fileinput-button" style="width: 50%">
                                                        <i class="fa fa-plus"></i>
                                                        <span>Add Photo...</span>
                                                        <input type="file" name="picture" required="" onchange="loadFile(event)">
                                                    </span>
                                                    <button type="submit" name="submit" class="btn btn-warning" style="width: 50%"><i class="fa fa-upload"></i> Upload Now</button>

                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="col-md-8 profilemiddlesection">
                                        <!-- begin profile-info -->
                                        <form action="#" method="post" >
                                            <div class="panel panel-default">

                                                <div class="panel-heading">
                                                    <div class="btn-group pull-right">

                                                        <button class="btn btn-danger btn-xs" type="submit" name="reindex" value="submitindex">
                                                            Reset Index
                                                        </button>
                                                    </div>
                                                    <h2 class="panel-title">Member Photos</h2>
                                                </div>
                                                <div class="panel-body"  id="sortable">
                                                    <div class="col-md-4" ng-repeat="photo in memberData.photos">
                                                        <div class="thumbnail">
                                                            <img src="<?php echo ADMINURL; ?>assets/profile_image/default.png" class=" profileimageblock" style="background: url(<?php echo ADMINURL; ?>assets/profile_image/{{photo.image}});    width: 100%;height: auto;"/>

                                                            <div class="caption">
                                                                <p>Index:<input type="number" name="image_index[]" class="imageindex form-control" readonly="" value="{{photo.display_index}}"></p>
                                                                <input type="hidden" name="image_id[]" value="{{photo.id}}" />
                                                                <button  type="button" class="btn btn-success" ng-click="viewPhoto(photo)">View Image</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </form>
                                    </div>


                                </div>



                            </div>



                            <div class="modal fade" tabindex="-1" role="dialog" id="imagemodel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <form action="#" method="post" >
                                                <input type="hidden" name="photo_id" value="{{memberData.selected.id}}">
                                                <button type="submit" class="btn btn-success" name="profilePhoto">Set As Profile Photo</button>
                                                <button type="submit" class="btn btn-danger" name="deletePhoto">Delete Photo</button>
                                                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                                            </form>
                                        </div>
                                        <div class="modal-body profilephotosection">
                                            <div class="thumbnail">
                                                <img src="<?php echo ADMINURL; ?>assets/profile_image/{{memberData.selected.image}}"/>
                                            </div>
                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.
                                                </div>
                            <!-- end profile-section -->
                            <!-- begin profile-section -->
                        </div>
                    </div>

            </section>
        </div>
    </div>
</div>



<!--end of datepicker-->
<script>
    var memberprofile = "<?php echo $profile_id; ?>";</script>
<script src="<?php echo base_url(); ?>assets/theme2/angular/shadiController.js"></script>
<?php
$this->load->view('layout/footer');
?> 

