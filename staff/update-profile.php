<?php 
include('header.php');

$db->select('staffs_view','*',NULL,'userId = "' . $_SESSION['userId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Update Profile</h3>
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
                	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=update-profile">

                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="form-group">
		                            <label>First Name *</label>
		                            <input type="text" class="form-control form-control-line" required="" name="userFirstName" value="<?php echo $res['userFirstName'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Last Name *</label>
                                    <input type="text" class="form-control form-control-line" required="" name="userLastName" value="<?php echo $res['userLastName'] ?>"> 
                                </div>
                            </div>
                        </div>




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
