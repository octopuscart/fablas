<?php
$this->load->view('layout/header');
?>
<?php
$image1 = "";
$image2 = "";
?>
<div style="opacity: 0;position: fixed;">

    {{showmodel = 1}}
</div>

<style>
    .shaadimembersummary {

        /*border: 1px solid #0ff;*/
        margin-bottom: 20px;
border-radius: 20px;
        float: left;
        width: 100%;
       
        box-shadow: 0px 0px 29px -15px #000;
    }

    .page_navigation a {
        padding: 5px 10px;
        border: 1px solid #db0000;
        margin: 5px;
        background: #f80000;
        color: white;
    }
    .page_navigation a.active_page {
        padding: 5px 10px;
        border: 1px solid #000;
        margin: 5px;
        background: #fff;
        color: black;
    }

    .shaadimembersummary img {
        height: 241px!important;
        display: inline-block;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
    }
    .memberprofileblock{
        font-size: 13px;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
    }
    .memberprofileblock p{
        margin-bottom: 0px;
    }
    .category-menu-area li{
        text-transform: capitalize!important;
        letter-spacing: normal!important;
    }
    .vertical-center {
        margin: 0;
        position: absolute;
        height: 200px;
        top: 50%;

        transform: translateY(50%);

    }

    .vertical-center button{


    }

</style>


<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">

                    <ul>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Inner Page Banner Area End Here -->
<!-- Shop Page Area Start Here -->
<div class="shop-page-area" ng-controller="ProfileListController">
    <div class="container" id="paging_container1">

        <div class="row"  >



            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-md-push-3">


                <div id="content1"  ng-if="profileProcess.state == 1" style="padding: 100px 0px;"> 

                    <!-- Tesm Text -->
                    <section class="error-page text-center pad-t-b-130">
                        <div class="container1"> 

                            <!-- Heading -->
                            <h1 style="font-size: 40px;text-align: center">Loading...</h1>
                        </div>
                    </section>

                </div>

                <div class="row inner-section-space-top"  style="padding-top: 10px;" >
                    <!-- Tab panes -->
                    <div class="tab-content" >
                        <div role="tabpanel"  class="tab-pane active clear products-container content" id="gried-view" ng-if="profileProcess.state == 2"> 


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-repeat="member in profileResults.memberslist">
                                <div class="shaadimembersummary">
                                    <div class="col-md-3 text-center" style="padding: 0px">
                                        <img class="img-responsive product_image_center" src="<?php echo base_url(); ?>assets/images/memberprofile.png" style="background:url({{member.profile_image}});    height: auto;" alt="product">

                                    </div>
                                    <div class="col-md-7">
                                        <div class="memberprofileblock">
                                            <h3><a href="#">{{member.name}}</a></h3>
                                            <div class="row" >
                                                <div class="col-md-8">
                                                    <div>
                                                        <table class="table">

                                                            <tr>
                                                                <th style="width:90px;">Age/Height</th>
                                                                <td >{{member.age}} Years, {{member.height}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Religion</th>
                                                                <td>{{member.religion}} {{member.community}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Location</th>
                                                                <td>{{member.city}} {{member.state}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Profession</th>
                                                                <td ng-if="member.profession_category">{{member.profession_category}} {{member.profession}}</td>
                                                                <td ng-if="!member.profession_category">Not Specified</td>
                                                            </tr>
                                                        </table>


                                                        <p></p>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <table class="table">

                                                        <tr>

                                                            <td >{{member.member_id}}</td>
                                                        </tr>
                                                        <tr>

                                                            <td>{{member.height}}</td>
                                                        </tr>
                                                        <tr>

                                                            <td>{{member.marital_status}}</td>
                                                        </tr>
                                                        <tr>

                                                            <td>{{member.income}}</td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 pinkgradiant border-right-20">
                                        <div class="profile-last_block">
                                            <h4>Like this profile?</h4>
                                            <button class="btn btn-link btn-lg">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-check    fa-stack-1x fa-inverse"></i>
                                                </span> 
                                            </button>
                                            <p>Connect Now</p>
                                            <a href="<?php echo site_url("Profile/profileDetails/") ?>{{member.member_id}}" class="btn btn-success">View Profile</a>

                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>

                        <div class="col-md-12" id="paging_container3" style="margin-bottom:30px;">
                            <div class="showing-info">
                                <p class="text-center"><span class="info_text ">Showing {0}-{1} of {2} results</span></p>
                            </div>
                            <div class="row products-container  content"  style="display: none;">
                                <!-- Item -->
                                <div class="col-sm-4 animated zoomIn member_counter"  ng-repeat="(k, product) in filters.member_counter">
                                </div>
                            </div>
                            <center>
                                <div class="page_navigation"></div>
                            </center>
                            <div style="clear: both"></div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-3 col-md-pull-9">

                <div class="sidebar " ng-repeat="(key, filter) in filters.filters">
                    <h2 class="title-sidebar">{{filter.title}}</h2>
                    <div class="category-menu-area sidebar-section-margin">
                        <ul>
                            <li ng-repeat="attr in filter.data">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="key[]" value="{{attr.id}}"> {{attr.title}} <span>({{attr.count}})</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div style="clear: both"></div>

        </div>



        <div id="content"  ng-if="profileProcess.state == 0"> 
            <div ng-if="checkproduct == 0">
                <!-- Tesm Text -->
                <section class="error-page text-center pad-t-b-130">
                    <div class="container "> 

                        <!-- Heading -->
                        <h1 style="font-size: 40px">No Product Found</h1>
                        <p>Profiles Will Comming Soon</p>
                        <hr class="dotted">
                        <a href="<?php echo site_url(); ?>" class="woocommerce-Button button btn-shop-now-fill">BACK TO HOME</a>
                    </div>
                </section>
            </div>
        </div>





    </div>



</div>


<script>
    var category_id = <?php echo $category; ?>;</script>
<!--angular controllers-->

<script src="<?php echo base_url(); ?>assets/theme2/js/jquery.pajinate.min.js"></script>

<script src="<?php echo base_url(); ?>assets/theme2/angular/profilelistController.js"></script>


<script>
    var searchdata = "<?php echo isset($_GET["search"]) ? ($_GET["search"] != '' ? $_GET["search"] : '0') : "0"; ?>";

    var category_id = <?php echo $category; ?>;
    var custom_id = <?php echo $category; ?>;</script>
<?php
$this->load->view('layout/footer');
?>
<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme2/js/jquery.pajinate.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

    });
</script>