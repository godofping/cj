<?php include('header.php'); 

?>
  

  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <div class="heading text-center">
          <h4>Our Customer Feedback</h4>
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
              <?php
              $db->select('user_feedbacks_view','*',NULL,'', "userFeedbackId DESC LIMIT 100"); 
              $output = $db->getResult();
              foreach ($output as $res) { ?>              

       
              <section class="tweet padding-top-100 padding-bottom-100">
                <div class="container">
                  <div class="col-md-8 center-block"> <i class="icon-star"></i>
                    <p><?php echo $res['userFeedback']; ?></p>
                    <span><span><?php echo $res['userFullName'] ?></span><br> <?php echo date('F d, Y',strtotime($res['userFeedbackDate'])); ?></span> </div>
                </div>
              </section>

              <?php } ?>

            </div>
     

            
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <?php include('footer.php'); ?>
