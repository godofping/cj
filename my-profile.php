<?php 
include('header.php');

$db->select('customers_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
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
                <h4>My Profile</h4>
                <hr>
              </div>
            </div>
            


            <div class="col-md-12"> 
              <h5>Your profile information is the default shipping and billing information</h5>

              <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-profile'): ?>
                    <div class="alert alert-success" role="alert">
                    Profile updated.
                  </div>
              <?php endif ?>

              <!--======= FORM  =========-->
              <form role="form" id="contact_form" class="contact-form" method="post" action="controller.php?from=update-profile" autocomplete="off">
                <ul class="row">
                  <li class="col-sm-12">
                    <label>Email Address (You cannot change the email address)
                      <input type="text" class="form-control" name="customerEmail" id="customerEmail" placeholder="" required="" readonly="" value="<?php echo $res['customerEmail'] ?>">
                    </label>
                  </li>
                
                  <li class="col-sm-6">
                    <label>First name *
                      <input type="text" class="form-control" name="customerFirstName" id="customerFirstName" placeholder="" required="" value="<?php echo $res['customerFirstName'] ?>" >
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Last name *
                      <input type="text" class="form-control" name="customerLastName" id="customerLastName" placeholder="" required="" value="<?php echo $res['customerLastName'] ?>">
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label>Address * <small>(building number, street name, city, province)</small>
                      <input type="text" class="form-control" name="customerAddress" id="customerAddress" placeholder="" required="" value="<?php echo $res['customerAddress'] ?>">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>Phone Number *
                      <input type="text" class="form-control" name="customerPhoneNumber" id="customerPhoneNumber" placeholder="" required="" value="<?php echo $res['customerPhoneNumber'] ?>">
                    </label>
                  </li>

                  <li class="col-sm-12">
                    <button type="submit" value="submit" class="btn" id="btn_submit" >update</button>
                  </li>
                </ul>
              </form>
            </div>


            <div class="col-md-12"> 
              <h5 class="pt-5">Update Password</h5>

              <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-password'): ?>
                    <div class="alert alert-success" role="alert">
                    Password updated.
                  </div>
              <?php endif ?>

              <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-password-failed'): ?>
                    <div class="alert alert-danger" role="alert">
                    Incorrect old password or new password and confirm password does not match.
                  </div>
              <?php endif ?>

              <!--======= FORM  =========-->
              <form role="form" id="contact_form" class="contact-form" method="post" action="controller.php?from=update-password" autocomplete="off">
                <ul class="row">
                  <li class="col-sm-12">
                    <label>Old Password *
                      <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="" required="">
                    </label>
                  </li>

                  <li class="col-sm-12">
                    <label>New Password *
                      <input type="password" class="form-control" name="newPasssword" id="newPasssword" placeholder="" required="">
                    </label>
                  </li>

                  <li class="col-sm-12">
                    <label>Confirm New Password *
                      <input type="password" class="form-control" name="confirmNewPassword" id="confirmNewPassword" placeholder="" required="">
                    </label>
                  </li>

                  <input type="text" name="customerPassword" hidden value="<?php echo $res['customerPassword'] ?>">

                  <li class="col-sm-12">
                    <button type="submit" value="submit" class="btn" id="btn_submit" >update</button>
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
