<?php 
include('header.php');

$db->select('users_table','*',NULL,'userId = "' . $_GET['userId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Update User</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
            <li class="breadcrumb-item">Manage</li>
            <li class="breadcrumb-item active">Update User</li>
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
                    <form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=update-user">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="userName" value="<?php echo $res['userName'] ?>"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" class="form-control form-control-line" required="" name="userPassword" value="<?php echo $res['userPassword'] ?>"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Full Name:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="fullName" value="<?php echo $res['fullName'] ?>"> 
                                </div>
                            </div>
                        </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>

                    <input type="text" name="userId" value="<?php echo $res['userId'] ?>" hidden>


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
