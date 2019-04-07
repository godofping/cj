<?php 
include('dashboard/connection.php');

$db->select('product_variations_view','*',NULL,'productVariationId = "' . $_POST['productVariationId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];

$onCartQuantity = 0;
$additionalString = "";

if (isset($_SESSION['userId'])) {

$db->select('orders_view', '*', NULL, 'userId = "' . $_SESSION['userId']  .'" and orderStatus = "On Cart"');
$res1 = $db->getResult(); 

if (!empty($res1)) {

$res1 = $res1[0];
$db->select('order_details_view', '*', NULL, 'orderId = "' . $res1['orderId']  .'"');
$res1 = $db->getResult();

if (!empty($res1)) {

$res1 = $res1[0];
$onCartQuantity = $res1['quantity'];
$additionalString = $onCartQuantity . " piece(s) is already on your cart.";


}
}

}


?>

<li class="col-md-12">     
  <span class="price" style="margin-top: -5px;"><small>₱</small><?php echo number_format($res['productPrice'],2); ?></span>
  <br>
<p><?php echo $res['productStock']; ?> piece(s) available. <?php echo $additionalString; ?></p>

</li>

<li class="col-md-12">                  
	<!-- Quantity -->
	<div class="quinty">
	  <button type="button" class="quantity-left-minus"  data-type="minus" data-field=""> <span>-</span> </button>
	  <input type="number" min="1" id="quantity" name="quantity" class="form-control input-number" value="1">
	  <button type="button" class="quantity-right-plus" data-type="plus" data-field=""> <span>+</span> </button>
	</div>
</li>

<input type="text" hidden name="productPrice" value="<?php echo $res['productPrice'] ?>">

<!-- ADD TO CART -->
<li class="col-md-12">
	<button <?php if (!isset($_SESSION['userId'])): ?>
		data-toggle="tooltip" title="Please login first to add this item to the cart." type="button"
	<?php endif ?> <?php if (isset($_SESSION['userId'])): ?>
		type="submit"
	<?php endif ?>  class="btn" <?php if ($res['productStock'] == 0): ?>
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


       if (quantity < <?php echo ($res['productStock'] - $onCartQuantity); ?>) {
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

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>