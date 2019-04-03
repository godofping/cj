<?php 
include('header.php');

$db->select('gun_club_affiliation_table','*',NULL,'gunClubAffiliationId = "' . $_GET['gunClubAffiliationId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">View Gun Club Affiliation Form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Gun Club Affiliation</a></li>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name of Gun Club:</label>
                                    <p><?php echo $res['nameOfGunClub']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Office Address:</label>
                                    <p><?php echo $res['officeAddress']; ?></p>
                                    <span class="help-block text-muted"><small>No. and Street Name / Name of Building / Condo / Subdivision / Barangay / Province</small></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Firing Range Location:</label>
                                    <p><?php echo $res['firingRangeLocation']; ?></p>
                                    <span class="help-block text-muted"><small>Street Name / Subdivision / Barangay / City / Province</small></span>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Landline No.:</label>
                                    <p><?php echo $res['landlineNo']; ?></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile No.:</label>
                                    <p><?php echo $res['mobileNo']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contact Person:</label>
                                    <p><?php echo $res['contactPerson']; ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email Address:</label>
                                    <p><?php echo $res['emailAddress']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SEC Registration No.:</label>
                                    <p><?php echo $res['secRegistrationNo']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name of Gun Club Secretary:</label>
                                    <p><?php echo $res['nameOfGunClubSecretary']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name of Gun Club President:</label>
                                    <p><?php echo $res['nameOfGunClubPresident']; ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>PSMOC District Manager:</label>
                                    <p><?php echo $res['psmocDistrictManager']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>PSMOC Zone Director:</label>
                                    <p><?php echo $res['psmocZoneDirector']; ?></p> 
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>PSMOC Secretary:</label>
                                    <p><?php echo $res['psmocSecretary']; ?></p> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>PSMOC President:</label>
                                    <p><?php echo $res['psmocPresident']; ?></p>
                                </div>
                            </div>
                        </div>



                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>

        
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
         
<?php include('footer.php'); ?>
