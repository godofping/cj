<?php include('header.php'); 

?>
  
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <div class="heading text-center">
          <h4>Thank You</h4>
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

              <h4>Order number <u><?php echo base64_decode($_GET['orderId']); ?></u> <h5>has been placed. Click <a href="my-orders.php?selected=All"><b>here</b></a> to view your orders.</h5></h4>
              
            </div>
            
  
            
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <?php include('footer.php'); ?>
