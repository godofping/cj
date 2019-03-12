<?php 
include('header.php');

$db->select('membership_table','*',NULL,'membershipId = "' . $_GET['membershipId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">View Membership Form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascriptvoid(0)">Membership</a></li>
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
                                 <span class="help-block text-muted"><small>&nbsp;</small></span>
                                <div class="demo-radio-button">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="radio" class="with-gap" id="psmoc" name="psmocOrmoo" value="PSMOC" disabled="" <?php if ($res['psmocOrmoo'] == 'PSMOC'): ?>
                                            	checked
                                            <?php endif ?> />
                                            <label for="psmoc">PSMOC</label>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input name="newOrRenewal" type="radio" class="with-gap" id="radio_1" value="NEW" disabled=""  <?php if ($res['newOrRenewal'] == 'NEW'): ?>
                                            	checked
                                            <?php endif ?> />
                                                    <label for="radio_1">NEW</label>
                                                <input name="newOrRenewal" type="radio" class="with-gap" id="radio_2" value="RENEWAL" disabled="" <?php if ($res['newOrRenewal'] == 'RENEWAL'): ?>
                                            	checked
                                            <?php endif ?> />
                                                    <label for="radio_2">RENEWAL</label>

                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label>PSMOC ID No. (For Existing Member):</label>
                                                <p><?php echo $res['psmocId']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Expiry Date:</label>
                                                <p><?php echo $res['expiryDate']; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Place of Application / Seminar & Workshop:</label>
                                                <p><?php echo $res['placeOfApplicationOrSeminarAndWorkShop']; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 bg-light">
                                 <span class="help-block text-muted"><small>For MOO applicant only</small></span>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="demo-radio-button">
                                            <input type="radio" class="with-gap" id="moo" name="psmocOrmoo" value="MOO" disabled="" <?php if ($res['psmocOrmoo'] == 'MOO'): ?>
                                            	checked
                                            <?php endif ?>/>
                                            <label for="moo">MOO</label> 
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Exam Score:</label>
                                            <p><?php echo $res['examScore']; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-check">
                                                <input name="passedFailedIncomplete" type="radio" class="with-gap" id="PASSED" value="PASSED" disabled="" <?php if ($res['passedFailedIncomplete'] == 'PASSED'): ?>
                                            	checked
                                            <?php endif ?> />
                                                    <label for="PASSED">PASSED</label>
                                                <input name="passedFailedIncomplete" type="radio" class="with-gap" id="FAILED" value="FAILED" disabled=""  <?php if ($res['passedFailedIncomplete'] == 'FAILED'): ?>
                                            	checked
                                            <?php endif ?> />
                                                    <label for="FAILED">FAILED</label>
                                                <input name="passedFailedIncomplete" type="radio" class="with-gap" id="INCOMPLETE" value="INCOMPLETE" disabled="" <?php if ($res['passedFailedIncomplete'] == 'INCOMPLETE'): ?>
                                            	checked
                                            <?php endif ?> />
                                                    <label for="INCOMPLETE">INCOMPLETE</label>
                                            </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Local T-Shirt Size:</label>
                                            <p><?php echo $res['localTshirtSize']; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label>Zone (Please ask the MOO Staff):</label>
                                            <p><?php echo $res['zone']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>District:</label>
                                            <p><?php echo $res['district']; ?></p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Family Name:</label>
                                    <p><?php echo $res['familyName']; ?></p>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label>Middle Name:</label>
                                    <p><?php echo $res['middleName']; ?></p> 
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label>First Name / Given Name:</label>
                                    <p><?php echo $res['firstName']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Place of Birth:</label>
                                    <p><?php echo $res['placeOfBirth']; ?></p>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label>Date of Birth:</label>
                                    <p><?php echo $res['dateOfBirth']; ?></p>
                                </div>
                            </div>

                            <div class="col-1">
                                <div class="form-group">
                                    <label>Age:</label>
                                    <p><?php echo $res['age']; ?></p>
                                </div>
                            </div>

                            <div class="col-1">
                                <div class="form-group">
                                    <label>Sex:</label>
                                    <p><?php echo $res['sex']; ?></p>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label>Status:</label>
                                    <p><?php echo $res['status']; ?></p>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label>Blood Type:</label>
                                    <p><?php echo $res['bloodType']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Complete Home Address:</label>
                                    <p><?php echo $res['completeHomeAddress']; ?></p>
                                    <span class="help-block text-muted"><small>No. Street Name / Bldg. Name / Condo / Subdivision / Barangay / City / Town / Province</small></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Occupation / Position:</label>
                                    <p><?php echo $res['occupationOrPosition']; ?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name of Company / Organization:</label>
                                    <p><?php echo $res['nameOfCompanyOrOrganiztion']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Complete Office / Business Address:</label>
                                    <p><?php echo $res['completeOfficeOrBusinessAddress']; ?></p>
                                    <span class="help-block text-muted"><small>No. Street Name / Bldg. Name / Condo / Subdivision / Barangay / City / Town / Province</small></span>
                                </div>
                            </div>
                        </div>

   

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Mobile / Landline No.:</label>
                                    <p><?php echo $res['mobileLandlineNo']; ?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Email Address:</label>
                                    <p><?php echo $res['emailAddress']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name of Gun Club:</label>
                                    <p><?php echo $res['nameOfGunClub']; ?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <p><?php echo $res['address']; ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Type:</label>
                                    <p><?php echo $res['type']; ?></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Make / Model:</label>
                                    <p><?php echo $res['makeModel']; ?></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Caliber:</label>
                                    <p><?php echo $res['calibre']; ?></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Serial Number:</label>
                                    <p><?php echo $res['serialNumber']; ?></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>LIOPF Number:</label>
                                    <p><?php echo $res['LIOPFNumber']; ?></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Type of License:</label>
                                    <p><?php echo $res['typeOfLicense']; ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Number of Years as a Gun Club Member:</label>
                                    <p><?php echo $res['numberOfYearsAsAGunClubMember']; ?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Are you a licensed shooter?</label>
                                    <p><?php echo $res['licensedShooter']; ?></p>
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
                                    <label>Name of MOO Instructor:</label>
                                    <p><?php echo $res['nameOfMOOInstructor']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="row el-element-overlay">
			                        <div class="col-6">
			                        	<div class="card">
			                            <div class="el-card-item">
			                                <div class="el-card-avatar el-overlay-1"> <img src="<?php echo $res['applicantSignature'] ?>" alt="user" />
			                                    <div class="el-overlay">
			                                        <ul class="el-info">
			                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?php echo $res['applicantSignature'] ?>"><i class="icon-magnifier"></i></a></li>
			                                           
			                                        </ul>
			                                    </div>
			                                </div>
			                                <div class="el-card-content">
			                                    <h5 class="box-title">Applicant Signature</h5>
			                                 </div>
			                            </div>
			                        </div>
			                        </div>
			                    </div>
                            </div>
                            
                            <div class="col-6">
                                <div class="row el-element-overlay">
			                        <div class="col-6">
			                        	<div class="card">
			                            <div class="el-card-item">
			                                <div class="el-card-avatar el-overlay-1"> <img src="<?php echo $res['whiteBackgroundPicture'] ?>" alt="user" />
			                                    <div class="el-overlay">
			                                        <ul class="el-info">
			                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?php echo $res['whiteBackgroundPicture'] ?>"><i class="icon-magnifier"></i></a></li>
			                                           
			                                        </ul>
			                                    </div>
			                                </div>
			                                <div class="el-card-content">
			                                    <h5 class="box-title">2" x 2" White Background Picture</h5>
			                                 </div>
			                            </div>
			                        </div>
			                        </div>
			                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>PSMOC Secretary:</label>
                                    <p><?php echo $res['psmocSecretary']; ?></p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>PSMOC President:</label>
                                    <p><?php echo $res['psmocPresident']; ?></p>
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

