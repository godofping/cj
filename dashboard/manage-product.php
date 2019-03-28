<?php 
include('header.php');

$db->select('product_images_view','*',NULL,'productId = "' . $_GET['productId'] . '"', NULL); 
$res = $db->getResult();


?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Products</a></li>
            <li class="breadcrumb-item">Catalog</li>
            <li class="breadcrumb-item active">Manage</li>
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
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-body">
	            	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=product-images" enctype="multipart/form-data">

	                <h4 class="card-title">Manage images, options and stocks for the product <b><?php echo $res[0]['productName']; ?></b></h4>
	                <h5>You can add only 3 images.</h5>

	                <div class="row">
	                	<div class="col-md-4">
	                		<br>
			                <label for="input-file-now">Image 1 - Thumbnail</label>
			                <input type="file" id="input-file-now" class="dropify" name="image1" data-default-file="images/<?php echo $res[0]['productImageLocation'] ?>" data-show-remove="false"/>
			                <input type="text" name="productImageId1" hidden="" value="<?php echo $res[0]['productImageId'] ?>">
	                	</div>

	                	<div class="col-md-4">
	                		<br>
			                <label for="input-file-now">Image 2</label>
			                <input type="file" id="input-file-now" class="dropify" name="image2" data-default-file="images/<?php echo $res[1]['productImageLocation'] ?>" data-show-remove="false"/>
			                <input type="text" name="productImageId2" hidden="" value="<?php echo $res[1]['productImageId'] ?>">
	                	</div>

	                	<div class="col-md-4">
	                		<br>
			                <label for="input-file-now">Image 3</label>
			                <input type="file" id="input-file-now" class="dropify" name="image3" data-default-file="images/<?php echo $res[2]['productImageLocation'] ?>" data-show-remove="false"/>
			                <input type="text" name="productImageId3" hidden="" value="<?php echo $res[2]['productImageId'] ?>">
	                	</div>
	                </div>

	                <input type="text" name="productId" hidden="" value="<?php echo $res[0]['productId'] ?>">

	                <div class="row">
	                	<div class="col-md-12">
	                		<button type="submit" class="btn btn-info waves-effect waves-light m-r-10 pull-right mt-4">Save Changes</button>
	                	</div>
	                </div>

                    </form>

                    <hr class="pt-2 pb-2">

                    <p>* indicates required fields.</p>
                    <h5>Add options and stocks</h5>
                    <form autocomplete="off" class="form-material mt-2" method="POST" action="controller.php?from=add-product-variation">

                    <?php $db->select('products_view','*',NULL,'productId = "' . $_GET['productId'] . '"', NULL); 
                    $res = $db->getResult(); $res = $res[0];
                    ?>



                    <div class="row">
                    	<div class="col-md-3">
                    		<div class="form-group">
	                            <label>Option 1 <small>(e.g. Red) *</small></label>
	                            <input type="text" required="" class="form-control form-control-line" name="productOption1">
	                        </div>
                    	</div>

                    	<div class="col-md-3">
                    		<div class="form-group">
	                            <label>Option 2 <small>(e.g. Small)</small></label>
	                            <input type="text" class="form-control form-control-line" name="productOption2">
	                        </div>
                    	</div>

                    	<div class="col-md-3">
                    		<div class="form-group">
	                            <label>Price *</label>
	                            <input type="number" step="0.01" min="1" required="" class="form-control form-control-line" name="productPrice">
	                        </div>
                    	</div>

                    	<div class="col-md-3">
                    		<button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right mt-4">Add</button>
                    	</div>
                    </div>

                    <input type="text" name="productId" hidden="" value="<?php echo $_GET['productId'] ?>">

                    </form>

                    <hr class="pt-2 pb-2">
                    <h5>List of options for this product</h5>

                    <?php 
                    $db->select('product_variations_view','count(*) as total',NULL,'productId = "' . $_GET['productId'] . '"', NULL); 
                    $output = $db->getResult(); $output = $output[0];

                    if ($output['total'] == 0) {
                        echo "<p>Please add option.</p>";
                    }


					$db->select('product_variations_view','*',NULL,'productId = "' . $_GET['productId'] . '"', NULL); 
					$output = $db->getResult();
					foreach ($output as $res) { ?>
					<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=update-product-variation">
					<div class="row">
                    	<div class="col-md-3">
                    		<div class="form-group">
	                            <label>Option 1 <small>(e.g. Red)</small> *</label>
	                            <input type="text" class="form-control form-control-line" name="productOption1" value="<?php echo $res['productOption1'] ?>">
	                        </div>
                    	</div>

                    	<div class="col-md-3">
                    		<div class="form-group">
	                            <label>Option 2 <small>(e.g. Small)</small> *</label>
	                            <input type="text" class="form-control form-control-line" name="productOption2" value="<?php echo $res['productOption2'] ?>">
	                        </div>
                    	</div>

                    	<div class="col-md-3">
                    		<div class="form-group">
	                            <label>Price *</label>
	                            <input type="number" step="0.01" min="0" class="form-control form-control-line" name="productPrice" value="<?php echo $res['productPrice'] ?>">
	                        </div>
                    	</div>


                    	<div class="col-md-3">

                    		<a href="controller.php?from=delete-product-variation&productVariationId=<?php echo $res['productVariationId'] ?>&productId=<?php echo $res['productId'] ?>"><button type="button" class="btn btn-xs btn-danger waves-effect waves-light m-r-10 pull-right mt-4">Delete</button></a>

                    		<button type="submit" class="btn btn-xs btn-success waves-effect waves-light m-r-10 pull-right mt-4">Update</button>

                            <a href="manage-stocks.php?productVariationId=<?php echo $res['productVariationId'] ?>"><button type="button" class="btn btn-xs btn-info waves-effect waves-light m-r-10 pull-right mt-4">Manage Stocks</button></a>

                    	</div>
                    </div>
                    <input type="text" name="productVariationId" hidden value="<?php echo $res['productVariationId'] ?>">
                    <input type="text" name="productId" hidden="" value="<?php echo $res['productId'] ?>">
                	</form>

						
					<?php } ?>



					

        
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
