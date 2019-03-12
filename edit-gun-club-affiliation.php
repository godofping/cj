<?php 
include('header.php');

$db->select('gun_club_affiliation_table','*',NULL,'gunClubAffiliationId = "' . $_GET['gunClubAffiliationId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Edit Gun Club Affiliation Form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Gun Club Affiliation</a></li>
<!--             <li class="breadcrumb-item">pages</li> -->
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
                	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=edit-gun-club-affiliation">

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Name of Gun Club:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="nameOfGunClub" value="<?php echo $res['nameOfGunClub'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Office Address:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="officeAddress" value="<?php echo $res['officeAddress'] ?>"> 
                                    <span class="help-block text-muted"><small>No. and Street Name / Name of Building / Condo / Subdivision / Barangay / Province</small></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Firing Range Location:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="firingRangeLocation" value="<?php echo $res['firingRangeLocation'] ?>"> 
                                    <span class="help-block text-muted"><small>Street Name / Subdivision / Barangay / City / Province</small></span>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                        	<div class="col-6">
	                    		<div class="form-group">
		                            <label>Landline No.:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="landlineNo" value="<?php echo $res['landlineNo'] ?>"> 
		                        </div>
	                    	</div>

	                    	<div class="col-6">
                        		<div class="form-group">
		                            <label>Mobile No.:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="mobileNo" value="<?php echo $res['mobileNo'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
	                    		<div class="form-group">
		                            <label>Contact Person:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="contactPerson" value="<?php echo $res['contactPerson'] ?>"> 
		                        </div>
	                    	</div>
                        </div>


                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Email Address:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="emailAddress" value="<?php echo $res['emailAddress'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>SEC Registration No.:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="secRegistrationNo" value="<?php echo $res['secRegistrationNo'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Name of Gun Club Secretary:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="nameOfGunClubSecretary" value="<?php echo $res['nameOfGunClubSecretary'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Name of Gun Club President:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="nameOfGunClubPresident" value="<?php echo $res['nameOfGunClubPresident'] ?>"> 
		                        </div>
                        	</div>
                        </div>


                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>PSMOC District Manager:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="psmocDistrictManager" value="<?php echo $res['psmocDistrictManager'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>PSMOC Zone Director:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="psmocZoneDirector" value="<?php echo $res['psmocZoneDirector'] ?>"> 
		                        </div>
                        	</div>
                        </div>


                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>PSMOC Secretary:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="psmocSecretary" value="<?php echo $res['psmocSecretary'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>PSMOC President:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="psmocPresident" value="<?php echo $res['psmocPresident'] ?>"> 
		                        </div>
                        	</div>
                        </div>



                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>

                    <input type="text" name="gunClubAffiliationId" value="<?php echo $res['gunClubAffiliationId'] ?>" hidden>


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
