<?php 
include('header.php');

$db->select('products_view','*',NULL,'productId = "' . $_GET['productId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
  <!-- Content -->
  <div id="content"> 
    
    <!-- Popular Products -->
    <section class="padding-top-100 padding-bottom-100">
      <div class="container"> 
        
        <!-- SHOP DETAIL -->
        <div class="shop-detail">
          <div class="row"> 
            
            <!-- Popular Images Slider -->
            <div class="col-md-7"> 
              
              <!-- Place somewhere in the <body> of your page -->
              <div id="slider-shop" class="flexslider">
                <ul class="slides">

                  <?php 
                    $db->select('product_images_view','*',NULL,'productId = "' . $res['productId'] . '" and isThumbnail = 1', NULL); 
                    $imgres = $db->getResult();
                    foreach ($imgres as $img) { ?>
                    <li> <img class="img-responsive" src="dashboard/images/<?php echo $img['productImageLocation'] ?>" alt=""> </li>
                  <?php } ?>

                  <?php 
                    $db->select('product_images_view','*',NULL,'productId = "' . $res['productId'] . '" and isThumbnail <> 1 and productImageLocation <> "default-image.jpg"', NULL); 
                    $imgres = $db->getResult();
                    foreach ($imgres as $img) { ?>
                    <li> <img class="img-responsive" src="dashboard/images/<?php echo $img['productImageLocation'] ?>" alt=""> </li>
                  <?php } ?>


                </ul>
              </div>
              <div id="shop-thumb" class="flexslider">
                <ul class="slides">
                  <?php 
                    $db->select('product_images_view','*',NULL,'productId = "' . $res['productId'] . '" and isThumbnail = 1', NULL); 
                    $imgres = $db->getResult();
                    foreach ($imgres as $img) { ?>
                    <li> <img class="img-responsive" src="dashboard/images/<?php echo $img['productImageLocation'] ?>" alt=""> </li>
                  <?php } ?>

                  <?php 
                    $db->select('product_images_view','*',NULL,'productId = "' . $res['productId'] . '" and isThumbnail <> 1 and productImageLocation <> "default-image.jpg"', NULL); 
                    $imgres = $db->getResult();
                    foreach ($imgres as $img) { ?>
                    <li> <img class="img-responsive" src="dashboard/images/<?php echo $img['productImageLocation'] ?>" alt=""> </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            
            <!-- COntent -->
            <div class="col-md-5">
              <h4><?php echo $res['productName']; ?></h4>
  
              <form method="POST" action="controller.php?from=add-cart">
               <!-- Short By -->
              <div class="some-info">
                <ul class="row mt-3">
                  <li class="col-md-12">

                    <div class="col-md-12">
                      <div class="form-group">
                      <select class="form-control" required="" name="productVariationId" id="productVariationId">
                        <option disabled="" selected="">Please select an option</option>
                        <?php
                        $db->select('product_variations_view','*',NULL,'productId = "' . $_GET['productId'] . '"', NULL);
                        $output = $db->getResult();
                        foreach ($output as $res) { ?>
                          <option value="<?php echo $res['productVariationId'] ?>"><?php echo $res['productOption1']; ?> <?php echo $res['productOption2']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    </div>

                  </li>

                  <div class="col-md-12" id="productInformation"></div>
                  
                </ul>
              </div>

              </form>


              <ul class="item-owner" style="margin-top: -5px;">
                <li>Category:<span> <a href="shop.php?productCategoryId=<?php echo $res['productCategoryId'] ?>"><?php echo $res['productCategory']; ?></a></span></li>
                <li>Sub Category:<span> <a href="shop.php?productCategoryId=<?php echo $res['productCategoryId'] ?>&productSubCategoryId=<?php echo $res['productSubCategoryId'] ?>"><?php echo $res['productSubCategory']; ?></a></span></li>
              </ul>
              
              <!-- Item Detail -->
              <?php echo $res['productDetails']; ?>

            </div>
          </div>
        </div>
        
        <!--======= PRODUCT DESCRIPTION =========-->
        <div class="item-decribe"> 
          <!-- Nav tabs -->
          <ul class="nav nav-pills" role="tablist">
     
            <li class="nav-item"><a class="active nav-link" href="#review" role="tab" data-toggle="pill">REVIEW (03)</a></li>
      
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content"> 

            <!-- REVIEW -->
            <div role="tabpanel" class="tab-pane active" id="review">
              <h6>3 REVIEWS FOR SHIP YOUR IDEA</h6>
              
              <!-- REVIEW PEOPLE 1 -->
              <div class="media">
                <div class="media-left"> 
                  <!--  Image -->
                  <div class="avatar"> <a href="#"> <img class="media-object" src="images/avatar-1.jpg" alt=""> </a> </div>
                </div>
                <!--  Details -->
                <div class="media-body">
                  <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.”</p>
                  <h6>TYRION LANNISTER <span class="pull-right">MAY 10, 2016</span> </h6>
                </div>
              </div>
              
              <!-- REVIEW PEOPLE 1 -->
              
              <div class="media">
                <div class="media-left"> 
                  <!--  Image -->
                  <div class="avatar"> <a href="#"> <img class="media-object" src="images/avatar-2.jpg" alt=""> </a> </div>
                </div>
                <!--  Details -->
                <div class="media-body">
                  <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.”</p>
                  <h6>TYRION LANNISTER <span class="pull-right">MAY 10, 2016</span> </h6>
                </div>
              </div>
              
              <?php if (isset($_SESSION['customerId'])): ?>
              <!-- ADD REVIEW -->
              <h6 class="margin-t-40">ADD YOUR REVIEW</h6>
              <form>
                <ul class="row">
                  <li class="col-sm-6">
                    <label> *NAME
                      <input type="text" value="" placeholder="">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label> *EMAIL
                      <input type="email" value="" placeholder="">
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label> *YOUR REVIEW
                      <textarea></textarea>
                    </label>
                  </li>
                  <li class="col-sm-6"> 
                    <!-- Rating Stars -->
                    <div class="stars"> <span>YOUR RATING</span> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                  </li>
                  <li class="col-sm-6">
                    <button type="submit" class="btn btn-dark btn-small pull-right no-margin">POST REVIEW</button>
                  </li>
                </ul>
              </form>
              <?php endif ?>


            </div>
            

          </div>
        </div>
      </div>
    </section>
    


  </div>
  <?php include('footer.php'); ?>

<script type="text/javascript">
  $('#productVariationId').change(function(){

    var productVariationId = $(this).children("option:selected").val();

    $.post("inc-product-details.php", { productVariationId:productVariationId, } , function(data, status){

    $('#productInformation').html(data);

    });
    
  });
</script>
