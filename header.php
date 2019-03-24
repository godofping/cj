<?php
include('dashboard/connection.php');


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
          <li><a href="login.html">LOGIN</a></li>
          <?php if (isset($_SESSION['customerId'])): ?>
          <li><a href="#."> MY ACCOUNT </a></li>
          <li><a href="shopping-cart.html">MY CART</a></li>
          
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
        <div class="logo"> <a href="index.html"><img class="img-responsive" src="images/logo.svg" alt="" ></a> </div>
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
              
              <!-- Two Link Option -->
              <li class="dropdown"> <a href="#." class="dropdown-toggle" data-toggle="dropdown">Collection</a>
                <div class="dropdown-menu two-option">
                  <div class="row">
                    <ul class="col-sm-6">
                      <li> <a href="index-2.html"> Summer Store</a></li>
                      <li> <a href="index-2.html"> Sarees</a></li>
                      <li> <a href="index-2.html"> Kurtas</a></li>
                      <li> <a href="index-2.html"> Shorts & tshirts</a></li>
                      <li> <a href="index-2.html"> Winter wear</a></li>
                      <li> <a href="index-2.html"> Jeans</a></li>
                      <li> <a href="index-2.html"> Bra</a></li>
                      <li> <a href="index-2.html"> Babydools</a> </li>
                    </ul>
                    <ul class="col-sm-6">
                      <li> <a href="index-2.html"> Deodornts</a></li>
                      <li> <a href="index-2.html"> Skin care</a></li>
                      <li> <a href="index-2.html"> Make up</a></li>
                      <li> <a href="index-2.html"> Watch</a></li>
                      <li> <a href="index-2.html"> Siting bags</a></li>
                      <li> <a href="index-2.html"> Totes</a></li>
                      <li> <a href="index-2.html"> Gold rings</a></li>
                      <li> <a href="index-2.html"> Jewellery</a> </li>
                    </ul>
                  </div>
                </div>
              </li>
              
              <!-- MEGA MENU -->
              <li class="dropdown megamenu"> <a href="#." class="dropdown-toggle" data-toggle="dropdown">Mega Store</a>
                <div class="dropdown-menu">
                  <div class="row"> 
                    
                    <!-- Shop Pages -->
                    <div class="col-md-5">
                      <h6>Shop Pages</h6>
                      <ul class="col-2-li">
                        <li> <a href="shop_02.html">Shop Full Left Sidebar</a> </li>
                        <li> <a href="shop_03.html">Shop Shop Right Sidebar </a> </li>
                        <li> <a href="shop_04.html">Shop Creative Layout </a> </li>
                        <li> <a href="shop_01.html">Shop </a></li>
                        <li> <a href="shop_6_col.html">Shop 06 Col </a> </li>
                        <li> <a href="shop_5_col.html">Shop 05 Col </a> </li>
                        <li> <a href="shop_4_col.html">Shop 04 Col </a> </li>
                        <li> <a href="shop_3_col.html">Shop 03 Col </a> </li>
                        <li> <a href="product-detail_01.html">Products Detail 01</a> </li>
                        <li> <a href="product-detail_02.html">Products Detail 02</a> </li>
                        <li> <a href="product-detail_03.html">Products Detail 03</a> </li>
                        <li> <a href="shopping-cart.html">Shopping Cart</a> </li>
                        <li> <a href="checkout.html">Checkout</a> </li>
                        <li> <a href="about-us_01.html">About Us</a> </li>
                        <li> <a href="contact.html">Contact</a> </li>
                        <li> <a href="blog-list_01.html">Blog List 01</a> </li>
                        <li> <a href="blog-detail_01.html">Blog Detail 01 </a> </li>
                      </ul>
                    </div>
                    
                    <!-- Shop Pages -->
                    <div class="col-md-3">
                      <h6>Latest items</h6>
                      <ul>
                        <li> <a href="index-2.html"> Deodornts</a></li>
                        <li> <a href="index-2.html"> Skin care</a></li>
                        <li> <a href="index-2.html"> Make up</a></li>
                        <li> <a href="index-2.html"> Watch</a></li>
                        <li> <a href="index-2.html"> Siting bags</a></li>
                        <li> <a href="index-2.html"> Totes</a></li>
                        <li> <a href="index-2.html"> Gold rings</a></li>
                        <li> <a href="index-2.html"> Jewellery</a> </li>
                      </ul>
                    </div>
                    
                    <!-- Top Rate -->
                    <div class="col-md-4">
                      <h6>Top Rate Products</h6>
                      <div class="top-rated">
                        <ul>
                          <li>
                            <div class="media-left">
                              <div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="images/cart-img-1.jpg" alt="..."> </a> </div>
                            </div>
                            <div class="media-body">
                              <h6 class="media-heading">Best T-Shirt Design</h6>
                              <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                              <span class="price">129.00 USD</span> </div>
                          </li>
                          <li>
                            <div class="media-left">
                              <div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="images/cart-img-2.jpg" alt="..."> </a> </div>
                            </div>
                            <div class="media-body">
                              <h6 class="media-heading">Bag Pack for Child</h6>
                              <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                              <span class="price">129.00 USD</span> </div>
                          </li>
                          <li>
                            <div class="media-left">
                              <div class="cart-img"> <a href="#"> <img class="media-object img-responsive" src="images/cart-img-3.jpg" alt="..."> </a> </div>
                            </div>
                            <div class="media-body">
                              <h6 class="media-heading">Bag Pack for Child</h6>
                              <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                              <span class="price">129.00 USD</span> </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  
                  <!-- MEga Menu Elements -->
                  <div class="mega-menu-elements"> <img src="images/nav-img.png" alt="" > <a href="#." class="btn btn-inverse">Shop Now</a> </div>
                </div>
              </li>
              <li> <a href="contact.html"> contact</a> </li>
            </ul>
          </div>
        </nav>
        
        <!-- Curency -->
        <div class="curency"> <a href="#." class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> USD<i class="fa fa-angle-down"></i> </a>
          <div class="dropdown-menu"> <a class="dropdown-item" href="#">EU</a> <a class="dropdown-item" href="#">USD</a> <a class="dropdown-item" href="#">CA</a> <a class="dropdown-item" href="#">PKR</a> </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </header>