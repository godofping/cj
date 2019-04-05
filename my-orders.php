<?php 
include('header.php');

$db->select('customers_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>

  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <div class="heading text-center">
          <h4>My Orders</h4>
          <hr>
        </div>
      </div>
    </div>
  </section>  
  

  <div id="content"> 
    
    <section class="contact padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="contact-form">
          
          <div class="row">
            <div class="col-md-12"> 
              <div class="table-responsive">
                <table class="table">
                <thead>

                  <tr>

                    <th scope="col">Order number</th>
                    <th scope="col">Placed on</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Order Status</th>
                    <th></th>

                  </tr>

                </thead>
                <tbody>
                <?php
                  $db->select('orders_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '" and orderStatus <> "On Cart"', "orderId DESC"); 
                  $output = $db->getResult();
                  foreach ($output as $res) { ?>     

                  <tr>

                    <th><?php echo $res['orderId']; ?></th>
                    <td><?php echo date('F d, Y g:i A',strtotime($res['orderPlacedDate'])); ?></td>
                    <td><?php echo $res['orderPaymentStatus']; ?></td>
                    <td><?php echo $res['orderStatus']; ?></td>
                    <td><a href="order-details.php?orderId=<?php echo base64_encode($res['orderId']) ?>"><button type="submit" value="submit" class="btn" id="btn_submit" >View Details</button></a></td>

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
