
<?php include('header.php'); ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
<!--             <li class="breadcrumb-item">pages</li> -->
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
   
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

     <div class="row">
        <div class="col-md-12">
                <!-- Column -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Notifications</h4>
               

                    <div class="comment-widgets m-b-20">


                    <hr>

                    <?php

                    $db->select('notifications_table','*',NULL,'administratorUserId = "' . $_SESSION['administratorUserId'] . '"', "notificationDateTime DESC LIMIT 100"); 
                    $output = $db->getResult();

                    if (empty($output)) { ?>
                      
                    <div class="row mt-5">
                      <div class="col-md-12">
                        <h4 class = 'float-left'>No notification</h4>
                      </div>
                    </div>

                    <?php }

                    foreach ($output as $res) { ?>


                    <a href="manage-order.php?orderId=<?php echo $res['orderId'] ?>">
                        <div class="d-flex flex-row comment-row">
                            <div class="comment-text w-100">
                                <h5><?php echo $res['notificationMessage']; ?></h5>
                                <div class="comment-footer">
                 
                                    <p class="m-b-5 m-t-10" class="date"><?php echo date('F d, Y g:i A', strtotime($res['notificationDateTime'])); ?></p>
                                
                                </div>
                            </div>
                        </div>
                    </a>

                    <?php } 

                    $db->update('notifications_table',
                    array(
                      'notificationIsRead'=>1,
                      ),
                      'administratorUserId=' . $_SESSION['administratorUserId']
                    );

                    ?>

           

                </div>
            </div>
        </div>

    </div>



    </div>

   
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
         
<?php include('footer.php'); ?>
