
<?php 
include('connection.php');

if (isset($_GET['from']) and $_GET['from'] == 'login') {
	
	$userEmail = $db->escapeString($_POST['userEmail']);
	$userPassword = $db->escapeString(md5($_POST['userPassword']));

	$db->select('staffs_view', '*', NULL, 'userEmail = "' . $userEmail  .'" and userPassword = "' . $userPassword . '"');
	$res = $db->getResult();

	if (count($res) > 0) {

		$res = $res[0];

		if ($res['userIsActivated'] == 0) {

			$d = base64_encode(date('Y-m-d H:i:s') . ";staffactivation;" . $userEmail);
			$msg = "Please click the link to activate your account. http://cjashleyfashionhub.tk/staff/index.php?d=".$d ."";

			mail($userEmail,"Activate Account - Staff (CJ Ashley Fasion Hub)",$msg);


			$_SESSION['toast'] = 'activate-account';
			header("Location: index.php");
		}
		else
		{

			$_SESSION['userType'] = $res['userType'];
			$_SESSION['userEmail'] = $res['userEmail'];
			$_SESSION['userFirstName'] = $res['userFirstName'];
			$_SESSION['userLastName'] = $res['userLastName'];
			$_SESSION['staffFullName'] = $res['staffFullName'];
	                           

			$_SESSION['toast'] = 'login-successful';

			if ($res['userIsBlocked'] == 1) {

				$_SESSION['toast'] = 'staff-account-blocked';

				header("Location: index.php");

			}
			else
			{
				$_SESSION['userId'] = $res['userId'];
				header("Location: dashboard.php");
			}
		}

	}
	else
	{
		$_SESSION['toast'] = 'login-failed';
		header("Location: index.php");
	}

}

if (isset($_GET['from']) and $_GET['from'] == 'logout') {
	session_destroy();
	header("Location: index.php");
}



if (isset($_GET['from']) and $_GET['from'] == 'update-profile') {

	$userFirstName = $db->escapeString($_POST['userFirstName']);
	$userLastName = $db->escapeString($_POST['userLastName']);
	$userPhoneNumber = $db->escapeString($_POST['userPhoneNumber']);

	$db->update('users_table',
	array(
		'userFirstName'=>$userFirstName,
		'userLastName'=>$userLastName,
		'userPhoneNumber'=>$userPhoneNumber,
		),
		'userId=' . $_SESSION['userId']
	);

	$res = $db->getResult();

	header("Location: update-profile.php");
	$_SESSION['toast'] = 'update-profile';
	$_SESSION['staffFullName'] = $userFirstName . " " . $userLastName;

}


if (isset($_GET['from']) and $_GET['from'] == 'add-cart') {

	$quantity = $db->escapeString(1);
	$productVariationId = $db->escapeString($_GET['productVariationId']);
	$productPrice = $db->escapeString($_GET['productPrice']);
	


	$db->select('orders_table','count(*) as total',NULL,'userId = "' . $_SESSION['userId'] . '" and orderStatus = "On Cart"', NULL); 
	$res = $db->getResult(); $res = $res[0];

	if ($res['total'] == 0) {

		$db->insert('orders_table',
		array(
			'orderType'=>'Online',
			'orderStatus'=>'On Cart',
			'userId'=>$_SESSION['userId'],
			)
		);

		$res = $db->getResult();
		$orderId =  $res[0];

		echo "cart created with the orderId " . $orderId . " <br>";

	}
	else
	{
		$db->select('orders_table','*',NULL,'userId = "' . $_SESSION['userId'] . '" and orderStatus = "On Cart"', NULL); 
		$res = $db->getResult(); $res = $res[0];
		$orderId = $res['orderId'];

		echo "cart is alreaedy created with the orderId " . $orderId . " <br>";
	}


		$db->select('order_details_view','*, count(*) as total',NULL,'productVariationId = "' . $productVariationId . '" and orderId = "' . $orderId .  '"', NULL); 
		$res = $db->getResult(); $res = $res[0];
	

	if ($res['total'] > 0) {
		$totalQuantity =  $res['quantity'] + $quantity;
		$orderDetailId = $res['orderDetailId'];

		$db->update('order_details_table',
		array(
			'quantity'=>$totalQuantity,
			'price'=>$productPrice,

			),
			'orderDetailId=' . $orderDetailId
		);

		$res = $db->getResult();

		echo "the item is already added. quantity is increased <br>";
	}
	else
	{
		$db->insert('order_details_table',
		array(
			'quantity'=>$quantity,
			'productVariationId'=>$productVariationId,
			'price'=>$productPrice,
			'orderId'=>$orderId,
			)
		);

		$res = $db->getResult();

		print_r($res);

		echo "<br>the item is not yet exist in the card. so the item is inserted. <br>";
	}

	

	header("Location: shopping-cart.php");
	$_SESSION['toast'] = 'add-cart';
}



