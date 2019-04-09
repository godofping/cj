<?php 
include('header.php');

$db->select('customers_view','*',NULL,'userId = "' . $_SESSION['userId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>

<?php if (!isset($_SESSION['userId'])): ?>
  <script type="text/javascript">window.location.replace("index.php");</script>
<?php endif ?>

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
            <div class="col-md-3">

              <form role="form" id="contact_form" class="contact-form" method="post" action="controller.php?from=place-order" autocomplete="off" enctype="multipart/form-data">

              <div class="form-group">
      
                <select id="filter" class="form-control">
                  <option readonly selected value="<?php echo $_GET['selected']; ?>"><?php echo $_GET['selected']; ?></option>
                  <option value="All">All</option>
                  <option value="Pending Approval">Pending Approval</option>
                  <option value="Confirmed">Confirmed</option>
                  <option value="Finished">Finished</option>
                  <option value="Cancelled">Cancelled</option>
                </select>
                
              </div>

              </form>
            </div>

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

                  if ($_GET['selected'] == 'All') {
                    $db->select('orders_view','*',NULL,'userId = "' . $_SESSION['userId'] . '" and orderStatus <> "On Cart"', "orderId DESC"); 
                  }
                  elseif ($_GET['selected'] == 'Pending Approval') {
                    $db->select('orders_view','*',NULL,'userId = "' . $_SESSION['userId'] . '" and orderStatus = "Pending Approval"', "orderId DESC"); 
                  }
                  elseif ($_GET['selected'] == 'Confirmed') {
                    $db->select('orders_view','*',NULL,'userId = "' . $_SESSION['userId'] . '" and orderStatus = "Confirmed"', "orderId DESC"); 
                  }
                  elseif ($_GET['selected'] == 'Finished') {
                    $db->select('orders_view','*',NULL,'userId = "' . $_SESSION['userId'] . '" and orderStatus = "Finished"', "orderId DESC"); 
                  }
                  elseif ($_GET['selected'] == 'Cancelled') {
                    $db->select('orders_view','*',NULL,'userId = "' . $_SESSION['userId'] . '" and orderStatus = "Cancelled"', "orderId DESC"); 
                  }

                  

                  $output = $db->getResult();
                  foreach ($output as $res) { ?>     

                  <tr>

                    <td><?php echo $res['orderId']; ?></td>
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

<script type="text/javascript">
  
$( "#filter" ).change(function() {
  var selectedValue = $( "#filter option:selected" ).text();
  window.location.replace("my-orders.php?selected="+selectedValue);
});

</script>