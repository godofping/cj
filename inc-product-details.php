<?php include('dashboard/connection.php') ?>

<li class="col-sm-6">                  
	<!-- Quantity -->
	<div class="quinty">
	  <button type="button" class="quantity-left-minus"  data-type="minus" data-field=""> <span>-</span> </button>
	  <input type="number" max="2" id="quantity" name="quantity" class="form-control input-number" value="1">
	  <button type="button" class="quantity-right-plus" data-type="plus" data-field=""> <span>+</span> </button>
	</div>
</li>

<!-- ADD TO CART -->
<li class="col-sm-6">
	<button type="submit" class="btn">ADD TO CART</button>
</li>


<script type="text/javascript">
var quantitiy=0;
$('.quantity-right-plus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
       // If is not undefined


       if (quantity < 6) {
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