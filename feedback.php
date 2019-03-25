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
                <h4>Our Customers Feedback</h4>
                <hr>
              </div>
            </div>
            
            <div class="col-md-8">
              <?php
              $db->select('customer_feedbacks_view','*',NULL,'customerFeedbackStatus = 1', "customerFeedbackId DESC LIMIT 10"); 
              $output = $db->getResult();
              foreach ($output as $res) { ?>              

              <div class="row mt-5">
                <div class="col-md-12">
                  <div class="testimonial">
                    <div class="testi-in text-left"> 
                      <i class="fa fa-quote-left"></i>
                        <p><?php echo $res['customerFeedback']; ?></p>
                      <h5><?php echo $res['customerFullName'] ?></h5>
                      <span><?php echo date('F d, Y',strtotime($res['customerFeedbackDate'])); ?></span>
                    </div>
                  </div>
                </div>
              </div>

              <?php } ?>

            </div>
            <div class="col-md-4"> 
              <h5>Submit a feedback.</h5>
              <!--======= FORM  =========-->
              <form role="form" id="contact_form" class="contact-form" method="post" action="controller.php?from=add-feedback" autocomplete="off">
                <ul class="row">
                  <li class="col-sm-12">
                    <label>Message
                      <textarea class="form-control" required="" name="customerFeedback" id="customerFeedback" rows="5" placeholder=""></textarea>
                    </label>

                  </li>
                

                  <li class="col-sm-12">
                    <button type="submit" value="submit" class="btn" id="btn_submit" >submit</button>
                  </li>
                </ul>
              </form>
            </div>

            
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <?php include('footer.php'); ?>
