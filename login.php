<?php include('header.php'); 
if (isset($_SESSION['userId'])) { ?>
  <script type="text/javascript">window.location.replace("index.php");</script>
<?php } ?>

  <div id="content"> 
    

    <section class="chart-page login gray-bg padding-top-100 padding-bottom-100">
      <div class="container"> 
        

        <div class="shopping-cart"> 
          
     
          <div class="cart-ship-info">
            <div class="row"> 
              
            
              <div class="col-sm-7 center-block"> 
                
              
                <ul class="nav" id="myTab" role="tablist">
                  <li class="nav-item"> <a class="nav-link <?php if (isset($_GET['show']) and $_GET['show'] == 'login'): ?>active show<?php endif ?>" id="login-tab" data-toggle="tab" href="#log" role="tab" aria-selected="true">Login</a> </li>
                  <li class="nav-item"> <a class="nav-link <?php if (isset($_GET['show']) and $_GET['show'] == 'registration'): ?>active show<?php endif ?>" id="reg-tab" data-toggle="tab" href="#reg" role="tab" aria-selected="false">Register</a> </li>
                </ul>
                
          
                <div class="tab-content" id="myTabContent"> 

                  <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'userEmail-taken'): ?>
                    <div class="alert alert-danger" role="alert">
                    Username is already taken! Please change a new one.
                  </div>
                  <?php endif ?>

                  <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'login-failed'): ?>
                    <div class="alert alert-danger" role="alert">
                    Login failed! Email and/or password is incorrect.
                  </div>
                  <?php endif ?>

                  <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'customer-block'): ?>
                    <div class="alert alert-danger" role="alert">
                    Account blocked!
                  </div>
                  <?php endif ?>



                                  
                  <!-- Login -->
                  <div class="tab-pane fade <?php if (isset($_GET['show']) and $_GET['show'] == 'login'): ?>show active<?php endif ?>" id="log" role="tabpanel" aria-labelledby="login-tab">
                    <form method="POST" action="controller.php?from=login" autocomplete="off">
                      <ul class="row">
                        
                     
                        <li class="col-md-12">
                          <label> Email Address
                            <input type="email" name="userEmail" required="" value="" placeholder="" class="form-control">
                          </label>
                        </li>
                  
                        <li class="col-md-12">
                          <label> Password
                            <input type="password" name="userPassword" required="" value="" placeholder="" class="form-control">
                          </label>
                        </li>
                        
                     
                        <li class="col-md-6">
                          <button type="submit" class="btn">LOGIN</button>
                        </li>

                        <li class="col-md-6">
                          <div class="margin-top-15 text-right"> <a href="forgot-password.php">Forgot Password</a> </div>
                        </li>

                        
                
                      </ul>
                    </form>
                    
     
                  </div>
                
          
                  <div class="tab-pane fade <?php if (isset($_GET['show']) and $_GET['show'] == 'registration'): ?>show active<?php endif ?>" id="reg" role="tabpanel" aria-labelledby="reg-tab">
                    <form method="POST" action="controller.php?from=customer-registration" autocomplete="off">
                      <ul class="row">
                        
                   
                        <li class="col-md-12">
                          <label> Email Address *
                            <input type="email" required="" name="userEmail" value="" placeholder="" class="form-control">
                          </label>
                        </li>
                      
                        <li class="col-md-12">
                          <label> Password *
                            <input type="password" required="" name="userPassword" value="" placeholder="" class="form-control">
                          </label>
                        </li>
                        
                   
                        <li class="col-md-6">
                          <button type="submit" class="btn">Register</button>
                        </li>

                        <li class="col-md-6">
                          <div class="margin-top-15 text-right"> <a href="forgot-password.php">Forgot Password</a> </div>
                        </li>

                        
                      </ul>
                    </form>
                    

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <?php include('footer.php'); ?>