if (isset($_GET['from']) and $_GET['from'] == 'update-password') {

	$oldPassword = $db->escapeString(md5($_POST['oldPassword']));
	$newPassword = $db->escapeString(md5($_POST['newPassword']));
	$confirmNewPassword = $db->escapeString(md5($_POST['confirmNewPassword']));
	$userPassword = $db->escapeString($_POST['userPassword']);


	if (($oldPassword == $userPassword) and ($newPassword == $confirmNewPassword)) {
		$db->update('users_table',
		array(
			'userPassword'=>$newPassword,

			),
			'userId=' . $_SESSION['userId']
		);

		$res = $db->getResult();
		$_SESSION['toast'] = 'update-password';
	}
	else
	{
		$_SESSION['toast'] = 'update-password-failed';
	}

	header("Location: change-password.php");
	
}


if (isset($_GET['from']) and $_GET['from'] == 'empty-cart') {

	$orderId = $db->escapeString($_GET['orderId']);

	$db->delete('order_details_table','orderId = "' . $orderId .  '"');
	$db->getResult();  


	$_SESSION['toast'] = 'empty-cart';
	header("Location: shopping-cart.php");
	
}


if (isset($_GET['from']) and $_GET['from'] == 'update-cart') {

	$orderDetailId = $db->escapeString($_GET['orderDetailId']);
	$quantity = $db->escapeString($_POST['quantity']);
	$price = $db->escapeString($_GET['price']);



	$db->update('order_details_table',
	array(
		'quantity'=>$quantity,
		'price'=>$price,

		),
		'orderDetailId=' . $orderDetailId
	);

	$res = $db->getResult();

	$_SESSION['toast'] = 'update-cart';
	header("Location: shopping-cart.php");
	
}


if (isset($_GET['from']) and $_GET['from'] == 'remove-item') {

	$orderDetailId = $db->escapeString($_GET['orderDetailId']);

	$db->delete('order_details_table','orderDetailId = "' . $orderDetailId .  '"');
	$db->getResult();  



	$_SESSION['toast'] = 'remove-item';
	header("Location: shopping-cart.php");
	
}


