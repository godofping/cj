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
    
    <form role="form" id="contact_form" class="contact-form" method="post" action="controller.php?from=place-order" autocomplete="off" enctype="multipart/form-data">

      <input type="text" name="orderId" hidden="" value="<?php echo $orderId ?>">

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
                      <input type="text" class="form-control" name="billingEmail" id="billingEmail" placeholder="" required="" value="<?php echo $res['customerEmail'] ?>">
                    </label>
                  </li>

                </ul>
          
                
               <div id="shippingInformation"></div>

       
              </div>

              
              <!-- SUB TOTAL -->
              <div class="col-sm-7">
                <h6>Your Order</h6>
                <div class="order-place">
                  <div class="order-detail">

                    <?php 
                    $db->select('order_details_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '" and orderStatus = "On Cart"', NULL); 
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


                      <li class="mb-3">
                        <label>Delivery Method </label>
                          <select class="form-control" required="" name="deliveryMethod" id="deliveryMethod">
                            <option selected="" disabled="" value="">Please select option.</option>
                            <option>Shipping</option>
                            <option>Pick Up</option>
                            
                          </select>
                      </li>

                      <div id="pickUpDateDiv"></div>

                      <li>
                        <label>Mode of Payment</label>
                        
                      </li>

                      <li>
                        <div class="radio">
                          <input type="radio" name="orderModeOfPayment" id="radio1" value="Remittance" checked>
                          <label for="radio1"> Remittance </label>
                        </div>
                        <p>If you choose this option, you are obligated to fill up the payment form.</p>
                      </li>

                      <li>
                        <div class="radio">
                          <input type="radio" name="orderModeOfPayment" id="radio2" value="Walk In">
                          <label for="radio2"> Walk In</label>
                        </div>
                      </li>

                      <div id="paymentFormDiv"></div>
                      

                    </ul>
                    <button type="submit" class="btn  btn-dark pull-right margin-top-30">PLACE ORDER</button> </div>
                </div>
              </div>

            

            </div>
          </div>
        </div>
      </div>
    </section>
    </form>
    
  </div>

  
<?php include('footer.php'); ?>

<script type="text/javascript">

  $('#orderShippingArrivalOrPickupDateLI').hide();

  $('#deliveryMethod').change(function(){

    var deliveryMethod = $(this).children("option:selected").val();
    deliveryMethodFunction(deliveryMethod);
    
  });


  function deliveryMethodFunction(deliveryMethod)
  {
    if (deliveryMethod == 'Shipping') {
      $.post("inc-shipping-information.php", { deliveryMethod:deliveryMethod, } , function(data, status){
          $('#shippingInformation').html(data);
          $('#pickUpDateDiv').html("");
          
          
          
        });
      }
      else if (deliveryMethod == 'Pick Up'){
          $('#shippingInformation').html("");

          $.post("inc-pick-up-date.php", function(data, status){
            $('#pickUpDateDiv').html(data);
          });


    
      }
  }


  var orderModeOfPayment = $("input[name='orderModeOfPayment']:checked").val();
  
  modeOfPaymentMethod(orderModeOfPayment);

  $("input[name='orderModeOfPayment']").change(function(){

    orderModeOfPayment = $("input[name='orderModeOfPayment']:checked").val();
    modeOfPaymentMethod(orderModeOfPayment);
    
  });


  function modeOfPaymentMethod(orderModeOfPayment){
    if (orderModeOfPayment == 'Remittance') {
      $.post("inc-payment-form.php", { orderModeOfPayment:orderModeOfPayment, } , function(data, status){
          $('#paymentFormDiv').html(data);          
        });
    }else{
        $('#paymentFormDiv').html("");   
    }
  }


</script>