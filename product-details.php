<?php 
include('header.php');

$db->select('products_view','*',NULL,'productId = "' . $_GET['productId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>

  <div id="content"> 
    
 
    <section class="padding-top-100 padding-bottom-100">
      <div class="container"> 
        

        <div class="shop-detail">
          <div class="row"> 
            

            <div class="col-md-7"> 
              
  
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
            
       
            <div class="col-md-5">
              <h4><?php echo $res['productName']; ?></h4>
  
              <form method="POST" action="controller.php?from=add-cart">
        
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
              
         
              <?php echo $res['productDetails']; ?>

            </div>
          </div>
        </div>
        

        <div class="item-decribe"> 
      
          <ul class="nav nav-pills" role="tablist">

            <?php
            $db->select('product_reviews_view','count(*) as total',NULL,'productId = "' . $_GET['productId'] . '"', NULL); 
            $res = $db->getResult(); $res = $res[0];
            ?>
     
            <li class="nav-item"><a class="active nav-link" href="#review" role="tab" data-toggle="pill">REVIEW (<?php echo $res['total']; ?>)</a></li>
      
          </ul>
          

          <div class="tab-content"> 

   
            <div role="tabpanel" class="tab-pane active" id="review">

              <?php
            $db->select('product_reviews_view','*',NULL,'productId = "' . $_GET['productId'] . '"', NULL); 
            $output = $db->getResult();
            foreach ($output as $res) { ?>
              <div class="media">
                <div class="media-body">
                  <p>“<?php echo $res['productReview']; ?>”</p>
                  <h6><?php echo $res['userFullName']; ?> ordered "<?php echo $res['productName']; ?> (<?php echo $res['productOption1']; ?> <?php echo $res['productOption2']; ?>)"  <span class="pull-right"><?php echo date('F d, Y', strtotime($res['productReviewDate'])); ?></span> </h6>
                </div>
              </div>
            <?php } ?>

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
