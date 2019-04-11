<?php 
include('header.php');

$db->select('staffs_view','*',NULL,'userId = "' . $_SESSION['userId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Change Password</h3>
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
                    <p>* indicates required fields</p>
                	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=update-password">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Old Password *</label>
                                    <input type="password" class="form-control form-control-line" required="" name="oldPassword"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="form-group">
		                            <label>New Password *</label>
		                            <input type="password" class="form-control form-control-line" required="" name="newPassword"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Confirm New Password *</label>
                                    <input type="password" class="form-control form-control-line" required="" name="confirmNewPassword"> 
                                </div>
                            </div>
                        </div>

                        <input type="password" name="userPassword" value="<?php echo $res['userPassword'] ?>" hidden>

                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>


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
