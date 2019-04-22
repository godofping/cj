<?php
include('dashboard/connection.php');


if (!isset($_GET['admin'])) {
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
	else{
		$db->select('orders_view','*',NULL,'orderId = "' . base64_decode($_GET['orderId']) . '"', NULL); 
	  	$res = $db->getResult(); $res = $res[0];

	}
	}
}
else
{
	$db->select('orders_view','*',NULL,'orderId = "' . base64_decode($_GET['orderId']) . '"', NULL); 
	$res = $db->getResult();$res = $res[0];
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
<title>CJ Ashley Fashion Hub</title>
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

<style type="text/css">

@page {margin:0 -6cm}
html {margin:0 6cm}
html {margin-top: 60px}
</style>


<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900|Poppins:300,400,500,600,700|Montserrat:300,400,500,600,700,800" rel="stylesheet">



</head>
<body>


<div id="content"> 

<section class=" padding-bottom-100">
  <div class="container">

      <div style="text-align: center; margin-bottom: 20px;"><img src="https://i.imgur.com/yjxycNt.jpg" height= "100px" /></div>

      <div class="row">
     	<div class="col-md-12">
     		<h4 class="text-center">Acknowledgement Receipt</h4>
     	</div>
      </div>

      <div class="row">
     	<div class="col-md-12">
     		<h6 class="text-right">Date: <?php echo date('F d, Y', strtotime(date('Y-m-d'))); ?></h6>
     	</div>
      </div>

      <div class="row">
     	<div class="col-md-12">
     		<h6 class="text-right">Order number: <?php echo base64_decode($_GET['orderId']) ?></h6>
     	</div>
      </div>

      <div class="row mt-5">
     	<div class="col-md-12">
     		<h5 class="text-left">Customer: <b><?php echo $res['billingFirstName']; ?> <?php echo $res['billingLastName']; ?></b></h5>
     	</div>
      </div>

      <div class="row">
     	<div class="col-md-12">
     		<h5 class="text-left">Address: <b><?php echo $res['billingAddress']; ?></b></h5>
     	</div>
      </div>

      <div class="row">
     	<div class="col-md-12">
     		<h5 class="text-left">For Items:</h5>
     	</div>
      </div>

      <div class="row">
      	<div class="col-md-12">
      		<div class="table-responsive">
                <table class="table">
                <thead>

                  <tr>

                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
   
  

                  </tr>

                </thead>
                <tbody>
                <?php

                  $db->select('order_details_view','*',NULL,'orderId = "' . base64_decode($_GET['orderId']) . '"', NULL); 

                  $output = $db->getResult();
                  $sum = 0;
                  foreach ($output as $res) { ?>     

                  <tr>

                  	<td><?php echo $res['productName']; ?> (<?php echo $res['productOption1']; ?> <?php echo $res['productOption2']; ?>)</td>
                  	<td><?php echo $res['quantity']; ?></td>
                   	<td>₱<?php echo number_format($res['price'], 2); ?></td>
                   	<td>₱<?php echo $sum = $res['price'] * $res['quantity']; number_format($sum,2); ?></td>

                  </tr>

                <?php } ?>

                </tbody>
              </table>

              <hr>
              <div class="float-right" style="text-align: right">
              <p>Shipping Fee: ₱<?php echo number_format($res['orderShippingFee'], 2); $sum = $sum + $res['orderShippingFee'] ?> </p>
              <h6>Total: ₱<?php echo number_format($sum, 2); ?>	</h6>
              </div>

            </div>

      	</div>
      </div>

      <div class="row mt-5">
     	<div class="col-md-12">
     		<h5 class="text-left">I, the customer, acknowledge that I have received the above item(s).</h5>
     	</div>
      </div>

      <div class="row mt-5">
     	<div class="col-md-12">
     		<h5 class="text-right">Customer Signature __________________</h5>
     	</div>
      </div>



  </div>
</section>


</div>

<script type="text/javascript">
	window.print();
	setTimeout(window.close, 0);
</script>

</body>
</html>
<?php unset($_SESSION['toast']) ?>
