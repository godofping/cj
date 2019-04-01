<?php
include('dashboard/connection.php');
$filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');

if ($filename != "finish-registration" and isset($_SESSION['customerId'])) {
  $db->select('customers_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '"', NULL); 
  $res = $db->getResult(); $res = $res[0];

  if ($res['customerFirstName'] == '' and $res['customerLastName'] == '' and $res['customerAddress'] == '' and $res['customerPhoneNumber'] == '') { ?>
     <script type="text/javascript">window.location.replace("finish-registration.php");</script>
  <?php }
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

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/ionicons.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link href="font/flaticon.css" rel="stylesheet">

<!-- JavaScripts -->
<script src="js/modernizr.js"></script>

<!-- Online Fonts -->
<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900|Poppins:300,400,500,600,700|Montserrat:300,400,500,600,700,800" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<!-- LOADER -->
<div id="loader">
  <div class="position-center-center">
    <div class="ldr"></div>
  </div>
</div>

<!-- Wrap -->
<div id="wrap"> 
  
  <!-- TOP Bar -->
  <div class="top-bar">
    <div class="container-full">
      <p><i class="icon-envelope"></i> cjashley@gmail.com </p>
      <p class="call"> <i class="icon-call-in"></i> 0975 436 3955 </p>
      
 
    </div>
  </div>
  
  <!-- header -->
  <header>
    <div class="sticky">
      <div class="container-full"> 
        
        <!-- Logo -->
        <div class="logo"> <a href="index.php"><img class="img-responsive" height="30px" src="images/logo.jpg" alt="" ></a> </div>
        <nav class="navbar ownmenu navbar-expand-lg ">
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span></span> </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            
            <ul class="nav">
              <li class="<?php if ($filename == 'index'): ?>active<?php endif ?>"> <a href="index.php"> Home</a> </li>
              <li class="dropdown <?php if ($filename == 'shop'): ?>active<?php endif ?>""> <a href="#." class="dropdown-toggle" data-toggle="dropdown">Categories</a>
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
              <?php if (isset($_SESSION['customerId'])): ?>
              <li class="dropdown <?php if ($filename == 'profile' or $filename == 'orders' or $filename == 'reviews'): ?>active<?php endif ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account</a>
                <ul class="dropdown-menu">
                  <li> <a href="shopping-cart.php">Shopping Cart</a> </li>
                  <li> <a href="my-feedback.php">My Feedbacks</a> </li>
                  <li> <a href="my-feedback.php">Notifications</a> </li>
                  <li> <a href="orders.php">Orders </a> </li>
                  <li> <a href="profile.php">Profile </a> </li>
                  <li> <a href="reviews.php">Reviews </a> </li>
                </ul>
              </li>
              <?php endif ?>

              <li class="<?php if ($filename == 'feedbacks'): ?>active<?php endif ?>"> <a href="feedbacks.php">Feedbacks </a> </li>
              <li class="<?php if ($filename == 'about'): ?>active<?php endif ?>"> <a href="about.php">About </a> </li>
              <li class="<?php if ($filename == 'contact'): ?>active<?php endif ?>"> <a href="contact.php">Contact </a> </li>
              <?php if (!isset($_SESSION['customerId'])): ?>
              <li class="<?php if ($filename == 'login'): ?>active<?php endif ?>"> <a href="login.php?show=login">Login/Register </a> </li>
              <?php endif ?>
              <?php if (isset($_SESSION['customerId'])): ?>
              <li class="<?php if ($filename == 'login'): ?>active<?php endif ?>"> <a href="controller.php?from=logout">Logout </a> </li>
              <?php endif ?>

              
            </ul>
          </div>


          <?php if (isset($_SESSION['customerId'])): ?>
            <!-- Nav Right -->
            <div class="nav-right">
                <ul class="navbar-right">

                  <?php 
                    $db->select('orders_view', '*', NULL, 'customerId = "' . $_SESSION['customerId']  .'" and orderStatus = "On Cart"');
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
                  <!-- USER BASKET -->
                  <li> <a href="shopping-cart.php"><span class="c-no"><?php echo $total; ?></span><i class="lnr lnr-cart"></i> </a> </li>
       

                </ul>
            </div>
          <?php endif ?>


        </nav>
       
      </div>
    </div>
    <div class="clearfix"></div>
  </header>