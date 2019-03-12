<?php 
include('header.php');

$db->select('match_remittance_sanctioning_table','*',NULL,'matchRemittanceSanctioningId = "' . $_GET['matchRemittanceSanctioningId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Edit Match Remittance Sanctioning Form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Match Remittance Sanctioning</a></li>
            <li class="breadcrumb-item">View All</li>
            <li class="breadcrumb-item active">edit</li>
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
                	<form autocomplete="off" class="form-material m-t-40"  method="POST" action="controller.php?from=edit-match-remittance-sanctioning">

       

                		<div class="row">
                        	<div class="col-4">
                        		<div class="form-group">
		                            <label>District:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="district" value="<?php echo $res['district'] ?>"> 
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
		                            <label>Host Club:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="hostClub" value="<?php echo $res['hostClub'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Venue:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="venue" value="<?php echo $res['venue'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Inclusive Dates:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="inclusiveDates" value="<?php echo $res['inclusiveDates'] ?>"> 
		                        </div>
                        	</div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Match Level:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="matchLevel" value="<?php echo $res['matchLevel'] ?>"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Match Administrator:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="matchAdministrator" value="<?php echo $res['matchAdministrator'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Match Master:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="matchMaster" value="<?php echo $res['matchMaster'] ?>"> 
		                        </div>
                        	</div>
                        </div>

     
                        <h5 class="font-weight-bold text-default">Sanctioning Fee</h5>
                        <h5 class="font-weight-normal text-default">Level 1: 50, Level 2: 150, Level 3: 200</h5>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table  table-bordered color-table primary-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Participant</th>
                                                <th>Fee</th>
                                                <th>Amount Due</th>
                                        
                                    
                                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- 1 -->
                                            <tr>
                                                <th class="table-info">Regular Shooters</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="regularShootersParticipant" value="<?php echo $res['regularShootersParticipant'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="regularShootersFee" value="<?php echo $res['regularShootersFee'] ?>"> 
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="regularShootersAmountDue" value="<?php echo $res['regularShootersAmountDue'] ?>"> 
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- 2 -->
                                            <tr>
                                                <th class="table-info">Junior & Super Senior</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="juniorAndSuperSenior" value="<?php echo $res['juniorAndSuperSenior'] ?>"> 
                                                    </div>
                                                </td>
                                                <td class="table-danger"></td>
                                                <td class="table-danger"></td>                                         
                                            </tr>
                                            <!-- 3 -->

                                            <tr>
                                                <th class="table-info">Lawman PNP / AFP & M.O. Below 9pts.</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="lawmanPnp" value="<?php echo $res['lawmanPnp'] ?>"> 
                                                    </div>
                                                </td>
                                                <td class="table-danger"></td>
                                                <td class="table-danger"></td>                                        
                                            </tr>
                                  
                                            <!-- 4 -->

                                            <tr>
                                                <th class="table-info">Lawman in Uniform PNP / AFP & M.O. Above 9 pts.</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="lawmanUniformPnp" value="<?php echo $res['lawmanUniformPnp'] ?>"> 
                                                    </div>
                                                </td>
                                                <td class="table-danger"></td>
                                                <td class="table-danger"></td>                                         
                                            </tr>
                                    
                                            <!-- 5 -->

                                            <tr>
                                                <th class="table-info">Match Official Officiating</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="matchOfficialOfficiating" value="<?php echo $res['matchOfficialOfficiating'] ?>"> 
                                                    </div>
                                                </td>
                                                <td class="table-danger"></td>
                                                <td class="table-danger"></td>                                        
                                            </tr>
                                        
                                            <!-- 6 -->

                                            <tr>
                                                <th class="table-info">Total Participant</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="totalParticipant" value="<?php echo $res['totalParticipant'] ?>"> 
                                                    </div>
                                                </td>
                                                <th class="table-info">Total Sanction Fee</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-line" name="totalSanctionFee" value="<?php echo $res['totalSanctionFee'] ?>"> 
                                                    </div>
                                                </td>                                          
                                            </tr>
                                         
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Bank / Check No.:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="bankCheckNo" value="<?php echo $res['bankCheckNo'] ?>"> 
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label>Amount:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="amount" value="<?php echo $res['amount'] ?>"> 
                                </div>
                            </div>      

                            <div class="col-3">
                                <div class="form-group">
                                    <label>O.R. / P.R#:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="orPr" value="<?php echo $res['orPr'] ?>"> 
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label>Recieved By:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="recievedBy" value="<?php echo $res['recievedBy'] ?>"> 
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Submitted By:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="submittedByMatchMaster" value="<?php echo $res['submittedByMatchMaster'] ?>"> 
                                    <span class="help-block text-muted"><small>Match Master</small></span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Approved By:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="approvedByDistrictManager" value="<?php echo $res['approvedByDistrictManager'] ?>">
                                    <span class="help-block text-muted"><small>District Manager</small></span>
                                </div>
                            </div>      

                        </div>

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>
                        <input type="text" name="matchRemittanceSanctioningId" value="<?php echo $_GET['matchRemittanceSanctioningId'] ?>" hidden>

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
