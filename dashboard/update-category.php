<?php 
include('header.php');

$db->select('product_categories_table','*',NULL,'productCategoryId = "' . $_GET['productCategoryId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Update Category</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Products</a></li>
            <li class="breadcrumb-item">Categories</li>
            <li class="breadcrumb-item active">Update Category</li>
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
                	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=update-category">

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Category:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="productCategory" value="<?php echo $res['productCategory'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>

                    <input type="text" name="productCategoryId" value="<?php echo $res['productCategoryId'] ?>" hidden>


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
