<?php 
include('header.php');

$db->select('staffs_view','*',NULL,'userId = "' . $_GET['userId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Update Staff</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Staffs</a></li>
            <li class="breadcrumb-item">Manage</li>
            <li class="breadcrumb-item active">Update Staff</li>
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
                    <p>* indicates required fields</p>
                    <form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=update-staff&userId=<?php echo $_GET['userId'] ?>">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" class="form-control form-control-line" required="" name="userEmail" value="<?php echo $res['userEmail'] ?>"> 
                                </div>
                            </div>
                        </div>

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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="password" class="form-control form-control-line" required="" name="userPassword" value=""> 
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
