<?php include('header.php'); ?>

<?php if (!isset($_SESSION['customerId'])){ ?>
  <script type="text/javascript">window.location.replace("index.php");</script>
<?php } else { 


$db->select('orders_view', '*', NULL, 'orderId = "' . base64_decode($_GET['orderId']) . '"');
$res = $db->getResult(); $res = $res[0];

}
?>
	
	<section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <div class="heading text-center">
          <h4>Order Details</h4>
          <hr>
        </div>
      </div>
    </div>
  </section> 

	<div id="content"> 
    
    <form role="form" id="contact_form" class="contact-form" method="post" action="controller.php?from=place-order" autocomplete="off" enctype="multipart/form-data">

      <input type="text" name="orderId" hidden="" value="<?php echo $orderId ?>">

  
    <section class="chart-page padding-top-100 padding-bottom-100">
      <div class="container"> 
        

        <div class="shopping-cart"> 
          
    
          <div class="cart-ship-info">

            <div class="row"> 
              

              <div class="col-sm-5">

              	<h6>Order Information</h6>

      			<h5>Order Number: <b><?php echo $res['orderId'] ?></b></h5>

      			<h5>Delivery Method: <b><?php echo $res['orderDeliveryMethod'] ?></b></h5>

      			<?php if ($res['orderDeliveryMethod'] == 'Pick Up'): ?>

                <h5>Schedule of Pick Up: <b><?php echo date('F d, Y', strtotime($res['orderShippingArrivalOrPickupDate'])); ?></b></h5>
                
                <?php endif ?>

      			<h5>Mode of Payment: <b><?php echo $res['orderModeOfPayment'] ?></b></h5>

      			<h5>Date Placed: <b><?php echo date('F d, Y g:i A', strtotime($res['orderPlacedDate'])) ?></b></h5>

      			<h5>Order Payment Status: <b><?php echo $res['orderPaymentStatus'] ?></b></h5>

      			<h5>Order Status: <b><?php echo $res['orderStatus'] ?></b></h5>

            <h5>Remark:</h5>

      


            <ul class="row">
                <li class="col-sm-12">
                 
                    <textarea class="form-control" readonly="" name="orderRemarks" id="orderRemarks" rows="5" placeholder=""><?php echo $res['orderRemarks'] ?></textarea>
                 

                </li>
            </ul>



                <h6 class="padding-top-30">Billing Information</h6>
                
                <ul class="row">
                  <li class="col-sm-6">
                    <label>First name
                      <input type="text" class="form-control" readonly name="billingFirstName" id="billingFirstName" placeholder="" required="" value="<?php echo $res['billingFirstName'] ?>">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Last name
                      <input type="text" class="form-control" readonly name="billingLastName" id="billingLastName" placeholder="" required="" value="<?php echo $res['billingLastName'] ?>">
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label>Address <small>(building number, street name, city, province)</small>
                      <input type="text" class="form-control" readonly name="billingAddress" id="billingAddress" placeholder="" required="" value="<?php echo $res['billingAddress'] ?>">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Phone Number
                      <input type="text" class="form-control" readonly name="billingPhoneNumber" id="billingPhoneNumber" placeholder="" required="" value="<?php echo $res['billingPhoneNumber'] ?>">
                    </label>
                  </li>

                  <li class="col-sm-6">
                    <label>Email
                      <input type="text" class="form-control" readonly name="billingEmail" id="billingEmail" placeholder="" required="" value="<?php echo $res['billingEmail'] ?>">
                    </label>
                  </li>

                </ul>
          
                
	            <?php if ($res['orderDeliveryMethod'] == 'Shipping'): ?>

            	<h6>Shipping Information</h6>
                
                <ul class="row">
                  <li class="col-sm-6">
                    <label>First name
                      <input type="text" class="form-control" readonly name="orderShipFirstName" id="orderShipFirstName" placeholder="" required="" value="<?php echo $res['orderShipFirstName'] ?>">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Last name
                      <input type="text" class="form-control" readonly name="orderShipLastName" id="orderShipLastName" placeholder="" required="" value="<?php echo $res['orderShipLastName'] ?>">
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label>Address <small>(building number, street name, city, province)</small>
                      <input type="text" class="form-control" readonly name="orderShippingAddress" id="orderShippingAddress" placeholder="" required="" value="<?php echo $res['orderShippingAddress'] ?>">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Phone Number
                      <input type="text" class="form-control" readonly name="orderShipPhoneNumber" id="orderShipPhoneNumber" placeholder="" required="" value="<?php echo $res['orderShipPhoneNumber'] ?>">
                    </label>
                  </li>

                  <li class="col-sm-6">
                    <label>Email
                      <input type="text" class="form-control" readonly name="orderShipEmail" id="orderShipEmail" placeholder="" required="" value="<?php echo $res['orderShipEmail'] ?>">
                    </label>
                  </li>

                </ul>

	            <?php endif ?>

              	</div>

              
         
              <div class="col-sm-7">
                <h6>Your Order</h6>
                <div class="order-place">
                  <div class="order-detail">

                    <?php 
                    $db->select('order_details_view','*',NULL,'orderId = "' . $res['orderId'] . '"', NULL); 
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

                    
            
                    <p class="all-total">Total <span> ₱<?php echo number_format($sum, 2); ?></span></p>

                    <input type="text" name="sum" value="<?php echo $sum ?>" hidden>

                  </div>

                </div>

                <h6 class="padding-top-30">Payments</h6>
                <div class="order-place">


                  
                  <div class="pay-meth">

                  <label class="margin-top-50">Payment Form</label>

                    <ul class="row">
                      <li class="col-sm-4">
                        <label>Amount *
                          <input  style="height: 45px !important;" type="number" step="0.01" min="1" class="form-control" name="paymentAmount" id="paymentAmount" placeholder="" required="" >
                        </label>
                      </li>

                      <li class="col-sm-8">
                        <label>Name of Remittance Center *
                          <input  style="height: 45px !important;" type="text" class="form-control" name="nameOfRemmitanceCenter" id="nameOfRemmitanceCenter" placeholder="" required="" >
                        </label>
                      </li>

                      <li class="col-sm-6">
                        <label>Control Number *
                          <input  style="height: 45px !important;" type="text" class="form-control" name="controlNumber" id="controlNumber" placeholder="" required="" >
                        </label>
                      </li>

                      <li class="col-sm-6">
                        <label>Reciept Image *
                          <input  style="border:none;" type="file" class="form-control" name="paymentRecieptImage" id="paymentRecieptImage" placeholder="" required="" >
                        </label>
                      </li>
                    </ul>

                    <button type="submit" class="btn  btn-dark pull-right margin-top-30">SEND PAYMENT</button>

                  </div>

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

