<?php 
include('connection.php');

$db->select('products_view','*',NULL,'productId = "' . $_GET['productId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
$productSubCategoryId = $res['productSubCategoryId'];
?>


<div class="form-group">
    <label>Sub Categories *</label>
    <select class="form-control" id="productSubCategoryId" required="" name="productSubCategoryId">
    	
    	<?php
        $db->select('product_sub_categories_view','*',NULL,'productCategoryId = "' . $_GET['productCategoryId'] . '"', NULL); 
		$output = $db->getResult();
		foreach ($output as $res) { ?>
    		<option <?php if ($res['productSubCategoryId'] == $productSubCategoryId): ?>
                selected
            <?php endif ?> value="<?php echo $res['productSubCategoryId'] ?>"><?php echo $res['productSubCategory']; ?></option>
    	<?php } ?>

    </select>
</div>
