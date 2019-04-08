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
                  $db->select('user_feedbacks_view','*',NULL,'userId = "' . $_SESSION['userId'] . '"', "userFeedbackId DESC"); 
                  $output = $db->getResult();
                  foreach ($output as $res) { ?>     

                  <tr>
          
                    <td><?php echo date('F d, Y',strtotime($res['userFeedbackDate'])); ?></td>
                    <td><?php echo $res['userFeedback']; ?></td>
                    <td><?php
                      $d = $res['userFeedbackStatus']; 
                    if ($d == 0) {
                        $status =  "Pending";
                    }elseif ($d == 1) {
                        $status = 'Approved';
                    }
                    elseif ($d == 2) {
                        $status = 'Disapproved';
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
