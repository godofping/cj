
  <footer>
    <div class="container">
        <div class="row"> 

          <div class="col-md-4">
            <div class="about-footer"> <img class="margin-bottom-30" height="150" src="images/logo.jpg" alt="" >
              <p><i class="icon-pointer"></i> Bendero Bldg, Nat’l Highway, Tacurong City, Sultan Kudarat  <br>
               Alunan Ave. near roundball/fronting RMMC school, Koronadal, South Cotabato</p>
              <p><i class="icon-call-end"></i> 0975 436 3955</p>
              <p><i class="icon-envelope"></i> icjashley@gmail.com</p>
            </div>
          </div>
          

          <div class="col-md-5">
            <h6>Links</h6>
            <ul class="link two-half">
              <li><a href="index.php"> Home</a></li>
              <li><a href="about.php"> About</a></li>
              <li><a href="feedbacks.php"> Feedbacks</a></li>
              <li><a href="contact.php"> Contact</a></li>
              <?php if (!isset($_SESSION['customerId'])): ?>
                <li><a href="login.php?show=login"> Login</a></li>
                <li><a href="login.php?show=registration"> Register</a></li>
              <?php endif ?>
              <?php if (isset($_SESSION['customerId'])): ?>
                <li><a href="controller.php?from=logout"> Logout</a></li>
              <?php endif ?>

            </ul>
          </div>
          
   
          <div class="col-md-3">
            <?php if (isset($_SESSION['customerId'])): ?>
            <h6>My Account</h6>
            <ul class="link">
              <li><a href="my-profile.php">My Profile</a></li>
              <li><a href="my-orders.php?selected=All">My Orders</a></li>
              <li><a href="my-reviews.php">My Reviews</a></li>
              <li><a href="my-feedbacks.php">My Feedbacks</a></li>
            </ul>
            <?php endif ?>
          </div>
        </div>
      </div>

    <div class="rights">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p>©  <?php echo date('Y'); ?> CJ-Ashley Fashion Hub.  All right reserved.</p>
          </div>
          <div class="col-md-6 text-right"> <img src="images/card-icon.png" alt="" > </div>
        </div>
      </div>
    </div>
  </footer>
</div>
<script src="js/jquery-1.12.4.min.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js" ></script> 
<script src="js/own-menu.js"></script> 
<script src="js/jquery.lighter.js"></script> 
<script src="js/jquery.magnific-popup.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/main.js"></script>
</body>
</html>
<?php unset($_SESSION['toast']) ?>