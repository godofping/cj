<?php 
include('header.php');

$db->select('products_view','*',NULL,'productId = "' . $_GET['productId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Images</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Products</a></li>
            <li class="breadcrumb-item">Catalog</li>
            <li class="breadcrumb-item active">Images</li>
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

    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-body">

	                <h4 class="card-title">Manage images for the product <?php echo $res['productName']; ?></h4>
	                <label for="input-file-now">Image 1 - Thumbnail</label>
	                <input type="file" id="input-file-now" class="dropify" />

	                <label for="input-file-now">Image 2</label>
	                <input type="file" id="input-file-now" class="dropify" />

	                <label for="input-file-now">Image 3</label>
	                <input type="file" id="input-file-now" class="dropify" />


	            </div>
	        </div>
	    </div>
	</div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=add-category">

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Category:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="productCategory"> 
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
<script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script type="text/javascript">
	$('.dropify').dropify();
</script>