if (isset($_GET['from']) and $_GET['from'] == 'place-order') {

	$orderId = $db->escapeString($_GET['orderId']);
	$orderPlacedDate = $db->escapeString(date('Y-m-d H:i:s'));
	$orderStatus = $db->escapeString("Finished");
	$orderTotalAmount = $db->escapeString($_GET['sum']);
	$orderPaymentStatus = $db->escapeString("Paid");
	

	//billing information
	$billingFirstName = $db->escapeString($_POST['billingFirstName']);
	$billingLastName = $db->escapeString($_POST['billingLastName']);
	$billingAddress = $db->escapeString($_POST['billingAddress']);
	$billingPhoneNumber = $db->escapeString($_POST['billingPhoneNumber']);
	$billingEmail = $db->escapeString($_POST['billingEmail']);

	$orderModeOfPayment = $db->escapeString("Walk In");

	$db->update('orders_table',
		array(
			'orderPlacedDate'=>$orderPlacedDate,
			'orderStatus'=>$orderStatus,
			'orderTotalAmount'=>$orderTotalAmount,
			'billingFirstName'=>$billingFirstName,
			'billingLastName'=>$billingLastName,
			'billingAddress'=>$billingAddress,
			'billingPhoneNumber'=>$billingPhoneNumber,
			'billingEmail'=>$billingEmail,
			'orderModeOfPayment'=>$orderModeOfPayment,
			'orderPaymentStatus'=>$orderPaymentStatus,
			

			),
			'orderId=' . $orderId
		);

	$res = $db->getResult();



	$orderDeliveryMethod = $db->escapeString("Pick Up");

	if ($orderDeliveryMethod == 'Pick Up') {
		$orderPickupDate = $db->escapeString(date('Y-m-d'));

		$db->update('orders_table',
		array(
			'orderDeliveryMethod'=>$orderDeliveryMethod,
			'orderPickupDate'=>$orderPickupDate,

			),
			'orderId=' . $orderId
		);

		$res = $db->getResult();

	}



		$db->select('order_details_view','*',NULL,'userId = "' . $_SESSION['userId'] . '" and orderId = "' . $orderId . '" ', NULL); 
	    $output = $db->getResult();
	    
	    
	    foreach ($output as $res) { 


	    	$productVariationId = $db->escapeString($res['productVariationId']);
	    	$inOrOut = $db->escapeString("Out");
	    	$quantity = $db->escapeString($res['quantity']);
	    	$transactionDateTime = $db->escapeString(date('Y-m-d H:i:s'));
			$inventoryLogRemark = $db->escapeString("The stocks is decreased by " . $quantity . " because of Order number " . $orderId . ".");

			$currentStocks = $res['productStock'] - $quantity;

	    	

	    	$db->insert('inventory_logs_table',
			array(
				'productVariationId'=>$productVariationId,
				'inOrOut'=>$inOrOut,
				'quantity'=>$quantity,
				'transactionDateTime'=>$transactionDateTime,
				'inventoryLogRemark'=>$inventoryLogRemark,
				)
			);

			$res = $db->getResult();



			$db->update('product_variations_table',
			array(
				'productStock'=>$currentStocks,

				),
				'productVariationId=' . $productVariationId
			);

			$res = $db->getResult();

	    }


	$db->select('administrators_view'); 
	$output = $db->getResult();

	foreach ($output as $res) {

		$administratorUserId = $db->escapeString($res['administratorUserId']);
		$notificationMessage = $db->escapeString("Order number " . $orderId . " was Finished.");
		$notificationDateTime = $db->escapeString(date('Y-m-d H:i:s'));
		$notificationIsRead = $db->escapeString(0);

		$db->insert('notifications_table',
		array(
			'administratorUserId'=>$administratorUserId,
			'notificationMessage'=>$notificationMessage,
			'notificationDateTime'=>$notificationDateTime,
			'notificationIsRead'=>$notificationIsRead,
			'orderId'=>$orderId,

			)
		);

		$res = $db->getResult();
	}



	//tae
	$paymentAmount = $db->escapeString($_GET['sum']);
	$orderId = $db->escapeString($_GET['orderId']);
	$paymentStatus = $db->escapeString("Recieved");
	$nameOfRemmitanceCenter = $db->escapeString("");
	$controlNumber = $db->escapeString("");
	$paymentTransactionDate = $db->escapeString(date('Y-m-d H:i:s'));
	$paymentRecieptImage = $db->escapeString("");


	$db->insert('payments_table',
	array(
		'paymentAmount'=>$paymentAmount,
		'orderId'=>$orderId,
		'paymentRecieptImage'=>$paymentRecieptImage,
		'paymentStatus'=>$paymentStatus,
		'nameOfRemmitanceCenter'=>$nameOfRemmitanceCenter,
		'controlNumber'=>$controlNumber,
		'paymentTransactionDate'=>$paymentTransactionDate,

		)
	);

	$output = $db->getResult();


	$db->select('administrators_view'); 
	$output = $db->getResult();

	foreach ($output as $res) {


		$administratorUserId = $db->escapeString($res['administratorUserId']);
		$notificationMessage = $db->escapeString("Order number " . $orderId . " payment was recieved.");
		$notificationDateTime = $db->escapeString(date('Y-m-d H:i:s'));
		$notificationIsRead = $db->escapeString(0);

		$db->insert('notifications_table',
		array(
			'administratorUserId'=>$administratorUserId,
			'notificationMessage'=>$notificationMessage,
			'notificationDateTime'=>$notificationDateTime,
			'notificationIsRead'=>$notificationIsRead,
			'orderId'=>$orderId,

			)
		);
		$output = $db->getResult();

	}




	header("Location: orders.php");
	$_SESSION['toast'] = 'order-placed';
}

if (isset($_GET['from']) and $_GET['from'] == 'save-remark') {

	$orderRemarks = $db->escapeString($_POST['orderRemarks']);

	$db->update('orders_table',
	array(
		'orderRemarks'=>$orderRemarks,
		),
		'orderId=' . $_GET['orderId']
	);

	$res = $db->getResult();


	header("Location: manage-order.php?orderId=".$_GET['orderId']);
	$_SESSION['toast'] = 'save-remark';

}


if (isset($_GET['from']) and $_GET['from'] == 'forgot-password') {

	$userEmail = $db->escapeString($_POST['userEmail']);

	$db->select('staffs_view','count(*) as total',NULL,'userEmail = "' . $userEmail . '"', NULL); 
	$res = $db->getResult(); $res = $res[0];


	if ($res['total'] > 0) {

		$s = base64_encode(date('Y-m-d H:i:s') . ";staff;" . $userEmail);
		$msg = "Please click the link to reset your password to \"1234\". The link will expire after 5 minutes. http://cjashleyfashionhub.tk/staff/index.php?s=".$s ." If you didn't request a password reset, you can ignore this message.";

		mail($userEmail,"Reset Password (CJ Ashley Fasion Hub)",$msg);

		$_SESSION['toast'] = 'message-sent';
		

	}
	else
	{
		$_SESSION['toast'] = 'message-sent-failed';
	}


	header("Location: index.php");
}





?>
