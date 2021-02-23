<?php
$this->load->view('layout/header');
?>

<div ng-controller="ProfileDetailsController">
    <!-- Inner Page Banner Area Start Here -->
    <div class="inner-page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb-area">
                        <h1>{{memberprofile.profile.baseProfile.member_id}}</h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Page Banner Area End Here -->
    <!-- Product Details1 Area Start Here -->
    <div class="product-details1-area" style="padding-top: 20px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 " ng-if="memberprofile.profile">
                    <div class="inner-shop-details">
                        <div class="product-details-info-area">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                    <div class="inner-product-details-left">
                                        <div class="tab-content">
                                            <div class="tab-pane fade {{$index==0?'active in':''}}" id="related{{$index}}" ng-repeat="image in memberprofile.profile.profile_photo_all">
                                                <a href="#" class="zoom ex1">
                                                    <img class="img-responsive product_image_center" src="<?php echo base_url(); ?>assets/images/memberprofile.png" style="background:url({{image}});    height: auto;" alt="product">

                                                </a>
                                            </div>

                                        </div>
                                        <ul>
                                            <li class="{{$index==0?'active':''}}"  ng-repeat="image in memberprofile.profile.profile_photo_all">
                                                <a href="#related{{$index}}" data-toggle="tab" aria-expanded="false">
                                                    <img class="img-responsive product_image_center" src="<?php echo base_url(); ?>assets/images/memberprofile.png" style="background:url({{image}});    height: auto;" alt="product">

                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    <div class="inner-product-details-right">
                                        <!-- begin table -->
                                        <div class="table-responsive">
                                            <div class="panel panel-inverse">

                                                <div class="memberprofileblock">
                                                    <h3><a href="#">{{memberprofile.profile.baseProfile.name}}</a> <small>{{memberprofile.profile.baseProfile.age}} Years</small></h3>

                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-profile">

                                                        <tbody>





                                                            <tr >
                                                                <td class="field">Marital status</td>
                                                                <td>
                                                                    {{memberprofile.profile.marital_status}}

                                                                </td>
                                                            </tr>

                                                            <tr ng-if="memberprofile.profile.marital_status != 'Never Married'">
                                                                <td class="field">Have children</td>
                                                                <td>
                                                                    {{memberprofile.profile.marital_status_children}}
                                                                </td>
                                                            </tr>

                                                            <tr ng-if="memberprofile.profile.marital_status != 'Never Married'">
                                                                <td class="field">No. of children</td>
                                                                <td>
                                                                    <span ng-if="memberprofile.profile.marital_status_children != 'No'">{{memberprofile.profile.marital_children_count}}</span>
                                                                    <span ng-if="memberprofile.profile.marital_status_children == 'No'">{{memberprofile.profile.marital_children_count}}</span>


                                                                </td>
                                                            </tr>




                                                            <tr >
                                                                <td class="field">Height</td>
                                                                <td>{{memberprofile.profile.height}} </td>
                                                            </tr>

                                                            <tr >
                                                                <td class="field">Weight</td>
                                                                <td>
                                                                    {{memberprofile.profile.weight}}  KG     
                                                                </td>
                                                            </tr>

                                                            <tr >
                                                                <td class="field">Any Disability?</td>
                                                                <td>
                                                                    {{memberprofile.profile.disablity ?memberprofile.profile.disablity:'No'}}      
                                                                </td>
                                                            </tr>

                                                            <tr >
                                                                <td class="field">Blood Group</td>
                                                                <td>
                                                                    {{memberprofile.profile.blood_group}}                                             
                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="panel-heading">
                                                    <h2 class="panel-title">Religious Background
                                                    </h2>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-profile">
                                                        <tbody>
                                                            <tr >
                                                                <td class="field" style="width: 200px;">Religion</td>
                                                                <td>
                                                                    {{memberprofile.profile.religion_title}}
                                                                </td>
                                                            </tr>
                                                            <tr >
                                                                <td class="field" style="width: 200px;">Community</td>
                                                                <td>
                                                                    {{memberprofile.profile.community_title}}
                                                                </td>
                                                            </tr>

                                                            <tr >
                                                                <td class="field">Other Religious</td>
                                                                <td>
                                                                    {{memberprofile.profile.other_religious_info}}       
                                                                </td>
                                                            </tr>



                                                            <tr >
                                                                <td class="field">Mother Tongue</td>
                                                                <td>
                                                                    {{memberprofile.profile.mother_tongue_title}}
                                                                </td>
                                                            </tr>




                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="panel-heading">
                                                    <h2 class="panel-title">Horoscope Information
                                                    </h2>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-profile">
                                                        <tbody>
                                                            <tr >
                                                                <td class="field" style="width: 200px;">Age</td>
                                                                <td>
                                                                    {{memberprofile.profile.baseProfile.age}} Years    
                                                                </td>
                                                            </tr>

                                                            <tr ng-if="memberprofile.profile.religion == 1">
                                                                <td class="field">Mangalik Status</td>
                                                                <td>
                                                                    {{memberprofile.profile.manglik_status}}
                                                                </td>
                                                            </tr>
                                                            <tr ng-if="memberprofile.profile.religion != 1">
                                                                <td colspan="2">
                                                                    {{memberprofile.profile.manglik_status}}   
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="panel-heading">
                                                    <h2 class="panel-title">Education & Career

                                                    </h2>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-profile">
                                                        <tbody>
                                                            <tr >
                                                                <td class="field" style="width: 200px;">Highest Qualification</td>
                                                                <td>
                                                                    {{memberprofile.profile.high_qualification_title}} ({{memberprofile.profile.high_qualification_category_title}})
                                                                </td>
                                                            </tr>


                                                            <tr >
                                                                <td class="field">Higher Edu. College/School</td>
                                                                <td>
                                                                    {{memberprofile.profile.high_qualification_college}}      
                                                                </td>
                                                            </tr>

                                                            <tr ng-if="memberprofile.profile.qualification_details">
                                                                <td class="field">Qualification Details</td>
                                                                <td>
                                                                    {{memberprofile.profile.qualification_details}}       
                                                                </td>
                                                            </tr>

                                                            <tr >
                                                                <td class="field">Working With </td>
                                                                <td>
                                                                    {{memberprofile.profile.career_sector_title}}
                                                                </td>
                                                            </tr>


                                                        <tbody ng-if="(memberprofile.profile.career_sector != 4) && (memberprofile.profile.career_sector != 5)">
                                                            <tr >
                                                                <td class="field">Profession </td>
                                                                <td>
                                                                    {{memberprofile.profile.career_profession_title}} ({{memberprofile.profile.career_profession_category_title}}  ) 

                                                                </td>
                                                            </tr>
                                                            <tr >
                                                                <td class="field">Working Position</td>
                                                                <td>
                                                                    {{memberprofile.profile.career_position}}       
                                                                </td>
                                                            </tr>

                                                            <tr >
                                                                <td class="field">Employer Name</td>
                                                                <td>
                                                                    {{memberprofile.profile.career_employer}}     
                                                                </td>
                                                            </tr>

                                                            <tr >
                                                                <td class="field">Annual Income </td>
                                                                <td>
                                                                    {{memberprofile.profile.career_income_title}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody ng-if="(memberprofile.profile.career_sector == 4) && (memberprofile.profile.career_sector != 5)">
                                                            <tr >
                                                                <td class="field">Profession </td>
                                                                <td>
                                                                    {{memberprofile.profile.career_profession_title}} ({{memberprofile.profile.career_profession_category_title}}  ) 
                                                                </td>
                                                            </tr>
                                                            <tr >
                                                                <td class="field">Business Type</td>
                                                                <td>
                                                                    {{memberprofile.profile.career_position}}      
                                                                </td>
                                                            </tr>

                                                            <tr >
                                                                <td class="field">Business Name</td>
                                                                <td>
                                                                    {{memberprofile.profile.career_employer}}      
                                                                </td>
                                                            </tr>

                                                            <tr >
                                                                <td class="field">Annual Income </td>
                                                                <td>
                                                                    {{memberprofile.profile.career_income_title}}
                                                                </td>
                                                            </tr>
                                                        </tbody>



                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="panel-heading">
                                                    <h2 class="panel-title">Family

                                                    </h2>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-profile">
                                                        <tbody>

                                                            <tr >

                                                                <td class="field" style="width: 200px;">Father's Status</td>
                                                                <td>
                                                                    <b>Father</b>
                                                                    {{memberprofile.profile.father_status}}
                                                                </td>
                                                            </tr>


                                                            <tr >
                                                                <td class="field">Father's Work Information</td>
                                                                <td>
                                                                    {{memberprofile.profile.father_work}}    
                                                                </td>
                                                            </tr>
                                                            <tr >
                                                                <td class="field" style="width: 200px;">Mothers's Name</td>
                                                                <td>
                                                                    {{memberprofile.profile.mother_name}}
                                                                </td>
                                                            </tr>

                                                            <tr >
                                                                <td class="field" style="width: 200px;">Mothers's Status</td>
                                                                <td>
                                                                    {{memberprofile.profile.mother_status}}
                                                                </td>
                                                            </tr>


                                                            <tr >
                                                                <td class="field">Mothers's Work Information</td>
                                                                <td>
                                                                    {{memberprofile.profile.mother_work}} 
                                                                </td>
                                                            </tr>



                                                            <tr >
                                                                <td class="field" >Family Location </td>
                                                                <td>
                                                                    {{memberprofile.profile.family_location_city_title}}, {{memberprofile.profile.family_location_state_title}}

                                                                </td>
                                                            </tr>



                                                            <tr >

                                                                <td class="row" colspan="2">
                                                                    <b>Brothers</b>
                                                                    <p class="font-10" ng-if="memberprofile.profile.brother_unmarried"> {{memberprofile.profile.brother_unmarried}} Unmarried</p>


                                                                    <p class="font-10" ng-if="memberprofile.profile.brother_married">  {{memberprofile.profile.brother_married}}   Married</p>


                                                                </td>
                                                            </tr>
                                                            <tr >
                                                                <td class="row" colspan="2">
                                                                    <b>Sisters</b>

                                                                    <p class="font-10" ng-if="memberprofile.profile.sister_unmarried" >   {{memberprofile.profile.sister_unmarried}}  Unmarried</p>


                                                                    <p class="font-10" ng-if="memberprofile.profile.sister_married" >  {{memberprofile.profile.sister_married}}   Married</p>


                                                                </td>
                                                            </tr>

                                                            <tr >
                                                                <td class="field" style="width: 200px;">Family Type</td>
                                                                <td>
                                                                    {{memberprofile.profile.family_type}}
                                                                </td>
                                                            </tr>

                                                            <tr >
                                                                <td class="field" style="width: 200px;">Family values
                                                                </td>
                                                                <td>
                                                                    {{memberprofile.profile.family_value}}
                                                                </td>
                                                            </tr>


                                                            <tr >
                                                                <td class="field" style="width: 200px;">Family Affluence</td>
                                                                </td>
                                                                <td>
                                                                    {{memberprofile.profile.family_affluence}}
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>



                                        </div>
                                        <!-- end table -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="sidebar hidden-before-tab">
                        <div class="category-menu-area sidebar-section-margin pinkgradiant" id="category-menu-area" style="border-radius: 20px;">
                            <div class="profile-last_block" style="padding: 20px 0px;">
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
        </div>
    </div>
    <!-- Product Details1 Area End Here -->
</div>

<script>

    var member_profile_id = "<?php echo $member_id; ?>";</script>
<script src="<?php echo base_url(); ?>assets/theme2/angular/profilelistController.js"></script>


<?php
$this->load->view('layout/footer');
?>
