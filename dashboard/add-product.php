
<?php include('header.php'); ?>
<link rel="stylesheet" href="assets/plugins/html5-editor/bootstrap-wysihtml5.css" />
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Add Product</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Products</a></li>
            <li class="breadcrumb-item">Catalog</li>
            <li class="breadcrumb-item active">Add Product</li>
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
                	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=add-product">

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Product Name:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="productName">
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Product Category:</label>
		                            <select class="form-control" name="productCategoryId">
                                        <?php
                                        $db->select('product_categories_table'); 
										$res = $db->getResult();
										foreach ($res as $output) { ?>
											<option value="<?php echo $output['productCategoryId'] ?>"><?php echo $output['productCategory']; ?></option>
										<?php } ?>

                                    </select>
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Product Price:</label>
		                            <input type="number" class="form-control form-control-line" required="" name="productPrice">
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Product Weight:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="productWeight">
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Product Details:</label>
		                            <textarea id="mymce" name="productDetails"></textarea>
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Product SKU:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="productSKU">
		                        </div>
                        	</div>
                        </div>

                        <div class="row">
                        	<div class="col-12">
                        		<div class="form-group">
		                            <label>Men / Women / Not applicable:</label>
		                            <select class="form-control" required="" name="menOrWomenOrNotAppplicable">
                                        <option>Men</option>
                                        <option>Women</option>
                                        <option>Not Applicable</option>

                                    </select>
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
