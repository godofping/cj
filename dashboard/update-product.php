<?php 
include('header.php');

$db->select('products_view','*',NULL,'productId = "' . $_GET['productId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<link rel="stylesheet" href="assets/plugins/html5-editor/bootstrap-wysihtml5.css" />
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Update Product</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Products</a></li>
            <li class="breadcrumb-item">Catalog</li>
            <li class="breadcrumb-item active">Update Product</li>
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
                	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=update-product">

                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="form-group">
		                            <label>Product Name *</label>
		                            <input type="text" class="form-control form-control-line" required="" name="productName" value="<?php echo $res['productName'] ?>">
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="form-group">
		                            <label>Product Category *</label>
		                            <select class="form-control" id="productCategoryId" required="" name="productCategoryId">
                                        <option value="<?php echo $res['productCategoryId'] ?>"><?php echo $res['productCategory']; ?></option>
                                        <?php
                                        $db->select('product_categories_view'); 
										$output = $db->getResult();
										foreach ($output as $res1) { ?>
											<option value="<?php echo $res1['productCategoryId'] ?>"><?php echo $res1['productCategory']; ?></option>
										<?php } ?>

                                    </select>
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div id="subCategoriesDiv"></div>
                            </div>
                        </div>

                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="form-group">
		                            <label>Product Details *</label>
		                            <textarea id="mymce" name="productDetails"><?php echo $res['productDetails']; ?></textarea>
		                        </div>
                        	</div>
                        </div>

                       

                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>

                    <input type="text" name="productId" value="<?php echo $res['productId'] ?>" hidden>


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
<!-- wysuhtml5 Plugin JavaScript -->
<script src="assets/plugins/tinymce/tinymce.min.js"></script>

<script>
    $(document).ready(function() {

    if ($("#mymce").length > 0) {
        tinymce.init({
            selector: "textarea#mymce",
            theme: "modern",
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

        });
    }
});
</script>

<script type="text/javascript">
    
        populateSubCategories();

        $('#productCategoryId').change(function(){

            populateSubCategories();
        });

        function populateSubCategories(){

            var productCategoryId = $('#productCategoryId').val();

            $.get("inc-update-subcategories.php",{productCategoryId: productCategoryId, productId: <?php echo $res['productId']; ?>},function(data, status){
                $('#subCategoriesDiv').html(data);
            });
        }

</script>

    
