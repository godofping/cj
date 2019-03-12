<?php 
include('header.php');

$db->select('match_sanctioning_table','*',NULL,'matchSanctioningId = "' . $_GET['matchSanctioningId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">View Match Sanctioning Application Form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Match Sanctioning</a></li>
            <li class="breadcrumb-item">View All</li>
            <li class="breadcrumb-item active">View</li>
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


                        <div class="row">
                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Date of Filing:</label>
		                            <p><?php echo $res['dateOfFiling']; ?></p>
		                        </div>
                        	</div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Name of Match:</label>
		                            <p><?php echo $res['nameOfMatch']; ?></p>
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Shooting Range Address:</label>
		                            <p><?php echo $res['shootingRangeAddress']; ?></p>
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Date of Match:</label>
		                            <p><?php echo $res['dateOfMatch']; ?></p>
		                        </div>
                        	</div>

                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Level:</label>
		                            <p><?php echo $res['level']; ?></p>
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Zone:</label>
		                            <p><?php echo $res['zone']; ?></p>
		                        </div>
                        	</div>

                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>District:</label>
		                            <p><?php echo $res['district']; ?></p>
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Host Gun Club:</label>
		                            <p><?php echo $res['hostGunClub']; ?></p>
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Shooting Format:</label>
                                    <p><?php echo $res['shootingFormat']; ?></p>
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
                                                    <p><?php echo $res['levelHandgun']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['levelPRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['levelShoutgun']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['levelPCC']; ?></p>
                                                </td>

                                                <td>
                                                    <p><?php echo $res['level2GunHG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['level2GunPRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['level2GunSG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['level2GunPCC']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['level2GunSSR']; ?></p>
                                                </td>

                                                <td>
                                                    <p><?php echo $res['level3GunHG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['level3GunPRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['level3GunSG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['level3GunPCC']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['level3GunSSR']; ?></p>
                                                </td>
                                            </tr>
                                            <!-- 3 -->
                                            <tr>
                                                <th class="table-info">Speed Course</th>
                                                <td>
                                                    <p><?php echo $res['speedCourseHandgun']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['speedCoursePRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['speedCourseShotgun']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['speedCoursePCC']; ?></p>
                                                </td>

                                                <td>
                                                    <p><?php echo $res['speedCourse2GunHG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['speedCourse2GunPRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['speedCourse2GunSG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['speedCourse2GunPCC']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['speedCourse2GunSSR']; ?></p>
                                                </td>

                                                <td>
                                                    <p><?php echo $res['speedCourse3GunHG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['speedCourse3GunPRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['speedCourse3GunSG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['speedCourse3GunPCC']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['speedCourse3GunSSR']; ?></p>
                                                </td>
                                            </tr>
                                            <!-- 4 -->
                                            <tr>
                                                <th class="table-info">Intermediate Course</th>
                                                <td>
                                                    <p><?php echo $res['intermediateCourseHandgun']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['intermediateCoursePRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['intermediateCourseShotgun']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['intermediateCoursePCC']; ?></p>
                                                </td>

                                                <td>
                                                    <p><?php echo $res['intermediateCourse2GunHG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['intermediateCourse2GunPRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['intermediateCourse2GunSG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['intermediateCourse2GunPCC']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['intermediateCourse2GunSSR']; ?></p>
                                                </td>

                                                <td>
                                                    <p><?php echo $res['intermediateCourse3GunHG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['intermediateCourse3GunPRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['intermediateCourse3GunSG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['intermediateCourse3GunPCC']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['intermediateCourse3GunSSR']; ?></p>
                                                </td>
                                            </tr>
                                            <!-- 5 -->
                                            <tr>
                                                <th class="table-info">Ultimate Course</th>
                                                <td>
                                                    <p><?php echo $res['ultimateCourseHandgun']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['ultimateCoursePRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['ultimateCourseShotgun']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['ultimateCoursePCC']; ?></p>
                                                </td>

                                                <td>
                                                    <p><?php echo $res['ultimateCourse2GunHG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['ultimateCourse2GunPRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['ultimateCourse2GunSG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['ultimateCourse2GunPCC']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['ultimateCourse2GunSSR']; ?></p>
                                                </td>

                                                <td>
                                                    <p><?php echo $res['ultimateCourse3GunHG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['ultimateCourse3GunPRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['ultimateCourse3GunSG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['ultimateCourse3GunPCC']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['ultimateCourse3GunSSR']; ?></p>
                                                </td>
                                            </tr>
                                            <!-- 6 -->
                                            <tr>
                                                <th class="table-info">No. of Stages</th>
                                                <td>
                                                    <p><?php echo $res['noOfStagesCourseHandgun']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['noOfStagesCoursePRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['noOfStagesCourseShotgun']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['noOfStagesCoursePCC']; ?></p>
                                                </td>

                                                <td>
                                                    <p><?php echo $res['noOfStagesCourse2GunHG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['noOfStagesCourse2GunPRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['noOfStagesCourse2GunSG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['noOfStagesCourse2GunPCC']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['noOfStagesCourse2GunSSR']; ?></p>
                                                </td>

                                                <td>
                                                    <p><?php echo $res['noOfStagesCourse3GunHG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['noOfStagesCourse3GunPRR']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['noOfStagesCourse3GunSG']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['noOfStagesCourse3GunPCC']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $res['noOfStagesCourse3GunSSR']; ?></p>
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
                                    <p><?php echo $res['matchAdministrator']; ?></p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Cell No. / Email:</label>
                                    <p><?php echo $res['matchAdministratorContactNumber']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Match Master ("MM"):</label>
                                    <p><?php echo $res['matchMaster']; ?></p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Cell No. / Email:</label>
                                    <p><?php echo $res['matchMasterContactNumber']; ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Chief Score Proc. Off. ("CSPO"):</label>
                                    <p><?php echo $res['chiefScoreProcOff']; ?></p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Cell No. / Email:</label>
                                    <p><?php echo $res['chiefScoreProcOffContactNumber']; ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Contact Person:</label>
                                    <p><?php echo $res['contactPerson']; ?></p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Cell No. / Email:</label>
                                    <p><?php echo $res['contactPersonContactNumber']; ?></p>
                                </div>
                            </div>
                        </div>

           

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name of Gun Club President:</label>
                                    <p><?php echo $res['nameOfGunClubPresident']; ?></p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Contact No.:</label>
                                    <p><?php echo $res['nameOfGunClubPresidentContactNumber']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name of Match Organizer:</label>
                                    <p><?php echo $res['nameOfMatchOrganizer']; ?></p> 
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Contact No.:</label>
                                    <p><?php echo $res['nameOfMatchOrganizerContactNumber']; ?></p>
                                </div>
                            </div>
                        </div>

              
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
         
<?php include('footer.php'); ?>
