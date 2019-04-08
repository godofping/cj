<?php include('header.php'); 

?>
  

  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <div class="heading text-center">
          <h4>Notifications</h4>
          <hr>
        </div>
      </div>
    </div>
  </section>
  
  <div id="content"> 

    <section class="history-block padding-top-100 padding-bottom-100">
      <div class="container">

      
        <hr>

        <?php

        $db->select('notifications_table','*',NULL,'userId = "' . $_SESSION['userId'] . '"', "notificationDateTime DESC LIMIT 100"); 
        $output = $db->getResult();

        if (empty($output)) { ?>
          
        <div class="row mt-5">
          <div class="col-md-12">
            <h4 class = 'float-left'>No notification</h4>
          </div>
        </div>

        <?php }

        foreach ($output as $res) { ?>

        <a href="order-details.php?orderId=<?php echo base64_encode($res['orderId']) ?>">
          <div class="row">
          <div class="col-md-12">
            <div class="about-us-con">
              <h6><?php echo $res['notificationMessage']; ?></h6>
              <p class="pull-left"><?php echo date('F d, Y g:i A', strtotime($res['notificationDateTime'])); ?><br>
            </div>
          </div>
        </div>

        </a>

        <?php } 


        $db->update('notifications_table',
        array(
          'notificationIsRead'=>1,
          ),
          'userId=' . $_SESSION['userId']
        );

        ?>

        <hr>



      </div>
    </section>
    
  </div>
  <?php include('footer.php'); ?>
