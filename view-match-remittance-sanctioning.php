<?php 
include('header.php');

$db->select('match_remittance_sanctioning_table','*',NULL,'matchRemittanceSanctioningId = "' . $_GET['matchRemittanceSanctioningId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">View Match Remittance Sanctioning Form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Match Remittance Sanctioning</a></li>
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
                        	<div class="col-4">
                        		<div class="form-group">
		                            <label>District:</label>
		                            <p><?php echo $res['district']; ?></p>
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
		                            <label>Host Club:</label>
		                            <p><?php echo $res['hostClub']; ?></p> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Venue:</label>
		                            <p><?php echo $res['venue']; ?></p>
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-6">
                        		<div class="form-group">
		                            <label>Inclusive Dates:</label>
		                            <p><?php echo $res['inclusiveDates']; ?></p>
		                        </div>
                        	</div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Match Level:</label>
                                    <p><?php echo $res['matchLevel']; ?></p> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Match Administrator:</label>
		                            <p><?php echo $res['matchAdministrator']; ?></p>
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Match Master:</label>
		                            <p><?php echo $res['matchMaster']; ?></p>
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
                                                        <p><?php echo $res['regularShootersParticipant']; ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <p><?php echo $res['regularShootersFee']; ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <p><?php echo $res['regularShootersAmountDue']; ?></p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- 2 -->
                                            <tr>
                                                <th class="table-info">Junior & Super Senior</th>
                                                <td>
                                                    <div class="form-group">
                                                        <p><?php echo $res['juniorAndSuperSenior']; ?></p>
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
                                                        <p><?php echo $res['lawmanPnp']; ?></p>
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
                                                        <p><?php echo $res['lawmanUniformPnp']; ?></p>
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
                                                        <p><?php echo $res['matchOfficialOfficiating']; ?></p> 
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
                                                        <p><?php echo $res['totalParticipant']; ?></p>
                                                    </div>
                                                </td>
                                                <th class="table-info">Total Sanction Fee</th>
                                                <td>
                                                    <div class="form-group">
                                                        <p><?php echo $res['totalSanctionFee']; ?></p>
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
                                    <p><?php echo $res['bankCheckNo']; ?></p>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label>Amount:</label>
                                    <p><?php echo $res['amount']; ?></p>
                                </div>
                            </div>      

                            <div class="col-3">
                                <div class="form-group">
                                    <label>O.R. / P.R#:</label>
                                    <p><?php echo $res['orPr']; ?></p>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label>Recieved By:</label>
                                    <p><?php echo $res['recievedBy']; ?></p>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Submitted By:</label>
                                    <p><?php echo $res['submittedByMatchMaster']; ?></p>
                                    <span class="help-block text-muted"><small>Match Master</small></span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Approved By:</label>
                                    <p><?php echo $res['approvedByDistrictManager']; ?></p>
                                    <span class="help-block text-muted"><small>District Manager</small></span>
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
