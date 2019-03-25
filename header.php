<?php
include('dashboard/connection.php');
$filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');
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
      
      <!-- Login Info -->
      <div class="login-info">
        <ul>
          <?php if (!isset($_SESSION['customerId'])): ?>
          <li><a href="login.php?show=login">LOGIN/REGISTER</a></li>
          <?php endif ?>
          <?php if (isset($_SESSION['customerId'])): ?>
          <li><a href="#."> MY ACCOUNT </a></li>
  
          
          <!-- USER BASKET -->
          <li class="dropdown user-basket"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> (2) Items <i class="icon-basket-loaded"></i> </a>
            <ul class="dropdown-menu">
              <li>
                <div class="media-left">
                  <div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="images/cart-img-1.jpg" alt="..."> </a> </div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading">Rise Skinny Jeans</h6>
                  <span class="price">129.00 USD</span> <span class="qty">QTY: 01</span> </div>
              </li>
              <li>
                <div class="media-left">
                  <div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="images/cart-img-2.jpg" alt="..."> </a> </div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading">Mid Rise Skinny Jeans</h6>
                  <span class="price">129.00 USD</span> <span class="qty">QTY: 01</span> </div>
              </li>
              <li>
                <h5 class="text-left">SUBTOTAL: <small> 258.00 USD </small></h5>
              </li>
              <li class="margin-0">
                <div class="row">
                  <div class="col-sm-6"> <a href="shopping-cart.html" class="btn">VIEW CART</a></div>
                  <div class="col-sm-6 "> <a href="checkout.html" class="btn">CHECK OUT</a></div>
                </div>
              </li>
            </ul>
          </li>
          <li><a href="controller.php?from=logout">LOGOUT</a></li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </div>
  
  <!-- header -->
  <header>
    <div class="sticky">
      <div class="container-full"> 
        
        <!-- Logo -->
        <div class="logo"> <a href="index.html"><img class="img-responsive" height="50px" src="images/logo.jpg" alt="" ></a> </div>
        <nav class="navbar ownmenu navbar-expand-lg ">
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span></span> </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav">
              <li class="active"> <a href="contact.html"> Home</a> </li>
              <li class="dropdown"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Categories</a>
                <ul class="dropdown-menu">

          		<?php 
          		$db->select('product_categories_view'); 
				$output = $db->getResult();
				foreach ($output as $res) { ?>
					<li> <a href="shop_03.html"><?php echo $res['productCategory']; ?> </a> </li>
				<?php }?>
                  
           


                </ul>
              </li>
              <li> <a href="about-us_01.html">About </a> </li>
              <li> <a href="about-us_01.html">Feedbacks </a> </li>
              


              <li> <a href="contact.html"> contact</a> </li>
            </ul>
          </div>
        </nav>
       
      </div>
    </div>
    <div class="clearfix"></div>
  </header>