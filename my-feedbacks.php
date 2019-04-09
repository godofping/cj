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
            <div class="col-md-6"></div>
            <div class="col-md-6"> 
   

              <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-feedback'): ?>
                    <div class="alert alert-success" role="alert">
                    Feedback submitted.
                  </div>
              <?php endif ?>

           
              <form role="form" id="contact_form" class="contact-form" method="post" action="controller.php?from=add-feedback" autocomplete="off">
                <ul class="row">
                  <li class="col-sm-12">
                    <label>Submit a feedback.
                      <textarea class="form-control" required="" name="userFeedback" id="userFeedback" rows="5" placeholder=""></textarea>
                    </label>

                  </li>
                

                  <li class="col-sm-12">
                    <button type="submit" value="submit" class="btn pull-right" id="btn_submit" >submit</button>
                  </li>
                </ul>
              </form>
            </div>
          </div>

          
          <div class="row">

            <div class="col-md-12"> 
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="pr-5">Date submitted</th>
                    <th scope="col">Feedback</th>
                
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
