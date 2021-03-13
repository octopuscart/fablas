<?php
$this->load->view('layout/header');
?>    
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
<section class="" ng-controller="addShadiProfileController">
    <!-- Content -->
    <div class="login-registration-page-area2" >
        <div id="content"  >

            <!-- Blog -->
            <section class="woocommerce ">
                <div class="container">

                    <!-- News Post -->
                    <div class="news-post">
                        <div class="row">
                            <!-- begin #content -->
                            <div id="content" class="content">
                                <div class="">
                                    <!-- begin profile-section -->
                                    <div class="profile-section">

                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-9">
                                                <!-- begin profile-info -->
                                                <div class="profile-info" style="    font-size: 14px;">
                                                    <!-- begin table -->
                                                    <div class="table-responsive">
                                                        <form action="#" method="post"  enctype="multipart/form-data">
                                                            <div class="panel panel-default">

                                                                <div class="panel-body">
                                                                    <table class="table table-profile">

                                                                        <tbody>


                                                                            <tr >
                                                                                <td class="field" style="width: 200px;" colspan="   ">Name</td>
                                                                                <td colspan="">
                                                                                    <input type="text" name="name" class="form-control" placeholder="Profile Name" required="">     
                                                                                </td>
                                                                        
                                                                                <td class="field" >Gender</td>
                                                                                <td colspan="">
                                                                                    <select name="gender" class="form-control" required="">
                                                                                        <option value="Male">Male</option>
                                                                                        <option value="Female">Female</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>


                                                                            <tr >
                                                                                <td class="field" >Marital status</td>
                                                                                <td colspan="3">
                                                                                    <select name="marital_status" class="form-control" ng-model="marital_status.status" required="">
                                                                                        <option value="Never Married" label="Never Married" selected="selected">Never Married</option>
                                                                                        <option value="Divorced" label="Divorced">Divorced</option>
                                                                                        <option value="Awaiting Divorce" label="Awaiting Divorce">Awaiting Divorce</option>
                                                                                    </select>                                                </td>
                                                                            </tr>

                                                                            <tr ng-if="marital_status.status != 'Never Married'">
                                                                                <td class="field" colspan="1">Have children</td>
                                                                                <td colspan="">
                                                                                    <select name="marital_status_children"  class="form-control" ng-model="marital_status.marital_status_children" >
                                                                                        <option value="No">No</option>
                                                                                        <option value="Yes, Living together">Yes, Living together</option>
                                                                                        <option value="Yes, Not Living together">Yes, Not Living together</option>

                                                                                    </select>
                                                                                </td>
                                      
                                                                                <td class="field" colspan="1">No. of children</td>
                                                                                <td colspan="">
                                                                                    <select name="marital_children_count" class="form-control" ng-if="marital_status.marital_status_children != 'No'" required="">
                                                                                        <option value="1">1</option>
                                                                                        <option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                        <option value="More then 3+">More then 3</option>
                                                                                    </select>
                                                                                    <select name="marital_children_count" class="form-control" ng-if="marital_status.marital_status_children == 'No'" required="">
                                                                                        <option value="No">No</option>


                                                                                    </select>
                                                                                </td>
                                                                            </tr>


                                                                            <tr ng-if="marital_status.status == 'Never Married'">
                                                                                <td colspan="4">
                                                                                    <input name="marital_status_children" type="hidden" value="">
                                                                                    <input name="marital_children_count" type="hidden" value="">
                                                                                </td>
                                                                            </tr>



                                                                            <tr >
                                                                                <td class="field"  style="width: 200px;">Religion</td>
                                                                                <td>
                                                                                    <select class="form-control" name="religion" ng-model="religious.community" ng-change="getSubCommunity()" required="">
                                                                                        <option value="">Select</option>
                                                                                        <?php
                                                                                        foreach ($community_category as $key => $value) {
                                                                                            ?>
                                                                                            <option value="<?php echo $value['id']; ?>" label="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></option>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </td>

                                                                                <td class="field" style="width: 200px;">Community</td>
                                                                                <td>
                                                                                    <select name="community" class="form-control" ng-model="religious.sub_community" required="">
                                                                                        <option value="">Select</option>
                                                                                        <option value="{{cmt.title}}" label="{{cmt.title}}" ng-repeat="cmt in religious.sub_community_list">{{cmt.title}}</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>










                                                                            <tr ng-if="religious.community == 1">
                                                                                <td class="field" style="width: 200px;">Date Of Birth</td>
                                                                                <td>
                                                                                    <input type="date" name="date_of_birth" max="<?php echo date('Y-m-d', strtotime('-18 year')); ?>" value="<?php echo date('Y-m-d', strtotime('-18 year')); ?>" class="form-control" placeholder="Date Of Birth" required="">     
                                                                                </td>
                                                                                <td class="field">Mangalik Status</td>
                                                                                <td>
                                                                                    <select class="form-control" name="manglik_status" required="">
                                                                                        <option value="" label="Select" selected="selected">Select</option>
                                                                                        <option value="No" label="No">No</option>
                                                                                        <option value="Don't Know" label="Don't Know">Don't Know</option>
                                                                                        <option value="Manglik" label="Manglik">Manglik</option>
                                                                                        <option value="Anshik Maglik" label="Anshik Maglik">Anshik Maglik</option>

                                                                                    </select>   
                                                                                </td>
                                                                            </tr>
                                                                            <tr ng-if="religious.community != 1">
                                                                                <td class="field" style="width: 200px;">Date Of Birth</td>
                                                                                <td>
                                                                                    <input type="date" name="date_of_birth" max="<?php echo date('Y-m-d', strtotime('-18 year')); ?>" value="<?php echo date('Y-m-d', strtotime('-18 year')); ?>" class="form-control" placeholder="Date Of Birth" required="">     
                                                                                </td>
                                                                                <td colspan="2">
                                                                                    <input type="hidden" name="manglik_status" value="">
                                                                                </td>

                                                                            </tr>

                                                                            <tr >
                                                                                <td class="field" style="width: 200px;">Highest Qualification</td>
                                                                                <td>
                                                                                    <select class="form-control" name="high_qualification" ng-model="educareer.qualification" required="">
                                                                                        <option value="">Select</option>
                                                                                        <?php
                                                                                        foreach ($set_qualification_dict as $qualificationkey => $qualificationvalue) {
                                                                                            ?>
                                                                                            <optgroup id="<?php echo $qualificationkey; ?>" label="<?php echo $qualificationkey; ?>"><?php echo $qualificationkey; ?></optgroup>
                                                                                            <?php
                                                                                            foreach ($set_qualification_dict[$qualificationkey] as $key => $value) {
                                                                                                ?>
                                                                                                <option value="<?php echo $value['id']; ?>" label="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></option>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </td>

                                                                                <td class="field">Working With </td>
                                                                                <td>
                                                                                    <select class="form-control" name="career_sector" ng-model="educareer.career_sector" required="">
                                                                                        <option value="">Select</option>
                                                                                        <?php
                                                                                        foreach ($set_profession_sector as $key => $value) {
                                                                                            ?>
                                                                                            <option value="<?php echo $value['id']; ?>" label="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></option>
                                                                                            <?php
                                                                                        }
                                                                                        ?> 
                                                                                    </select>
                                                                                </td>
                                                                            </tr>


                                                                        <tbody ng-if="(educareer.career_sector != 4) && (educareer.career_sector != 5)">
                                                                            <tr >
                                                                                <td class="field">Profession </td>
                                                                                <td>
                                                                                    <select class="form-control" name="career_profession" required="">
                                                                                        <option value="">Select</option>
                                                                                        <?php
                                                                                        foreach ($set_profession_dict as $professionkey => $professionvalue) {
                                                                                            ?>
                                                                                            <optgroup id="<?php echo $professionkey; ?>" label="<?php echo $professionkey; ?>"><?php echo $professionkey; ?></optgroup>
                                                                                            <?php
                                                                                            foreach ($set_profession_dict[$professionkey] as $key => $value) {
                                                                                                ?>
                                                                                                <option value="<?php echo $value['id']; ?>" label="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></option>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </td>
                 
                                                                                <td class="field">Annual Income </td>
                                                                                <td>
                                                                                    <select class="form-control" name="career_income" ng-model="educareer.income" required="">
                                                                                        <option value="">Select</option>
                                                                                        <?php
                                                                                        foreach ($set_annual_income as $key => $value) {
                                                                                            ?>
                                                                                            <option value="<?php echo $value['id']; ?>" label="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></option>
                                                                                            <?php
                                                                                        }
                                                                                        ?> 
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                        <tbody ng-if="(educareer.career_sector == 4) && (educareer.career_sector != 5)">
                                                                            <tr >
                                                                                <td class="field">Profession </td>
                                                                                <td>
                                                                                    <select class="form-control" name="career_profession" required="">
                                                                                        <option value="">Select</option>
                                                                                        <?php
                                                                                        foreach ($set_profession_dict as $professionkey => $professionvalue) {
                                                                                            ?>
                                                                                            <optgroup id="<?php echo $professionkey; ?>" label="<?php echo $professionkey; ?>"><?php echo $professionkey; ?></optgroup>
                                                                                            <?php
                                                                                            foreach ($set_profession_dict[$professionkey] as $key => $value) {
                                                                                                ?>
                                                                                                <option value="<?php echo $value['id']; ?>" label="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></option>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </td>
                                                                         
                                                                                <td class="field">Annual Income </td>
                                                                                <td>
                                                                                    <select class="form-control" name="career_income" ng-model="educareer.income" required="">
                                                                                        <option value="">Select</option>
                                                                                        <?php
                                                                                        foreach ($set_annual_income as $key => $value) {
                                                                                            ?>
                                                                                            <option value="<?php echo $value['id']; ?>" label="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></option>
                                                                                            <?php
                                                                                        }
                                                                                        ?> 
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>




                                                                        <tbody>




                                                                            <tr >
                                                                                <td class="field" rowspan="2">Family Location </td>
                                                                                <td>
                                                                                    <select class="form-control" name="family_location_state" ng-model="familylocationdata.state" ng-change="getFamilyStateCity()" required="">
                                                                                        <option value="">Select</option>
                                                                                        <?php
                                                                                        foreach ($set_state as $key => $value) {
                                                                                            ?>
                                                                                            <option value="<?php echo $value['id']; ?>" label="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></option>
                                                                                            <?php
                                                                                        }
                                                                                        ?> 
                                                                                    </select>
                                                                                </td>
                                      
                                                                                <td colspan="2">
                                                                                    <select class="form-control" name="family_location_city" ng-model="familylocationdata.city" required="">
                                                                                        <option value="">Select</option>
                                                                                        <option value="{{cmt.id}}" label="{{cmt.title}}" ng-repeat="cmt in familylocationdata.city_list">{{cmt.title}}</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>


                                                                        </tbody>
                                                                    </table>
                                                                    <div class="text-center">
                                                                        <button type="submit" name="addmemeber" class="btn-send-message" value="addrofile">Add Profile</button>
                                                                    </div>
                                                                </div>
                                                            </div>


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
                        </div>
                    </div>
                </div>
            </section>
        </div>
</section>



<!--end of datepicker-->
<script src="<?php echo base_url(); ?>assets/theme2/angular/shadiController.js"></script>
<?php
$this->load->view('layout/footer');
?> 
