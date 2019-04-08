<?php
include('dashboard/connection.php');
$filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');

if ($filename != "finish-registration" and isset($_SESSION['userId'])) {
  $db->select('users_table','*',NULL,'userId = "' . $_SESSION['userId'] . '"', NULL); 
  $res = $db->getResult(); $res = $res[0];

  if ($res['userFirstName'] == '' and $res['userLastName'] == '' and $res['userAddress'] == '' and $res['userPhoneNumber'] == '') { ?>
     <script type="text/javascript">window.location.replace("finish-registration.php");</script>
  <?php }



if ($res['userIsBlocked'] == 1 and isset($_SESSION['userId']) and $filename <> "login") {
  echo '<script type="text/javascript">window.location.replace("controller.php?from=logout");</script>';
}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="M_Adnan">
<title>CJ-Ashley Fashion Hub</title>
<link rel="icon" type="image/png" sizes="16x16" href="dashboard/etc/logo.jpg">


<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />


<link href="css/bootstrap.min.css" rel="stylesheet">


<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/ionicons.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link href="font/flaticon.css" rel="stylesheet">


<script src="js/modernizr.js"></script>


<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900|Poppins:300,400,500,600,700|Montserrat:300,400,500,600,700,800" rel="stylesheet">


</head>
<body>


<div id="loader">
  <div class="position-center-center">
    <div class="ldr"></div>
  </div>
</div>


<div id="wrap"> 
  

  <div class="top-bar">
    <div class="container-full">
      <p><i class="icon-envelope"></i> cjashley@gmail.com </p>
      <p class="call"> <i class="icon-call-in"></i> 0975 436 3955 </p>
      
 
    </div>
  </div>
  

  <header>
    <div class="sticky">
      <div class="container-full"> 
        
     
        <div class="logo"> <a href="index.php"><img class="img-responsive" height="30px" src="images/logo.jpg" alt="" ></a> </div>
        <nav class="navbar ownmenu navbar-expand-lg ">
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span></span> </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            
            <ul class="nav">
              <li class="<?php if ($filename == 'index'): ?>active<?php endif ?>"> <a href="index.php"> Home</a> </li>
              <li class="dropdown <?php if ($filename == 'shop' or $filename == 'product-details'): ?>active<?php endif ?>""> <a href="#." class="dropdown-toggle" data-toggle="dropdown">Categories</a>
                <ul class="dropdown-menu">
                <?php 
                $db->select('product_categories_view'); 
                $output = $db->getResult();
                foreach ($output as $res) { ?>
                  <li class="dropdown"> <a href="shop.php?productCategoryId=<?php echo $res['productCategoryId'] ?>"><?php echo $res['productCategory']; ?> </a>
                  <ul class="dropdown-menu animated-3s fadeInRightSm">
                    <?php 
                    $db->select('product_sub_categories_view','*',NULL,'productCategoryId = "' . $res['productCategoryId'] . '"', NULL); 
                    $output1 = $db->getResult();
                    foreach ($output1 as $res1) { ?>
                      <li> <a href="shop.php?productCategoryId=<?php echo $res['productCategoryId'] ?>&productSubCategoryId=<?php echo $res1['productSubCategoryId'] ?>"><?php echo $res1['productSubCategory']; ?> </a> </li>
                    <?php }?>
                  </ul>
                </li>

                <?php }?>

                </ul>
              </li>
              <?php if (isset($_SESSION['userId'])): ?>
              <li class="dropdown <?php if ($filename == 'my-profile' or $filename == 'my-orders' or $filename == 'reviews' or $filename == 'order-details' or $filename == 'my-reviews' or $filename == 'review'): ?>active<?php endif ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account</a>
                <ul class="dropdown-menu">
                  <li> <a href="my-feedbacks.php">My Feedbacks</a> </li>
                  <li> <a href="my-orders.php?selected=All">My Orders </a> </li>
                  <li> <a href="my-profile.php">My Profile </a> </li>
                  <li> <a href="my-reviews.php?selected=All">My Reviews </a> </li>
                </ul>
              </li>
              <?php endif ?>

              <li class="<?php if ($filename == 'feedbacks'): ?>active<?php endif ?>"> <a href="feedbacks.php">Feedbacks </a> </li>
              <li class="<?php if ($filename == 'about'): ?>active<?php endif ?>"> <a href="about.php">About </a> </li>
              <li class="<?php if ($filename == 'contact'): ?>active<?php endif ?>"> <a href="contact.php">Contact </a> </li>
              <?php if (!isset($_SESSION['userId'])): ?>
              <li class="<?php if ($filename == 'login'): ?>active<?php endif ?>"> <a href="login.php?show=login">Login/Register </a> </li>
              <?php endif ?>
              <?php if (isset($_SESSION['userId'])): ?>
              <li class="<?php if ($filename == 'login'): ?>active<?php endif ?>"> <a href="controller.php?from=logout">Logout </a> </li>
              <?php endif ?>

              
            </ul>
          </div>


          <?php if (isset($_SESSION['userId'])): ?>
    
            <div class="nav-right">
                <ul class="navbar-right">

                  <?php 
                    $db->select('orders_view', '*', NULL, 'userId = "' . $_SESSION['userId']  .'" and orderStatus = "On Cart"');
                    $res = $db->getResult();

                    if (!empty($res)) {
                       $res = $res['0'];
                       $orderId = $res['orderId'];
                       $db->select('order_details_view', 'sum(quantity) as total', NULL, 'orderId = "' . $res['orderId']  . '" and orderStatus = "On Cart"');
                        $res = $db->getResult(); $res = $res['0'];

                        if ($res['total'] == '') {
                          $total = 0;
                        }
                        else
                        {
                          $total = $res['total'];
                        }
                    }
                    else
                    {
                      $total = 0;
                    }

                  ?>
        
                  <li> <a href="shopping-cart.php"><span class="c-no"><?php echo $total; ?></span><i class="lnr lnr-cart"></i> </a> </li>
                  <li> <a href="my-notifications.php"><span class="c-no" id="notificationCounter">0</span><i class="lnr lnr-alarm"></i> </a> </li>

                </ul>
            </div>
          <?php endif ?>


        </nav>
       
      </div>
    </div>
    <div class="clearfix"></div>
  </header>