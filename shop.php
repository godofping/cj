<?php 
include('header.php');

$db->select('product_categories_view','*',NULL,'productCategoryId = "' . $_GET['productCategoryId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Products -->
    <section class="shop-page padding-top-100 padding-bottom-100">
      <div class="container-full">
        <div class="row"> 
          
          <!-- Shop SideBar -->
          <div class="col-md-2">
            <div class="shop-sidebar"> 
              
              <!-- Category -->
              <h5 class="shop-tittle margin-bottom-30"><?php echo $res['productCategory']; ?> 
              <?php 
              if (!isset($_GET['productSubCategoryId'])) {
                echo "(All)";
              }else{

                $db->select('product_sub_categories_view','*',NULL,'productSubCategoryId = "' . $_GET['productSubCategoryId'] . '"', NULL); 
                $res2 = $db->getResult(); $res2 = $res2[0];
                echo "(".$res2['productSubCategory'].")";
              }
               ?>
              
            </h5>
              <ul class="shop-cate">
                <?php 
                $db->select('product_sub_categories_view','*',NULL,'productCategoryId = "' . $res['productCategoryId'] . '"', NULL); 
                $output = $db->getResult();
                foreach ($output as $res) { ?>

                  <li>
                    <a href="shop.php?productCategoryId=<?php echo $res['productCategoryId'] ?>&productSubCategoryId=<?php echo $res['productSubCategoryId'] ?>"> <?php echo $res['productSubCategory']; ?> 
                    <span>
                      <?php 
                      $db->select('product_variations_group_by_products_view','count(*) as total',NULL,'productSubCategoryId = "' . $res['productSubCategoryId'] . '"', NULL); 
                      $output1 = $db->getResult(); $output1 = $output1[0];
                      echo $output1['total'];

                      ?>
                      </span>
                    </a>
                  </li>

                <?php } ?>
              </ul>
              
            </div>
          </div>
          
          <!-- Item Content -->
          <div class="col-md-10">
            <div class="sidebar-layout"> 
              
              <!-- Item Filter -->
              <div class="item-fltr"> 
                <!-- short-by -->
                <!-- <div class="short-by"> Showing 1–10 of 20 results </div> -->
                <!-- List and Grid Style -->
                <div class="lst-grd"> <a href="#" id="list"><i class="flaticon-interface"></i></a> <a href="#" id="grid"><i class="icon-grid"></i></a> 
                  <!-- Select -->

                </div>
              </div>
              
              <!-- Item -->
              <div id="products" class="arrival-block col-item-4 list-group">
                <div class="row"> 
                  
                  <?php 

                  if (isset($_GET['productSubCategoryId'])) {
                    $db->select('product_variations_group_by_products_view','*',NULL,'productSubCategoryId = "' . $_GET['productSubCategoryId'] . '" and totalProductVariation <> 0', NULL); 
                  }
                  else
                  {
                    $db->select('product_variations_group_by_products_view','*',NULL,'productCategoryId = "' . $_GET['productCategoryId'] . '" and totalProductVariation <> 0', NULL); 
                  }
                  
                  $output = $db->getResult();
                  foreach ($output as $res) { 
                  ?>

                      <!-- Item -->
                      <div class="item">
                        <div class="img-ser"> 
                          <!-- Images -->
                          <div class="thumb"> 

                          <?php 
                            $db->select('product_images_view','*',NULL,'productId = "' . $res['productId'] . '" and isThumbnail = 1', NULL); 
                            $imgres = $db->getResult(); $imgres = $imgres[0];
                           ?>

                            <img class="img-1" src="dashboard/images/<?php echo $imgres['productImageLocation'] ?>" alt="">
                            <img class="img-2" src="dashboard/images/<?php echo $imgres['productImageLocation'] ?>" alt=""> 
                            <!-- Overlay  -->
                            <div class="overlay">
                              <div class="position-center-center"> <a class="popup-with-move-anim" href="#qck-view-shop<?php echo $res['productId'] ?>"><i class="icon-eye"></i></a> </div>
                              <div class="add-crt"><a href="product-details.php?productId=<?php echo $res['productId'] ?>"><i class="icon-info margin-right-10"></i> VIEW MORE DETAILS</a></div>
                             
                            </div>
                          </div>

                          <?php 
                            $db->select('product_variations_view','min(productPrice) as min',NULL,'productId = "' . $res['productId'] . '"', NULL); 
                            $getMinMax = $db->getResult(); $getMinMax = $getMinMax[0];
                            $min = $getMinMax['min'];

                            $db->select('product_variations_view','max(productPrice) as max',NULL,'productId = "' . $res['productId'] . '"', NULL); 
                            $getMinMax = $db->getResult(); $getMinMax = $getMinMax[0];
                            $max = $getMinMax['max'];

                           ?>

                          
                          <!-- Item Name -->
                          <div class="item-name fr-grd"> <a href="#." class="i-tittle"><?php echo $res['productName']; ?></a> 

                            <?php if ($min == $max): ?>
                              <span class="price"><small>₱</small><?php echo number_format($max, 2); ?> </span>
                            <?php endif ?>

                            <?php if ($min != $max): ?>
                              <span class="price"><small>₱</small><?php echo number_format($min, 2); ?> ~ <small>₱</small><?php echo $max; ?></span>
  
                            <?php endif ?>

                          </div>

                          <!-- Item Details -->
                          <div class="cap-text">
                            <div class="item-name"> <a href="#." class="i-tittle"><?php echo $res['productName']; ?></a> 

                              <?php if ($min == $max): ?>
                                <span class="price"><small>₱</small><?php echo $max; ?> </span>
                              <?php endif ?>

                              <?php if ($min != $max): ?>
                                <span class="price"><small>₱</small><?php echo $min; ?> ~ <small>₱</small><?php echo $max; ?></span>
                    
                              <?php endif ?>
                
                              <?php echo $res['productDetails']; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                  
                  <?php } ?>


                </div>
              </div>
              
              <!-- View All Items --> 
              
              <!-- Pagination -->
           <!--    <ul class="pagination">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">></a></li>
              </ul>
               -->



           <?php 


              if (isset($_GET['productSubCategoryId'])) {
                $db->select('product_variations_group_by_products_view','*',NULL,'productSubCategoryId = "' . $_GET['productSubCategoryId'] . '" and totalProductVariation <> 0', NULL); 
              }
              else
              {
                $db->select('product_variations_group_by_products_view','*',NULL,'productCategoryId = "' . $_GET['productCategoryId'] . '" and totalProductVariation <> 0', NULL); 
              }
              
              $itemCounter = 0;



              $output = $db->getResult();
              foreach ($output as $res) { 
                $itemCounter++;
              ?>




              <!-- Quick View -->
              <div id="qck-view-shop<?php echo $res['productId'] ?>" class="zoom-anim-dialog qck-inside mfp-hide">
                <div class="row">
                  <div class="col-md-6"> 
                    
                    <!-- Images Slider -->
                    <div class="images-slider">
                      <ul class="slides">

                        <?php 
                          $db->select('product_images_view','*',NULL,'productId = "' . $res['productId'] . '" and isThumbnail = 1', NULL); 
                          $imgres = $db->getResult();
                          foreach ($imgres as $img) { ?>
                          <li data-thumb="dashboard/images/<?php echo $img['productImageLocation'] ?>"> <img src="dashboard/images/<?php echo $img['productImageLocation'] ?>" alt=""> </li>
                        <?php } ?>

                        <?php 
                          $db->select('product_images_view','*',NULL,'productId = "' . $res['productId'] . '" and isThumbnail <> 1 and productImageLocation <> "default-image.jpg" ', NULL); 
                          $imgres = $db->getResult();
                          foreach ($imgres as $img) { ?>
                          <li data-thumb="dashboard/images/<?php echo $img['productImageLocation'] ?>"> <img src="dashboard/images/<?php echo $img['productImageLocation'] ?>" alt=""> </li>
                        <?php } ?>

                      </ul>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="add-info mb-3 text-center">
                          <a href="product-details.php?productId=<?php echo $res['productId'] ?>" class="btn">VIEW MORE DETAILS </a> 
                        </div>
                      </div>
                    </div>
                      
                  </div>
                  
                  <!-- Content Info -->
                  <div class="col-md-6">
                    <div class="contnt-info">
                      <h3><?php echo $res['productName']; ?></h3>

                      <?php 

                      $db->select('product_variations_view','min(productPrice) as min',NULL,'productId = "' . $res['productId'] . '"', NULL); 
                            $getMinMax = $db->getResult(); $getMinMax = $getMinMax[0];
                            $min = $getMinMax['min'];

                            $db->select('product_variations_view','max(productPrice) as max',NULL,'productId = "' . $res['productId'] . '"', NULL); 
                            $getMinMax = $db->getResult(); $getMinMax = $getMinMax[0];
                            $max = $getMinMax['max'];
                       ?>

                      <?php if ($min == $max): ?>
                        <h5 class="price"><small>₱</small><?php echo number_format($max, 2); ?> </h5>
                      <?php endif ?>

                      <?php if ($min != $max): ?>
                        <h5 class="price"><small>₱</small><?php echo number_format($min, 2); ?> ~ <small>₱</small><?php echo $max; ?></h5>
            
                      <?php endif ?>



                      <div class="mt-2"></div>
                        <?php echo $res['productDetails']; ?>
                      
                      
                      

                    </div>
                  </div>

                </div>
              </div>

            <?php } ?>

            <?php if ($itemCounter == 0): ?>
              <h3>No items available :(</h3>
            <?php endif ?>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include('footer.php'); ?>
