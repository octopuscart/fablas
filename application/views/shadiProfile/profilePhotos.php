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
<div class="single-blog-page-area">
    <div class="container">
        <div class="row">
            <!-- Main content -->
            <section class="" ng-controller="photosShadiProfileController">

                <!-- begin #content -->
                <div id="content" class="content">
                    <!-- begin breadcrumb -->
                    <ol class="breadcrumb pull-right">

                    </ol>
                    <!-- end breadcrumb -->
                    <!-- begin page-header -->
                    <h1 class="page-header">Member Photos #<?php echo $profile_id; ?> <small></small></h1>
                    <!-- end page-header -->
                    <!-- begin profile-container -->
                    <div class="">
                        <div class="best-products sidebar-section-margin">
                            <div class="media">
                                <a href="#" class="pull-left">
                                    <img alt="Media Object" src="{{memberData.profile.profile_photo}}" class="img-responsive" style='height:107px'>
                                </a>
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="#">{{memberData.profile.name}}</a></h3>
                                    <p> Father:{{memberData.profile.father_name}}</p>
                                </div>
                            </div>

                        </div>


                        <ul class="media-list">
                            <li class="media media-sm">
                                <a class="media-left" href="javascript:;">
                                    <img src="{{memberData.profile.profile_photo}}" alt="" class="media-object rounded-corner" style="height: 64px;">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{memberData.profile.name}}</h4>
                                    <p>
                                        Father:{{memberData.profile.father_name}}
                                    </p>
                                    <div class="media media-sm">
                                        <a class="media-left" href="javascript:;">
                                            <img src="assets/img/user-6.jpg" alt="" class="media-object rounded-corner">
                                        </a>

                                    </div>

                                </div>
                            </li>

                        </ul>
                        <!-- begin profile-section -->
                        <div class="profile-section">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="profile-info" style="background: #fff;text-align: center;padding-top: 20px   ">
                                        <img src="<?php echo ADMINURL; ?>assets/emoji/user.png" id="previewImage" class="thumbnail" style="height: 200px;    display: inline-block;" />
                                        <form action="<?php echo ADMINURL . "index.php/ShadiProfile/profilePhotosFrontEnd/$profile_id" ?>" method="post" enctype="multipart/form-data">
                                            <input type='hidden' name='siteurl' value='<?php echo site_url('ShadiProfile/profilePhotos/' . $profile_id); ?>'>
                                            <div class="btn-group" role="group" aria-label="..." style="    width: 100%;">
                                                <span class="btn btn-success col fileinput-button" style="width: 50%">
                                                    <i class="fa fa-plus"></i>
                                                    <span>Add files...</span>
                                                    <input type="file" name="picture" required="" onchange="loadFile(event)">
                                                </span>
                                                <button type="submit" name="submit" class="btn btn-warning" style="width: 50%"><i class="fa fa-upload"></i> Upload Now</button>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="col-md-6 profilemiddlesection">
                                    <!-- begin profile-info -->
                                    <form action="#" method="post" >
                                        <div class="panel panel-inverse">

                                            <div class="panel-heading">
                                                <div class="btn-group pull-right">

                                                    <button class="btn btn-danger btn-xs" type="submit" name="reindex" value="submitindex">
                                                        Reset Index
                                                    </button>
                                                </div>
                                                <h2 class="panel-title">Member Photos</h2>
                                            </div>
                                            <div class="panel-body"  id="sortable">
                                                <div class="col-md-6" ng-repeat="photo in memberData.photos">
                                                    <div class="thumbnail">
                                                        <img src="<?php echo ADMINURL; ?>assets/profile_image/default.png" class=" profileimageblock" style="background: url(<?php echo ADMINURL; ?>assets/profile_image/{{photo.image}});    width: 100%;height: auto;"/>

                                                        <div class="caption">
                                                            <p>Index:<input type="number" name="image_index[]" class="imageindex form-control" readonly="" value="{{photo.display_index}}"></p>
                                                            <input type="hidden" name="image_id[]" value="{{photo.id}}" />
                                                            <button  type="button" ng-click="viewPhoto(photo)">View Image</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <?php
                                    $this->load->view('shadiProfile/sidebar');
                                    ?>
                                </div>

                            </div>



                        </div>
                        <!-- end profile-section -->
                        <!-- begin profile-section -->
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
                            <div class="modal-body">
                                <div class="thumbnail">
                                    <img src="<?php echo ADMINURL ?>assets/profile_image/{{memberData.selected.image}}" style='    width: 100%;height: auto;'/>
                                </div>
                            </div>

                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
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

