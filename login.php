  <?php include('header.php'); ?>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- PAGES INNER -->
    <section class="chart-page login gray-bg padding-top-100 padding-bottom-100">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              
              <!-- Login Register -->
              <div class="col-sm-7 center-block"> 
                
                <!-- Nav Tabs -->
                <ul class="nav" id="myTab" role="tablist">
                  <li class="nav-item"> <a class="nav-link <?php if (isset($_GET['show']) and $_GET['show'] == 'login'): ?>active show<?php endif ?>" id="login-tab" data-toggle="tab" href="#log" role="tab" aria-selected="true">Login</a> </li>
                  <li class="nav-item"> <a class="nav-link <?php if (isset($_GET['show']) and $_GET['show'] == 'registration'): ?>active show<?php endif ?>" id="reg-tab" data-toggle="tab" href="#reg" role="tab" aria-selected="false">Register</a> </li>
                </ul>
                
                <!-- Login Register Inside -->
                <div class="tab-content" id="myTabContent"> 

                  <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'customerEmail-taken'): ?>
                    <div class="alert alert-danger" role="alert">
                    Username is already taken! Please change a new one.
                  </div>
                  <?php endif ?>
                                  
                  <!-- Login -->
                  <div class="tab-pane fade <?php if (isset($_GET['show']) and $_GET['show'] == 'login'): ?>show active<?php endif ?>" id="log" role="tabpanel" aria-labelledby="login-tab">
                    <form method="POST" action="controller.php?from=login" autocomplete="off">
                      <ul class="row">
                        
                        <!-- Name -->
                        <li class="col-md-12">
                          <label> Email Address
                            <input type="email" name="customerEmail" required="" value="" placeholder="" class="form-control">
                          </label>
                        </li>
                        <!-- LAST NAME -->
                        <li class="col-md-12">
                          <label> Password
                            <input type="password" name="customerPassword" required="" value="" placeholder="" class="form-control">
                          </label>
                        </li>
                        
                        <!-- LOGIN -->
                        <li class="col-md-6">
                          <button type="submit" class="btn">LOGIN</button>
                        </li>
                        
                
                      </ul>
                    </form>
                    
     
                  </div>
                
                  <!-- Register -->
                  <div class="tab-pane fade <?php if (isset($_GET['show']) and $_GET['show'] == 'registration'): ?>show active<?php endif ?>" id="reg" role="tabpanel" aria-labelledby="reg-tab">
                    <form method="POST" action="controller.php?from=customer-registration" autocomplete="off">
                      <ul class="row">
                        
                        <!-- Name -->
                        <li class="col-md-12">
                          <label> Email Address *
                            <input type="email" required="" name="customerEmail" value="" placeholder="" class="form-control">
                          </label>
                        </li>
                        <!-- LAST NAME -->
                        <li class="col-md-12">
                          <label> Password *
                            <input type="password" required="" name="customerPassword" value="" placeholder="" class="form-control">
                          </label>
                        </li>
                        
                        <!-- LOGIN -->
                        <li class="col-md-6">
                          <button type="submit" class="btn">Register</button>
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
