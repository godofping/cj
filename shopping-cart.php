<?php include('header.php'); 

?>


  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <div class="heading text-center">
          <h4>Shopping Cart</h4>
          <hr>
        </div>
      </div>
    </div>
  </section>  
  


<?php 
  $db->select('order_details_view','count(*) as total',NULL,'userId = "' . $_SESSION['userId'] . '" and orderStatus = "On Cart"', NULL); 
  $res = $db->getResult(); $res = $res[0];

  if ($res['total'] > 0) { 

  $counter = 0;
  $string = "";

  $db->select('order_details_view','*',NULL,'userId = "' . $_SESSION['userId'] . '" and orderStatus = "On Cart"', NULL); 
  $output = $db->getResult();

  foreach ($output as $res) {

    if ($res['productStock'] < $res['quantity']) {
      $string = $res['productName'] . " (" . $res['productOption1'] . " " . $res['productOption2'] . ") is removed automatically from your cart because the stocks is low.<br>";
      $counter++;

      $db->delete('order_details_table','productVariationId=' . $res['productVariationId']);
      $res = $db->getResult();


    }

    
  }




  ?>
    <!-- Content -->
  <div id="content"> 
    
    <!-- PAGES INNER -->
    <section class="padding-top-100 padding-bottom-100 pages-in chart-page">
      <div class="container"> 

        <?php if ($counter > 0): ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $string; ?>
        </div>
        <?php endif ?>

        <!-- Payments Steps -->
        <div class="shopping-cart text-center">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="text-left">Items</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">&nbsp;</th>
              </tr>
            </thead>
            <tbody>

              <?php 
              $db->select('order_details_view','*',NULL,'userId = "' . $_SESSION['userId'] . '" and orderStatus = "On Cart"', NULL); 
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

                      <a href="product-details.php?productId=<?php echo $res['productId'] ?>" class="item-img"> <img class="media-object" src="dashboard/images/<?php echo $imgoutput['productImageLocation'] ?>" alt=""> </a> 
                      <!-- Item Name -->
                      <div class="media-body">
                        <p class="pt-4"><?php echo $res['productName']; ?> (<?php echo $res['productOption1']; ?> <?php echo $res['productOption2']; ?>)</p>
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
                      <ol>
                        <li><button class="btn btn-sm mb-2" type="submit">update</button></li>
                        <li><a href="controller.php?from=remove-cart&productVariationId=<?php echo $res['productVariationId'] ?>"><button class="btn btn-sm mb-2" type="button">remove</button></a></li>
                      </ol>
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
                  $db->select('order_details_view','*',NULL,'userId = "' . $_SESSION['userId'] . '" and orderStatus = "On Cart"', NULL); 
                  $output = $db->getResult();
                  $sum = 0;
                  foreach ($output as $res) { ?>

                    <p>

                      <span>₱<?php echo number_format($res['quantity'] * $res['price'], 2); $sum = $sum + ($res['quantity'] * $res['price']); ?> </span>

                      <?php echo $res['productName']; ?> (<?php echo $res['productOption1']; ?> <?php echo $res['productOption2']; ?>) <br>
                      Quantity: <?php echo $res['quantity']; ?> <br>
                      Price: ₱<?php echo number_format($res['price'], 2); ?> each <br>

                      
                    </p>
                  
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

