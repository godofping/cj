<?php 
include('header.php');

$db->select('customers_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>

<?php if (!isset($_SESSION['customerId'])): ?>
  <script type="text/javascript">window.location.replace("index.php");</script>
<?php endif ?>
  

  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <div class="heading text-center">
          <h4>My Feedbacks</h4>
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

            <div class="col-md-12"> 
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Date submitted</th>
                    <th scope="col">Feedback</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $db->select('customer_feedbacks_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '"', "customerFeedbackId ASC"); 
                  $output = $db->getResult();
                  foreach ($output as $res) { ?>     

                  <tr>
          
                    <td><?php echo date('F d, Y',strtotime($res['customerFeedbackDate'])); ?></td>
                    <td><?php echo $res['customerFeedback']; ?></td>
                    <td><?php
                      $d = $res['customerFeedbackStatus']; 
                    if ($d == 0) {
                        $status =  "Pending";
                    }elseif ($d == 1) {
                        $status = 'Approved';
                    } 

                    echo $status; ?></td>


                  </tr>

                <?php } ?>

                </tbody>
              </table>

             
            </div>


        

            
          </div>
        </div>
      </div>
    </section>
    

  </div>
  <?php include('footer.php'); ?>
