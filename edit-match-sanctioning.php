<?php 
include('header.php');

$db->select('match_sanctioning_table','*',NULL,'matchSanctioningId = "' . $_GET['matchSanctioningId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Edit Match Sanctioning Application Form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Match Sanctioning</a></li>
            <li class="breadcrumb-item">View All</li>
            <li class="breadcrumb-item active">Edit</li>
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
                	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=edit-match-sanctioning">

                        <div class="row">
                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Date of Filing:</label>
		                            <input type="date" class="form-control form-control-line" required="" name="dateOfFiling" value="<?php echo $res['dateOfFiling'] ?>"> 
		                        </div>
                        	</div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Name of Match:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="nameOfMatch" value="<?php echo $res['nameOfMatch'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Shooting Range Address:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="shootingRangeAddress" value="<?php echo $res['shootingRangeAddress'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Date of Match:</label>
		                            <input type="date" class="form-control form-control-line" required="" name="dateOfMatch" value="<?php echo $res['dateOfMatch'] ?>"> 
		                        </div>
                        	</div>

                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Level:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="level" value="<?php echo $res['level'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Zone:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="zone" value="<?php echo $res['zone'] ?>"> 
		                        </div>
                        	</div>

                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>District:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="district" value="<?php echo $res['district'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Host Gun Club:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="hostGunClub" value="<?php echo $res['hostGunClub'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Shooting Format:</label>
                                    <select class="form-control" required="" name="shootingFormat">      
                                            <option selected=""><?php echo $res['shootingFormat']; ?></option>
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
                                                        <input type="text" class="form-control form-control-line" name="levelHandgun" value="<?php echo $res['levelHandgun'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="levelPRR" value="<?php echo $res['levelPRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="levelShoutgun" value="<?php echo $res['levelShoutgun'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="levelPCC" value="<?php echo $res['levelPCC'] ?>"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level2GunHG" value="<?php echo $res['level2GunHG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level2GunPRR" value="<?php echo $res['level2GunPRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level2GunSG" value="<?php echo $res['level2GunSG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level2GunPCC" value="<?php echo $res['level2GunPCC'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level2GunSSR" value="<?php echo $res['level2GunSSR'] ?>"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level3GunHG" value="<?php echo $res['level3GunHG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level3GunPRR" value="<?php echo $res['level3GunPRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level3GunSG" value="<?php echo $res['level3GunSG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level3GunPCC" value="<?php echo $res['level3GunPCC'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="level3GunSSR" value="<?php echo $res['level3GunSSR'] ?>"> 
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- 3 -->
                                            <tr>
                                                <th class="table-info">Speed Course</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourseHandgun" value="<?php echo $res['speedCourseHandgun'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCoursePRR" value="<?php echo $res['speedCoursePRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourseShotgun" value="<?php echo $res['speedCourseShotgun'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCoursePCC" value="<?php echo $res['speedCoursePCC'] ?>"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse2GunHG" value="<?php echo $res['speedCourse2GunHG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse2GunPRR" value="<?php echo $res['speedCourse2GunPRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse2GunSG" value="<?php echo $res['speedCourse2GunSG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse2GunPCC" value="<?php echo $res['speedCourse2GunPCC'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse2GunSSR" value="<?php echo $res['speedCourse2GunSSR'] ?>"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse3GunHG" value="<?php echo $res['speedCourse3GunHG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse3GunPRR" value="<?php echo $res['speedCourse3GunPRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse3GunSG" value="<?php echo $res['speedCourse3GunSG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse3GunPCC" value="<?php echo $res['speedCourse3GunPCC'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="speedCourse3GunSSR" value="<?php echo $res['speedCourse3GunSSR'] ?>"> 
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- 4 -->
                                            <tr>
                                                <th class="table-info">Intermediate Course</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourseHandgun" value="<?php echo $res['intermediateCourseHandgun'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCoursePRR" value="<?php echo $res['intermediateCoursePRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourseShotgun" value="<?php echo $res['intermediateCourseShotgun'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCoursePCC" value="<?php echo $res['intermediateCoursePCC'] ?>"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse2GunHG" value="<?php echo $res['intermediateCourse2GunHG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse2GunPRR" value="<?php echo $res['intermediateCourse2GunPRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse2GunSG" value="<?php echo $res['intermediateCourse2GunSG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse2GunPCC" value="<?php echo $res['intermediateCourse2GunPCC'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse2GunSSR" value="<?php echo $res['intermediateCourse2GunSSR'] ?>"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse3GunHG" value="<?php echo $res['intermediateCourse3GunHG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse3GunPRR" value="<?php echo $res['intermediateCourse3GunPRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse3GunSG" value="<?php echo $res['intermediateCourse3GunSG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse3GunPCC" value="<?php echo $res['intermediateCourse3GunPCC'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="intermediateCourse3GunSSR" value="<?php echo $res['intermediateCourse3GunSSR'] ?>"> 
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- 5 -->
                                            <tr>
                                                <th class="table-info">Ultimate Course</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourseHandgun" value="<?php echo $res['ultimateCourseHandgun'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCoursePRR" value="<?php echo $res['ultimateCoursePRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourseShotgun" value="<?php echo $res['ultimateCourseShotgun'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCoursePCC" value="<?php echo $res['ultimateCoursePCC'] ?>"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse2GunHG" value="<?php echo $res['ultimateCourse2GunHG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse2GunPRR" value="<?php echo $res['ultimateCourse2GunPRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse2GunSG" value="<?php echo $res['ultimateCourse2GunSG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse2GunPCC" value="<?php echo $res['ultimateCourse2GunPCC'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse2GunSSR" value="<?php echo $res['ultimateCourse2GunSSR'] ?>"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse3GunHG" value="<?php echo $res['ultimateCourse3GunHG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse3GunPRR" value="<?php echo $res['ultimateCourse3GunPRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse3GunSG" value="<?php echo $res['ultimateCourse3GunSG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse3GunPCC" value="<?php echo $res['ultimateCourse3GunPCC'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="ultimateCourse3GunSSR" value="<?php echo $res['ultimateCourse3GunSSR'] ?>"> 
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- 6 -->
                                            <tr>
                                                <th class="table-info">No. of Stages</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourseHandgun" value="<?php echo $res['noOfStagesCourseHandgun'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCoursePRR" value="<?php echo $res['noOfStagesCoursePRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourseShotgun" value="<?php echo $res['noOfStagesCourseShotgun'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCoursePCC" value="<?php echo $res['noOfStagesCoursePCC'] ?>"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse2GunHG" value="<?php echo $res['noOfStagesCourse2GunHG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse2GunPRR" value="<?php echo $res['noOfStagesCourse2GunPRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse2GunSG" value="<?php echo $res['noOfStagesCourse2GunSG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse2GunPCC" value="<?php echo $res['noOfStagesCourse2GunPCC'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse2GunSSR" value="<?php echo $res['noOfStagesCourse2GunSSR'] ?>"> 
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse3GunHG" value="<?php echo $res['noOfStagesCourse3GunHG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse3GunPRR" value="<?php echo $res['noOfStagesCourse3GunPRR'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse3GunSG" value="<?php echo $res['noOfStagesCourse3GunSG'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse3GunPCC" value="<?php echo $res['noOfStagesCourse3GunPCC'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="noOfStagesCourse3GunSSR" value="<?php echo $res['noOfStagesCourse3GunSSR'] ?>"> 
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
                                    <input type="text" class="form-control form-control-line" required="" name="matchAdministrator" value="<?php echo $res['matchAdministrator'] ?>"> 
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Cell No. / Email:</label>
                                    <input type="text" class="form-control form-control-line" name="matchAdministratorContactNumber" value="<?php echo $res['matchAdministratorContactNumber'] ?>"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Match Master ("MM"):</label>
                                    <input type="text" class="form-control form-control-line" required="" name="matchMaster" value="<?php echo $res['matchMaster'] ?>"> 
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Cell No. / Email:</label>
                                    <input type="text" class="form-control form-control-line" name="matchMasterContactNumber" value="<?php echo $res['matchMasterContactNumber'] ?>"> 
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Chief Score Proc. Off. ("CSPO"):</label>
                                    <input type="text" class="form-control form-control-line" required="" name="chiefScoreProcOff" value="<?php echo $res['chiefScoreProcOff'] ?>"> 
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Cell No. / Email:</label>
                                    <input type="text" class="form-control form-control-line" name="chiefScoreProcOffContactNumber"  value="<?php echo $res['chiefScoreProcOffContactNumber'] ?>"> 
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Contact Person:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="contactPerson" value="<?php echo $res['contactPerson'] ?>"> 
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Cell No. / Email:</label>
                                    <input type="text" class="form-control form-control-line" name="contactPersonContactNumber" value="<?php echo $res['contactPersonContactNumber'] ?>"> 
                                </div>
                            </div>
                        </div>

                        <h3 class="font-weight-bold text-primary">Conforme</h3>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name of Gun Club President:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="nameOfGunClubPresident" value="<?php echo $res['nameOfGunClubPresident'] ?>"> 
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Contact No.:</label>
                                    <input type="text" class="form-control form-control-line" name="nameOfGunClubPresidentContactNumber" value="<?php echo $res['nameOfGunClubPresidentContactNumber'] ?>"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name of Match Organizer:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="nameOfMatchOrganizer" value="<?php echo $res['nameOfMatchOrganizer'] ?>"> 
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Contact No.:</label>
                                    <input type="text" class="form-control form-control-line" name="nameOfMatchOrganizerContactNumber" value="<?php echo $res['nameOfMatchOrganizerContactNumber'] ?>"> 
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>

                        <input type="text" name="matchSanctioningId" value="<?php echo $_GET['matchSanctioningId'] ?>" hidden="">

       


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
