<?php include('header.php'); ?>

<?php if (!isset($_SESSION['userId'])){ ?>
  <script type="text/javascript">window.location.replace("index.php");</script>
<?php } else { 


$db->select('orders_view', '*', NULL, 'orderId = "' . base64_decode($_GET['orderId']) . '"');
$res = $db->getResult(); $res = $res[0];

$orderTotalAmount = $res['orderTotalAmount'];
$orderPaymentStatus = $res['orderPaymentStatus'];
$orderModeOfPayment = $res['orderModeOfPayment'];
$orderStatus = $res['orderStatus'];
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
    
  <form role="form" id="contact_form" class="contact-form" method="post" action="controller.php?from=payment-form&orderId=<?php echo base64_decode($_GET['orderId']); ?>" autocomplete="off" enctype="multipart/form-data">


  
    <section class="chart-page padding-top-100 padding-bottom-100">
      <div class="container"> 
        

        <div class="shopping-cart"> 
          
    
          <div class="cart-ship-info">

            <div class="row"> 

              <div class="col-md-12">
                <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'cancel-order'): ?>
                  <div class="alert alert-danger" role="alert">
                  Order is cancelled successfully.
                  </div>
                <?php endif ?>
              </div>

              <?php if ($res['orderStatus'] == 'Pending Approval'): ?>
                
              <div class="col-md-12">
                <a href="controller.php?from=cancel-order&orderId=<?php echo $res['orderId'] ?>"><button type="button" class="btn btn-dark pull-left margin-bottom-30">Cancel Order</button></a>
              </div>

   
            <?php endif ?>

         

            <?php if ($res['orderStatus'] != 'Pending Approval'): ?>
              
            <div class="col-md-12">
             <button type="button" class="btn btn-dark pull-left margin-bottom-30" data-toggle="tooltip" title="You can't cancel this order.">Cancel Order</button>
            </div>

   
            <?php endif ?>

              <div class="col-sm-5">

              	<h6>Order Information</h6>

          			<h5>Order Number: <b><?php echo $res['orderId'] ?></b></h5>

          			<h5>Delivery Method: <b><?php echo $res['orderDeliveryMethod'] ?></b></h5>

          			<?php if ($res['orderDeliveryMethod'] == 'Pick Up'): ?>

                  <h5>Schedule of Pick Up: <b><?php echo date('F d, Y', strtotime($res['orderPickupDate'])); ?></b></h5>
                    
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
                  <div class="col-md-12">
                      <a target="_blank" href="print-acknowledgement-receipt.php?orderId=<?php echo base64_encode($res['orderId']) ?>"><button type="button" class="btn btn-dark pull-right ">Print Acknowledgement Receipt</button></a>
                    </div>

                </div>

                <h6 class="padding-top-30">Payments</h6>
                <div class="order-place">


                  
                  <div class="row">
                    <div class="col-md-12">

                      <?php

                      
                      $db->select('payments_view', 'coalesce(sum(paymentAmount),0) as totalAmountPaid', NULL, 'orderId = "' . $res['orderId'] . '" and paymentStatus = "Recieved"');

                      $res = $db->getResult(); $res = $res[0];

                      $totalAmountPaid = $res['totalAmountPaid'];

                      $balance = $orderTotalAmount - $totalAmountPaid;

                      ?>



                      <h5>Total Amount Paid: ₱<?php echo number_format($totalAmountPaid, 2); ?></h5>
                      <h5>Balance: ₱<?php echo number_format($balance, 2); ?></h5>

                      <div class="pay-meth">

                      <?php if ($orderPaymentStatus == 'Unpaid' and $orderModeOfPayment == 'Remittance' and $orderStatus == 'Pending Approval'): ?>
                      <label class="margin-top-50">Payment Form</label>

                      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'payment-sent'): ?>
                        <div class="alert alert-success" role="alert">
                        Payment sent.
                        </div>
                      <?php endif ?>

                      
                        <ul class="row">
                          <li class="col-sm-6">
                            <label>Amount (Please pay ₱<?php echo number_format($balance, 2); ?>)*
                              <input  style="height: 45px !important;" type="number" step="0.01" min="<?php echo $balance; ?>" max="<?php echo $balance; ?>" class="form-control" name="paymentAmount" id="paymentAmount" placeholder="" required="" >
                            </label>
                          </li>

                          <li class="col-sm-6">
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
                            <label>Receipt Image *
                              <input  style="border:none;" type="file" class="form-control" name="paymentRecieptImage" id="paymentRecieptImage" placeholder="" required="" >
                            </label>
                          </li>
                        </ul>

                        <button type="submit" class="btn  btn-dark pull-right margin-top-30">SEND PAYMENT</button>

                        <?php endif ?>
                     

                      </div>
                    </div>

                  </div>

                  <div class="row mt-5">
                    <div class="col-md-12"> 
                      <div class="table-responsive">
                        <table class="table">
                        <thead>

                          <tr>

                            <th scope="col">Amount</th>
                            <th scope="col">Receipt</th>
                            <th></th>
                            <th scope="col">Remittance Center</th>
                            <th scope="col">Control Number</th>
                            <th scope="col">Transaction Date</th>
                            <th></th>
                            <th scope="col">Status</th>
                    

                          </tr>

                        </thead>
                        <tbody>
                        <?php
                          $db->select('payments_view','*',NULL,'orderId = "' . base64_decode($_GET['orderId']) . '"'); 
                          $output = $db->getResult();
                          foreach ($output as $res) { ?>     

                          <tr>

                            <td>₱<?php echo number_format($res['paymentAmount'], 2); ?></td>
                            <td>
                              <?php if ($res['paymentRecieptImage'] == ''): ?>
                                
                              <?php endif ?>
                              <?php if ($res['paymentRecieptImage'] != ''): ?>
                                 <a target="_blank" href="paymentImages/<?php echo $res['paymentRecieptImage']; ?>"><img src="paymentImages/<?php echo $res['paymentRecieptImage']; ?>" class="img-thumbnail"></a>
                              <?php endif ?>
                             
                            </td>
                            <td></td>
                            <td><?php echo $res['nameOfRemmitanceCenter']; ?></td>
                            <td><?php echo $res['controlNumber']; ?></td>
                            <td><?php echo date('F d, Y g:i A',strtotime($res['paymentTransactionDate'])); ?></td>
                            <td></td>
                            <td><?php echo $res['paymentStatus']; ?></td>
                            
                      

                          </tr>

                        <?php } ?>

                        </tbody>
                      </table>
                      </div>
                    </div>

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

<script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>