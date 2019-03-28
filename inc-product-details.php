<?php 
include('dashboard/connection.php');

$db->select('product_variations_view','*',NULL,'productVariationId = "' . $_POST['productVariationId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];

?>

<li class="col-md-6">     
  <span class="price" style="margin-top: -5px;"><small>₱</small><?php echo number_format($res['productPrice'],2); ?></span>
  <br>
<p><?php echo $res['productStock']; ?> piece(s) available</p>

</li>

<li class="col-md-12">                  
	<!-- Quantity -->
	<div class="quinty">
	  <button type="button" class="quantity-left-minus"  data-type="minus" data-field=""> <span>-</span> </button>
	  <input type="number" min="1" id="quantity" name="quantity" class="form-control input-number" value="1">
	  <button type="button" class="quantity-right-plus" data-type="plus" data-field=""> <span>+</span> </button>
	</div>
</li>

<!-- ADD TO CART -->
<li class="col-md-12">
	<button type="submit" class="btn" <?php if ($res['productStock'] == 0): ?>
		disabled
	<?php endif ?>>ADD TO CART</button>
</li>


<script type="text/javascript">
var quantitiy=0;
$('.quantity-right-plus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
       // If is not undefined


       if (quantity < <?php echo $res['productStock']; ?>) {
          $('#quantity').val(quantity + 1);
       }  

});
$('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        // If is not undefined
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
});
</script>