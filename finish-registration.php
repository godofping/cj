<?php include('header.php'); 
if (!isset($_SESSION['userId'])) {
  echo '<script type="text/javascript">window.location.replace("index.php");</script>';
}
?>
  
 
  <div id="content"> 
    
 
    <section class="contact padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="contact-form">
          <h5>Please fill up the form to finalize the registration and continue shopping.</h5>
          <div class="row">
            <div class="col-md-8"> 
              

            
              <label>Profile Form</label>

              <form role="form" id="contact_form" class="contact-form" method="post" action="controller.php?from=finish-registration" autocomplete="off">
                <ul class="row">
                  <li class="col-sm-6">
                    <label>First name *
                      <input type="text" class="form-control" name="userFirstName" id="userFirstName" placeholder="" required="">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Last name *
                      <input type="text" class="form-control" name="userLastName" id="userLastName" placeholder="" required="">
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label>Address * <small>(building number, street name, city, province)</small>
                      <input type="text" class="form-control" name="userAddress" id="userAddress" placeholder="" required="">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Phone Number *
                      <input type="text" class="form-control" name="userPhoneNumber" id="userPhoneNumber" placeholder="" required="">
                    </label>
                  </li>

                  <li class="col-sm-12">
                    <button type="submit" value="submit" class="btn" id="btn_submit" >save</button>
                  </li>
                </ul>
              </form>
            </div>
            

            <div class="col-md-4">
              <div class="contact-info">
                <h6>You can also buy on us through walkin. Just go to our store or contact us.</h6>
                <ul>
                  <li> <i class="icon-map-pin"></i> Bendero Bldg, Nat’l Highway, Tacurong City, Sultan Kudarat or Alunan Ave. near roundball/fronting RMMC school, Koronadal, South Cotabato</li>
                  <li> <i class="icon-call-end"></i> 0975 436 3955</li>
                  <li> <i class="icon-envelope"></i> <a href="mailto:cjashley@gmail.com" target="_top">cjashley@gmail.com</a> </li>
           
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <?php include('footer.php'); ?>
