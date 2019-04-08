<?php 
include('header.php');

$db->select('users_view','*',NULL,'userId = "' . $_SESSION['userId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>

<?php if (!isset($_SESSION['userId'])): ?>
  <script type="text/javascript">window.location.replace("index.php");</script>
<?php endif ?>

  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <div class="heading text-center">
          <h4>My Reviews</h4>
          <hr>
        </div>
      </div>
    </div>
  </section>  
  

  <div id="content"> 
    
    <section class="contact padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="contact-form">
          
          <div class="row">


            <div class="col-md-3">

              <form role="form" id="contact_form" class="contact-form" method="post" action="controller.php?from=place-order" autocomplete="off" enctype="multipart/form-data">

              <div class="form-group">
      
                <select id="filter" class="form-control">
                  <option readonly selected value="<?php echo $_GET['selected']; ?>"><?php echo $_GET['selected']; ?></option>
                  <option value="All">All</option>
                  <option value="Already reviewed">Already reviewed</option>
                  <option value="Not yet reviewed">Not yet reviewed</option>

                </select>
                
              </div>

              </form>
            </div>

            <div class="col-md-12"> 
          
              <div class="table-responsive">
                <table class="table">
                <thead>

                  <tr>

                    <th scope="col"></th>
                    <th scope="col">Product</th>
                    <th>Status</th>
                    <th scope="col">Actions</th>

                  </tr>

                </thead>
                <tbody>
                <?php

                  $db->select('order_details_view','*',NULL,'userId = "' . $_SESSION['userId'] . '" and orderStatus = "Finished" GROUP BY productVariationId', NULL); 
                  $output = $db->getResult();
                  foreach ($output as $res) { 

                  $db->select('product_images_view','*',NULL,'productId = "' . $res['productId'] . '" and isThumbnail = 1', NULL); 
                  $imgres = $db->getResult(); $imgres = $imgres[0];

                  ?>

                  <?php
                  $db->select('product_reviews_view','count(*) as total',NULL,'productVariationId = "' . $res['productVariationId'] . '" and userId = "' . $_SESSION['userId'] . '"', NULL); 
                  $output1 = $db->getResult(); $res1 = $output1[0];
                  if ($res1['total'] > 0) {
                    $string = "Already reviewed";
                  }
                  else
                  {
                    $string = "Not yet reviewed";
                  }

                  $selected = $_GET['selected'];

                  if ($selected == $string or $selected == 'All') {
                  ?>     

                  <tr>
                    <td><img style="height: 100px;" src="dashboard/images/<?php echo $imgres['productImageLocation'] ?>" class="img-thumbnail"></td>
                    <td><?php echo $res['productName']; ?> (<?php echo $res['productOption1']; ?> <?php echo $res['productOption2']; ?>)</td>
                    <td><?php echo $string; ?></td>
                    <td>
                      <?php if ($string == "Not yet reviewed"): ?>
                      <a href="review.php?productVariationId=<?php echo $res['productVariationId'] ?>"><button type="submit" value="submit" class="btn" id="btn_submit" >Review</button></a>
                      <?php endif ?>


                    </td>
                  </tr>
                <?php } ?>

                <?php } ?>

                </tbody>
              </table>
              </div>

             
            </div>
          </div>
          
        </div>
      </div>
    </section>
    

  </div>
  <?php include('footer.php'); ?>

<script type="text/javascript">
  
$( "#filter" ).change(function() {
  var selectedValue = $( "#filter option:selected" ).text();
  window.location.replace("my-reviews.php?selected="+selectedValue);
});

</script>