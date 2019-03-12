
<?php include('header.php'); ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Add Match Sanctioning Application Form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Match Sanctioning</a></li>
<!--             <li class="breadcrumb-item">pages</li> -->
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </div>
   
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=add-match-sanctioning">

                        <div class="row">
                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Date of Filing:</label>
		                            <input type="date" class="form-control form-control-line" required="" name="dateOfFiling"> 
		                        </div>
                        	</div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Name of Match:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="nameOfMatch"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Shooting Range Address:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="shootingRangeAddress"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Date of Match:</label>
		                            <input type="date" class="form-control form-control-line" required="" name="dateOfMatch"> 
		                        </div>
                        	</div>

                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Level:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="level"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Zone:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="zone"> 
		                        </div>
                        	</div>

                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>District:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="district"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Host Gun Club:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="hostGunClub"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Shooting Format:</label>
                                    <select class="form-control" required="" name="shootingFormat">
                                            <option>PSMOC</option>
                                            <option>3-GUN NATION</option>
                                            <option>USPSA</option>
                                            <option>STEEL CHALLENGE</option>
                                            <option>IMSSU</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered color-table primary-table">
                                        <thead>
                                            <tr>
                                                <th>PSMOC Shooting Format</th>
                                                <th>Handgun</th>
                                                <th>PRR</th>
                                                <th>Shotgun</th>
                                                <th>PCC</th>
                                                <th colspan="5">2GUN</th>
                                                <th colspan="5">3GUN</th>
                                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- 1 -->
                                            <tr>
                                                <th class="table-info"></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                                <th class="table-danger">HG</th>
                                                <th class="table-danger">PRR</th>
                                                <th class="table-danger">SG</th>
                                                <th class="table-danger">PCC</th>
                                                <th class="table-danger">SSR</th>

                                                <th class="table-warning">HG</th>
                                                <th class="table-warning">PRR</th>
                                                <th class="table-warning">SG</th>
                                                <th class="table-warning">PCC</th>
                                                <th class="table-warning">SSR</th>
                                            </tr>
                                            <!-- 2 -->
                                            <tr>
                                                <th class="table-info">Level</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="levelHandgun"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="levelPRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="levelShoutgun"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="levelPCC"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level2GunHG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level2GunPRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level2GunSG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level2GunPCC"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level2GunSSR"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level3GunHG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level3GunPRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level3GunSG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level3GunPCC"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level3GunSSR"> 
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- 3 -->
                                            <tr>
                                                <th class="table-info">Speed Course</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourseHandgun"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCoursePRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourseShotgun"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCoursePCC"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse2GunHG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse2GunPRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse2GunSG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse2GunPCC"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse2GunSSR"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse3GunHG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse3GunPRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse3GunSG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse3GunPCC"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse3GunSSR"> 
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- 4 -->
                                            <tr>
                                                <th class="table-info">Intermediate Course</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourseHandgun"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCoursePRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourseShotgun"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCoursePCC"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse2GunHG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse2GunPRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse2GunSG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse2GunPCC"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse2GunSSR"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse3GunHG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse3GunPRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse3GunSG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse3GunPCC"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse3GunSSR"> 
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- 5 -->
                                            <tr>
                                                <th class="table-info">Ultimate Course</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourseHandgun"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCoursePRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourseShotgun"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCoursePCC"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse2GunHG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse2GunPRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse2GunSG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse2GunPCC"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse2GunSSR"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse3GunHG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse3GunPRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse3GunSG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse3GunPCC"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse3GunSSR"> 
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- 6 -->
                                            <tr>
                                                <th class="table-info">No. of Stages</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourseHandgun"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCoursePRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourseShotgun"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCoursePCC"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse2GunHG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse2GunPRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse2GunSG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse2GunPCC"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse2GunSSR"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse3GunHG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse3GunPRR"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse3GunSG"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse3GunPCC"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse3GunSSR"> 
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Match Administrator ("MA"):</label>
                                    <input type="text" class="form-control form-control-line" required="" name="matchAdministrator"> 
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Cell No. / Email:</label>
                                    <input type="text" class="form-control form-control-line" name="matchAdministratorContactNumber"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Match Master ("MM"):</label>
                                    <input type="text" class="form-control form-control-line" required="" name="matchMaster"> 
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Cell No. / Email:</label>
                                    <input type="text" class="form-control form-control-line" name="matchMasterContactNumber"> 
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Chief Score Proc. Off. ("CSPO"):</label>
                                    <input type="text" class="form-control form-control-line" required="" name="chiefScoreProcOff"> 
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Cell No. / Email:</label>
                                    <input type="text" class="form-control form-control-line" name="chiefScoreProcOffContactNumber"> 
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Contact Person:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="contactPerson"> 
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Cell No. / Email:</label>
                                    <input type="text" class="form-control form-control-line" name="contactPersonContactNumber"> 
                                </div>
                            </div>
                        </div>

                        <h3 class="font-weight-bold text-primary">Conforme</h3>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name of Gun Club President:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="nameOfGunClubPresident"> 
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Contact No.:</label>
                                    <input type="text" class="form-control form-control-line" name="nameOfGunClubPresidentContactNumber"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name of Match Organizer:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="nameOfMatchOrganizer"> 
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Contact No.:</label>
                                    <input type="text" class="form-control form-control-line" name="nameOfMatchOrganizerContactNumber"> 
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save changes</button>



       


                    </form>
        
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
         
<?php include('footer.php'); ?>
