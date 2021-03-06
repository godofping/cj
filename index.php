<?php include('header.php'); 

$db->select('product_categories_table'); 
$res = $db->getResult(); $res = $res[0];
?>

  
  <!-- Content -->
  <div id="content"> 
    
    <!-- HOME MAIN  -->
    <section class="simple-head" data-stellar-background-ratio="0.5">
      <div class="position-center-center"> 
        <!-- Container Fluid -->
        <div class="container-full"> 
          <!-- Header Text -->
      <!--     <div class="text-left col-lg-8 no-padding"> <span class="price"><small>$</small>299.99</span> -->
            <h4>Welcome to</h4>
            <h1 class="extra-huge-text">CJ Ashley Fashion Hub</h1>
            <div class="text-btn"> <a href="shop.php?productCategoryId=<?php echo $res['productCategoryId'] ?>" class="btn btn-inverse margin-top-40">SHOP NOW</a> </div>
          </div>
        </div>
      </div>
    </section>



    <!-- About -->
    <section class="small-about">
      <div class="container-full">
          <div class="news-letter padding-top-150 padding-bottom-150">
            <div class="row">
              <div class="col-lg-10">
                <h3>We always stay with our clients and respect their business. We deliver 100% and provide instant response to help them succeed in constantly changing and challenging business world. </h3>
                <ul class="social_icons">
                  <li><a href="https://www.facebook.com/ashley.simpal.1"><i class="icon-social-facebook"></i></a></li>
                </ul>
              </div>
     
            </div>
          </div>
        </div>
    </section>
    
 
    
    <!-- Clients -->
    <section class="clients light-gray-bg padding-top-60 padding-bottom-80">
      <div class="container-full">
        <div class="clients-slide">
          <div> <img src="images/1.png" alt="" > </div>
          <div> <img src="images/2.png" alt="" > </div>
          <div> <img src="images/3.png" alt="" > </div>
          <div> <img src="images/4.png" alt="" > </div>
          <div> <img src="images/5.png" alt="" > </div>
          <div> <img src="images/6.png" alt="" > </div>
          <div> <img src="images/7.png" alt="" > </div>
          <div> <img src="images/8.png" alt="" > </div>
          <div> <img src="images/9.png" alt="" > </div>
        </div>
      </div>
    </section>
  </div>
  
  <?php include('footer.php'); ?>