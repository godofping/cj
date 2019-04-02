<?php include('header.php'); 

?>

  <!-- SUB BANNER -->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <h4>Shopping Cart</h4>
      </div>
    </div>
  </section>


<?php 
  $db->select('order_details_view','count(*) as total',NULL,'customerId = "' . $_SESSION['customerId'] . '" and orderStatus = "On Cart"', NULL); 
  $res = $db->getResult(); $res = $res[0];

  if ($res['total'] > 0) { ?>
    <!-- Content -->
  <div id="content"> 
    
    <!-- PAGES INNER -->
    <section class="padding-top-100 padding-bottom-100 pages-in chart-page">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart text-center">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="text-left">Items</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Total</th>
                <th scope="col">&nbsp;</th>
              </tr>
            </thead>
            <tbody>

              <?php 
              $db->select('order_details_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '" and orderStatus = "On Cart"', NULL); 
              $output = $db->getResult();
              foreach ($output as $res) { 

                $orderId = $res['orderId'];
                ?>
              <form method="POST" action="controller.php?from=update-cart" autocomplete="off">
                <tr>
                    <th class="text-left"> <!-- Media Image --> 
                      <?php 
                        $db->select('product_images_view','*',NULL,'productId = "' . $res['productId'] . '" and isThumbnail = 1', NULL); 
                        $imgoutput = $db->getResult(); $imgoutput = $imgoutput[0];
                      ?>

                      <a href="#." class="item-img"> <img class="media-object" src="dashboard/images/<?php echo $imgoutput['productImageLocation'] ?>" alt=""> </a> 
                      <!-- Item Name -->
                      <div class="media-body">
                        <h6 class="pt-4"><?php echo $res['productName']; ?> (<?php echo $res['productOption1']; ?> <?php echo $res['productOption2']; ?>)</h6>
                      </div>
                    </th>

                    <td>
                      <span class="price"><small>₱</small><?php echo number_format($res['productPrice'], 2); ?></span>
                    </td>

                    <td>
                      <div class="quantity">
                        <input type="number" name="quantity" min="1" max="<?php echo $res['productStock'] ?>" step="1" value="<?php echo $res['quantity'] ?>" class="form-control qty">
                      </div>
                    </td>

                    <td>
                      <span class="price"><small>₱</small><?php echo number_format($res['quantity'] * $res['price'], 2); ?></span>
                    </td>

                    <td>
                        <button class="btn btn-sm" type="submit">update</button>
                       <a href="controller.php?from=remove-cart&productVariationId=<?php echo $res['productVariationId'] ?>" class = "btn btn-sm">remove</a>
                    </td>

                </tr>
                <input type="text" name="orderDetailId" hidden="" value="<?php echo $res['orderDetailId'] ?>">
                <input type="text" name="productPrice" hidden="" value="<?php echo $res['productPrice'] ?>">

              </form>
            <?php } ?>
            
              
              
            </tbody>
          </table>
        </div>

        <div class="row">
            <div class="col-sm-12">
              <?php 
              $db->select('product_categories_table'); 
              $res = $db->getResult();
              $res = $res[0];
              ?>
              <div class="coupn-btn text-right mt-5"> 
                <a href="controller.php?from=empty-cart&orderId=<?php echo $orderId; ?>" class="btn float-left">Empty Cart</a> 

                <a href="shop.php?productCategoryId=<?php echo $res['productCategoryId'] ?>" class="btn btn-inverse">continue shopping</a>
              </div>
            </div>
          </div>

      </div>
    </section>
    
    <!-- PAGES INNER -->
    <section class="padding-top-50 padding-bottom-100 light-gray-bg shopping-cart small-cart">
      <div class="container"> 
        
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
          
          <div class="row"> 
            
            <!-- SUB TOTAL -->
            <div class="col-sm-12">
              <h6 class="text">Grand Total</h6>
              <div class="grand-total">
                <div class="order-detail">
                <?php 
                  $db->select('order_details_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '" and orderStatus = "On Cart"', NULL); 
                  $output = $db->getResult();
                  $sum = 0;
                  foreach ($output as $res) { ?>
                  <p><?php echo $res['productName']; ?> (<?php echo $res['productOption1']; ?> <?php echo $res['productOption2']; ?>) <span>₱<?php echo number_format($res['quantity'] * $res['price'], 2); $sum = $sum + ($res['quantity'] * $res['price']); ?> </span></p>
                <?php } ?>

                  
                  <!-- SUB TOTAL -->
                  <p class="all-total">TOTAL <span> ₱<?php echo number_format($sum, 2); ?></span></p>
                </div>
                <a href="checkout.php" class="btn margin-top-20">Proceed to checkout</a> </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php } else {
$db->select('product_categories_table'); 
$res = $db->getResult(); $res = $res[0];

 ?>
<section class="padding-bottom-100 light-gray-bg shopping-cart small-cart text-center">
      <div class="container"> 
        
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
          <div class="row"> 
            
            <!-- DISCOUNT CODE -->
            <div class="col-sm-12">
              <h6>No items in your cart.</h6>
            
              <div class="coupn-btn"> <a href="shop.php?productCategoryId=<?php echo $res['productCategoryId'] ?>" class="btn btn-inverse ">continue shopping</a> </div>
            </div>
            
 
          </div>
        </div>
      </div>
    </section>
<?php } ?>


  

  <?php include('footer.php'); ?>

