<?php include('header.php'); ?>

<?php if (!isset($_SESSION['customerId'])){ ?>
  <script type="text/javascript">window.location.replace("index.php");</script>
<?php } else { 

$db->select('customers_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];

 } ?>

  <!-- SUB BANNER -->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <h4>Checkout your order</h4>
      </div>
    </div>
  </section>


<!-- Content -->
  <div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-100 padding-bottom-100">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-5">
                <h6>Billing Information</h6>
                <form role="form" id="contact_form" class="contact-form" method="post" action="controller.php?from=place-order" autocomplete="off">
                <ul class="row">
                  <li class="col-sm-6">
                    <label>First name *
                      <input type="text" class="form-control" name="billingFirstName" id="billingFirstName" placeholder="" required="" value="<?php echo $res['customerFirstName'] ?>">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Last name *
                      <input type="text" class="form-control" name="billingLastName" id="billingLastName" placeholder="" required="" value="<?php echo $res['customerLastName'] ?>">
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label>Address * <small>(building number, street name, city, province)</small>
                      <input type="text" class="form-control" name="billingAddress" id="billingAddress" placeholder="" required="" value="<?php echo $res['customerAddress'] ?>">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Phone Number *
                      <input type="text" class="form-control" name="billingPhoneNumber" id="billingPhoneNumber" placeholder="" required="" value="<?php echo $res['customerPhoneNumber'] ?>">
                    </label>
                  </li>

                  <li class="col-sm-6">
                    <label>Email *
                      <input type="text" class="form-control" name="billingEmail" id="billingEmail" placeholder="" required="" value="<?php echo $res['customerPhoneNumber'] ?>">
                    </label>
                  </li>

          <!--         <li class="col-md-12">
                    <div class="checkbox margin-0 ">
                      <input id="checkbox1" class="styled" type="checkbox">
                      <label for="checkbox1"> Ship to a different address </label>
                    </div>
                  </li>
 -->

            
                </ul>
          
                
                <!-- SHIPPING info -->
                <h6 class="margin-top-50">Shipping Information</h6>
 
                <ul class="row">
                  <li class="col-sm-6">
                    <label>First name *
                      <input type="text" class="form-control" name="customerFirstName" id="customerFirstName" placeholder="" required="">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Last name *
                      <input type="text" class="form-control" name="customerLastName" id="customerLastName" placeholder="" required="">
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label>Address * <small>(building number, street name, city, province)</small>
                      <input type="text" class="form-control" name="customerAddress" id="customerAddress" placeholder="" required="">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Phone Number *
                      <input type="text" class="form-control" name="customerPhoneNumber" id="customerPhoneNumber" placeholder="" required="">
                    </label>
                  </li>

            
                </ul>
       
              </div>
              
              <!-- SUB TOTAL -->
              <div class="col-sm-7">
                <h6>Your Order</h6>
                <div class="order-place">
                  <div class="order-detail">

                    <?php 
                    $db->select('order_details_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '"', NULL); 
                    $output = $db->getResult();
                    $sum = 0;
                    foreach ($output as $res) { ?>
                    
                    <p>
                      <?php echo $res['productName']; ?> (<?php echo $res['productOption1']; ?> <?php echo $res['productOption2']; ?>) 

                      <span>₱<?php echo number_format($res['quantity'] * $res['price'], 2); $sum = $sum + ($res['quantity'] * $res['price']); ?></span>
                    </p>

                  <?php } ?>

                    
                    <!-- SUB TOTAL -->
                    <p class="all-total">TOTAL COST <span> ₱<?php echo number_format($sum, 2); ?></span></p>

                  </div>
                  <div class="pay-meth">
                    <ul>
                      <li>
                        <div class="radio">
                          <input type="radio" name="radio1" id="radio1" value="option1" checked>
                          <label for="radio1"> DIRECT BANK TRANSFER </label>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam erat turpis, pellentesque non leo eget, pulvinar pretium arcu. Mauris porta elit non.</p>
                      </li>
                      <li>
                        <div class="radio">
                          <input type="radio" name="radio1" id="radio2" value="option2">
                          <label for="radio2"> CASH ON DELIVERY</label>
                        </div>
                      </li>
                      <li>
                        <div class="radio">
                          <input type="radio" name="radio1" id="radio3" value="option3">
                          <label for="radio3"> CHEQUE PAYMENT </label>
                        </div>
                      </li>
                      <li>
                        <div class="radio">
                          <input type="radio" name="radio1" id="radio4" value="option4">
                          <label for="radio4"> PAYPAL </label>
                        </div>
                      </li>
                      <li>
                        <div class="checkbox">
                          <input id="checkbox3-4" class="styled" type="checkbox">
                          <label for="checkbox3-4"> I’VE READ AND ACCEPT THE <span class="color"> TERMS & CONDITIONS </span> </label>
                        </div>
                      </li>
                    </ul>
                    <a href="#." class="btn  btn-dark pull-right margin-top-30">PLACE ORDER</a> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>




  

  <?php include('footer.php'); ?>

