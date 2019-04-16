<?php include('header.php'); 
if (isset($_SESSION['userId'])) { ?>
  <script type="text/javascript">window.location.replace("index.php");</script>
<?php } ?>


<section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <div class="heading text-center">
          <h4>Forgot Password</h4>
          <hr>
        </div>
      </div>
    </div>
  </section>

  <div id="content"> 
    
    <section class="chart-page login gray-bg padding-bottom-100">
      <div class="container"> 
        

        <div class="shopping-cart"> 
          
     
          <div class="cart-ship-info">
            <div class="row"> 
              
           
              <div class="col-sm-7 center-block"> 
                
            
                <form method="POST" action="controller.php?from=login" autocomplete="off">
                      <ul class="row">

                      <p>We will email you the the reset password link. That link will expire after 5 minutes.</p>

                        <li class="col-md-12">
                          <label> Email Address
                            <input type="email" name="userEmail" required="" value="" placeholder="" class="form-control">
                          </label>
                        </li>
                  
                     
                        <li class="col-md-6">
                          <button type="submit" class="btn">Submit</button>
                        </li>
          
                      </ul>
                </form>
          
        
              </div>

            </div>


          </div>
        </div>
      </div>
    </section>
    

  </div>
  <?php include('footer.php'); ?>
