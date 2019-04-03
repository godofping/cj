
<?php include('header.php'); ?>
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
                	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=change-password">

                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="form-group">
		                            <label>New Password:</label>
		                            <input type="password" class="form-control form-control-line" required="" name="password"> 
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
