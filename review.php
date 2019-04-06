<?php 
include('header.php');

$db->select('product_variations_view','*',NULL,'productVariationId = "' . $_GET['productVariationId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>

<?php if (!isset($_SESSION['customerId'])): ?>
  <script type="text/javascript">window.location.replace("index.php");</script>
<?php endif ?>

  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <div class="heading text-center">
          <h4>Write Review</h4>
          <hr>
        </div>
      </div>
    </div>
  </section>
  


  <div id="content"> 
    

    <section class="padding-top-100 padding-bottom-100">
      <div class="container"> 
        
        <div class="shop-detail">
          <div class="row"> 
            
            <div class="col-md-8"> 
              
              <div class="row">

                <?php
                $db->select('product_images_view','*',NULL,'productId = "' . $res['productId'] . '" and productImageLocation <> "default-image.jpg"', NULL); 
                $output = $db->getResult();
                foreach ($output as $imgres) { ?>
                <div class="col-sm-6 margin-bottom-30"> <img class="img-responsive" src="dashboard/images/<?php echo $imgres['productImageLocation'] ?>" alt=""> </div>
                <?php } ?>

              </div>
            </div>
            
            <div class="col-md-4">
              <h4><?php echo $res['productName']; ?> (<?php echo $res['productOption1']; ?> <?php echo $res['productOption2']; ?>)</h4>

              <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-review'): ?>
                <div class="alert alert-success" role="alert">
                Review submitted.
              </div>
              <?php endif ?>

              <?php 

              $db->select('product_reviews_view','count(*) as total',NULL,'productVariationId = "' . $_GET['productVariationId'] . '" and customerId = "' . $_SESSION['customerId'] . '"', NULL); 
              $output = $db->getResult(); $res = $output[0];

              if ($res['total'] > 0): 

              $db->select('product_reviews_view','*',NULL,'productVariationId = "' . $_GET['productVariationId'] . '" and customerId = "' . $_SESSION['customerId'] . '"', NULL); 
              $output = $db->getResult(); $res1 = $output[0];

              ?>


              <div class="row">

                <div class="col-md-12">
                  <label>Reviewed on <?php echo date('F d, Y', strtotime($res1['productReviewDate'])); ?></label>
                    <textarea class="form-control" required="" name="productReview" id="productReview" rows="5" placeholder="" disabled><?php echo $res1['productReview']; ?></textarea>
                </div>

              </div>



              <?php endif ?>

              <?php 
              if ($res['total'] == 0): ?>
                
              <form method="POST" action="controller.php?from=add-review&productVariationId=<?php echo $_GET['productVariationId'] ?>">

              <div class="row">

                <div class="col-md-12">
                  <label>Review</label>
                    <textarea class="form-control" required="" name="productReview" id="productReview" rows="5" placeholder=""></textarea>
                </div>

              </div>


              <div class="row">

                <div class="col-md-12 mt-3">
                  <button type="submit" value="submit" class="btn pull-right" id="btn_submit" >submit</button>
                </div>

              </div>

              </form>


              <?php endif ?>
              
              



            </div>
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <?php include('footer.php'); ?>
