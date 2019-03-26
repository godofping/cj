<?php 
include('header.php');

$db->select('product_categories_table','*',NULL,'productCategoryId = "' . $_GET['productCategoryId'] . '"', NULL); 
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
              <h5 class="shop-tittle margin-bottom-30"><?php echo $res['productCategory']; ?></h5>
              <ul class="shop-cate">
                <?php 
                $db->select('product_sub_categories_view','*',NULL,'productCategoryId = "' . $res['productCategoryId'] . '"', NULL); 
                $output = $db->getResult();
                foreach ($output as $res) { ?>

                  <li>
                    <a href="shop.php?productCategoryId=<?php echo $res['productCategoryId'] ?>&productSubCategoryId=<?php echo $res['productSubCategoryId'] ?>"> <?php echo $res['productSubCategory']; ?> 
                    <span>
                      <?php 
                      $db->select('product_variations_view','count(*) as total',NULL,'productSubCategoryId = "' . $res['productSubCategoryId'] . '"', NULL); 
                      $output1 = $db->getResult(); 
                      $output1 = $output1[0];
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
                <div class="short-by"> Showing 1–10 of 20 results </div>
                <!-- List and Grid Style -->
                <div class="lst-grd"> <a href="#" id="list"><i class="flaticon-interface"></i></a> <a href="#" id="grid"><i class="icon-grid"></i></a> 
                  <!-- Select -->

                </div>
              </div>
              
              <!-- Item -->
              <div id="products" class="arrival-block col-item-4 list-group">
                <div class="row"> 
             

                  
                  <!-- Item -->
                  <div class="item">
                    <div class="img-ser"> 
                      <!-- Images -->
                      <div class="thumb"> <img class="img-1" src="images/item-img-1-3.jpg" alt=""><img class="img-2" src="images/item-img-1-3-1.jpg" alt=""> 
                        <!-- Overlay  -->
                        <div class="overlay">
                          <div class="position-center-center"> <a class="popup-with-move-anim" href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                          <div class="add-crt"><a href="#."><i class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                        </div>
                      </div>
                      
                      <!-- Item Name -->
                      <div class="item-name fr-grd"> <a href="#." class="i-tittle">Mid Rise taew Jeans</a> <span class="price"><small>$</small>199.00</span> </div>
                      <!-- Item Details -->
                      <div class="cap-text">
                        <div class="item-name"> <a href="#." class="i-tittle">Mid Rise Skinny Jeans</a> <span class="price"><small>$</small>199.00</span> 
                          <!-- Stars --> 
                          <span class="stras"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> </span>
                          <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non. Nulla lacinia, eros vel fermentum consectetur,</p>
                          <p>Phasellus lacinia fermesntum bibendum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  



                </div>
              </div>
              
              <!-- View All Items --> 
              
              <!-- Pagination -->
              <ul class="pagination">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">></a></li>
              </ul>
              
              <!-- Quick View -->
              <div id="qck-view-shop" class="zoom-anim-dialog qck-inside mfp-hide">
                <div class="row">
                  <div class="col-md-6"> 
                    
                    <!-- Images Slider -->
                    <div class="images-slider">
                      <ul class="slides">
                        <li data-thumb="images/item-img-1-1.jpg"> <img src="images/item-img-1-1.jpg" alt=""> </li>
                        <li data-thumb="images/item-img-1-1-1.jpg"> <img src="images/item-img-1-1-1.jpg" alt=""> </li>
                        <li data-thumb="images/item-img-1-1.jpg"> <img src="images/item-img-1-1.jpg" alt=""> </li>
                      </ul>
                    </div>
                  </div>
                  
                  <!-- Content Info -->
                  <div class="col-md-6">
                    <div class="contnt-info">
                      <h3>Mid Rise Skinny Jeans</h3>
                      <p>This is dummy copy. It is not meant to be read. It has been placed here solely to demonstrate the look and feel of finished, typeset text. Only for show. He who searches for meaning here will be sorely disappointed. <br>
                        <br>
                        These words are here to provide the reader with a basic impression of how actual text will appear in its final presentation. </p>
                      
                      <!-- Btn  -->
                      <div class="add-info">
                        <div class="quantity">
                          <input type="number" min="1" max="100" step="1" value="1" class="form-control qty">
                        </div>
                        <a href="#." class="btn btn-inverse"><i class="icon-heart"></i></a> <a href="#." class="btn">ADD TO CART </a> </div>
                    </div>
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
