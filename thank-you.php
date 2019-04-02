<?php include('header.php'); 

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
                <h4>Thank You</h4>
                <hr>
              </div>
              <h4>Order number <u><?php echo base64_decode($_GET['orderId']); ?></u></h4>
              <h5>Your order has been placed. Click <a href="my-orders.php"><b>here</b></a> to view your orders.</h5>
            </div>
            
  
            
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <?php include('footer.php'); ?>
