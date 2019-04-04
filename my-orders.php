<?php 
include('header.php');

$db->select('customers_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- PAGES INNER -->
    <section class="contact padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="contact-form">
          
          <div class="row">
            <div class="col-md-12">
              <div class="heading text-center margin-bottom-60">
                <h4>My Orders</h4>
                <hr>
              </div>
            </div>
            


            <div class="col-md-12"> 
              <div class="table-responsive">
                <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Order number</th>
                    <th scope="col">Placed on</th>
                    <th scope="col">Mode of Payment</th>
                    <th scope="col">Delivery Method</th>
                    <th scope="col">Items ordered</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $db->select('orders_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '" and orderStatus <> "On Cart"', NULL); 
                  $output = $db->getResult();
                  foreach ($output as $res) { ?>     

                  <tr>
                    <th scope="row"><?php echo $res['orderId']; ?></th>
                    <td><?php echo date('F d, Y g:i A',strtotime($res['orderPlacedDate'])); ?></td>
                    <td><?php echo $res['orderModeOfPayment']; ?></td>
                    <td><?php echo $res['orderDeliveryMethod']; ?></td>
                    <td>
                        <ul>
                        <?php
                        $db->select('order_details_view','*',NULL,'orderId = "' . $res['orderId'] . '"', NULL); 
                        $output = $db->getResult();
                        $sum = 0;
                        foreach ($output as $res1) { ?>  
                        <li>

                          Product: <?php echo $res1['productName']; ?> (<?php echo $res1['productOption1']; ?> <?php echo $res1['productOption2']; ?>) <br> 
                          Quantity: <?php echo $res1['quantity']; ?> 
                          Price: ₱<?php echo number_format($res1['price'], 2); ?> each <br>
                          

                        </li>
                        <?php } ?>

                        </ul>
                      </td>
                    <td><b>₱<?php echo number_format($res['orderTotalAmount'], 2); ?></b></td>
                    <td><?php echo $res['orderStatus']; ?></td>
                    <td><button type="submit" value="submit" class="btn" id="btn_submit" >View Details</button></td>
                  </tr>

                <?php } ?>

                </tbody>
              </table>
              </div>

             
            </div>


        

            
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <?php include('footer.php'); ?>
