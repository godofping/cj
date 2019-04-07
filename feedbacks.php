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

            <div class="col-md-8">
              <?php
              $db->select('customer_feedbacks_view','*',NULL,'userFeedbackStatus = 1', "userFeedbackId DESC LIMIT 10"); 
              $output = $db->getResult();
              foreach ($output as $res) { ?>              

              <div class="row mt-5">
                <div class="col-md-12">
                  <div class="testimonial">
                    <div class="testi-in text-left"> 
                      <i class="fa fa-quote-left"></i>
                        <p><?php echo $res['userFeedback']; ?></p>
                        <h5><?php echo $res['customerFullName'] ?></h5>
                        <span><?php echo date('F d, Y',strtotime($res['userFeedbackDate'])); ?></span>
                    </div>
                  </div>
                </div>
              </div>

              <?php } ?>

            </div>
            <?php if (isset($_SESSION['userId'])): ?>
            <div class="col-md-4"> 
              <h5>Submit a feedback.</h5>

              <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-feedback'): ?>
                    <div class="alert alert-success" role="alert">
                    Feedback is submitted to the admin for the approval.
                  </div>
              <?php endif ?>

           
              <form role="form" id="contact_form" class="contact-form" method="post" action="controller.php?from=add-feedback" autocomplete="off">
                <ul class="row">
                  <li class="col-sm-12">
                    <label>Message
                      <textarea class="form-control" required="" name="userFeedback" id="userFeedback" rows="5" placeholder=""></textarea>
                    </label>

                  </li>
                

                  <li class="col-sm-12">
                    <button type="submit" value="submit" class="btn" id="btn_submit" >submit</button>
                  </li>
                </ul>
              </form>
            </div>
            <?php endif ?>

            
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <?php include('footer.php'); ?>
