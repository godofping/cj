<?php
include('connection.php');
?>


<div class="form-group">
    <label>Sub Categories *</label>
    <select class="form-control" id="productSubCategoryId" required="" name="productSubCategoryId">
    	<?php
        $db->select('product_sub_categories_view','*',NULL,'productCategoryId = "' . $_GET['productCategoryId'] . '"', NULL); 
		$output = $db->getResult();
		foreach ($output as $res) { ?>
    		<option value="<?php echo $res['productSubCategoryId'] ?>"><?php echo $res['productSubCategory']; ?></option>
    	<?php } ?>

    </select>
</div>
