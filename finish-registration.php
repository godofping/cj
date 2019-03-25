<?php include('header.php'); 

?>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- PAGES INNER -->
    <section class="contact padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="contact-form">
          <h5>Thank you for registering your account. Please Fill up the form to finalize the registration.</h5>
          <div class="row">
            <div class="col-md-8"> 
              
              <!--======= Success Msg =========-->
              <div id="contact_message" class="success-msg"> <i class="fa fa-paper-plane-o"></i>Thank You. Your Message has been Submitted</div>
              
              <!--======= FORM  =========-->
              <form role="form" id="contact_form" class="contact-form" method="post" action="controller.php?from=finish-registration">
                <ul class="row">
                  <li class="col-sm-6">
                    <label>First name *
                      <input type="text" class="form-control" name="customerFirstName" id="customerFirstName" placeholder="" required="">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Last name *
                      <input type="text" class="form-control" name="customerLastName" id="customerLastName" placeholder="" required="">
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label>Address *
                      <input type="text" class="form-control" name="customerAddress" id="customerAddress" placeholder="" required="">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Phone Number
                      <input type="text" class="form-control" name="customerPhoneNumber" id="customerPhoneNumber" placeholder="" required="">
                    </label>
                  </li>

                  <li class="col-sm-12">
                    <button type="submit" value="submit" class="btn" id="btn_submit" >save</button>
                  </li>
                </ul>
              </form>
            </div>
            
            <!--======= ADDRESS INFO  =========-->
            <div class="col-md-4">
              <div class="contact-info">
                <h6>OUR ADDRESS</h6>
                <ul>
                  <li> <i class="icon-map-pin"></i> Street No. 12, Newyork 12,<br>
                    MD - 123, USA.</li>
                  <li> <i class="icon-call-end"></i> 1.800.123.456789</li>
                  <li> <i class="icon-envelope"></i> <a href="mailto:someone@example.com" target="_top">info@ecoshop.com</a> </li>
                  <li>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam erat turpis, pellentesque non leo eget.</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <?php include('footer.php'); ?>
