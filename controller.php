
<?php 
include('dashboard/connection.php');

if (isset($_GET['from']) and $_GET['from'] == 'login') {
	
	$userEmail = $db->escapeString($_POST['userEmail']);
	$userPassword = $db->escapeString(md5($_POST['userPassword']));

	$db->select('users_table', '*', NULL, 'userEmail = "' . $userEmail  .'" and userPassword = "' . $userPassword . '"');
	$res = $db->getResult();

	if (count($res) > 0) {
		$res = $res[0];

		
		$_SESSION['userType'] = $res['userType'];
		$_SESSION['userEmail'] = $res['userEmail'];
		$_SESSION['userFirstName'] = $res['userFirstName'];
		$_SESSION['userLastName'] = $res['userLastName'];
		$_SESSION['toast'] = 'login-successful';

	

		if ($res['userFirstName'] == '' and $res['userLastName'] == '' and $res['userAddress'] == '' and $res['userPhoneNumber'] == '' and $res['userIsBlocked'] == 0) {

			$_SESSION['userId'] = $res['userId'];
			header("Location: finish-registration.php");

		}
		else
		{
			if ($res['userIsBlocked'] == 1) {
				$_SESSION['toast'] = 'customer-block';
				header("Location: login.php?show=login");
			}
			else
			{
				$_SESSION['userId'] = $res['userId'];
				header("Location: index.php");
			}
		}

	}
	else
	{
		$_SESSION['toast'] = 'login-failed';
		header("Location: login.php?show=login");
	}

}

if (isset($_GET['from']) and $_GET['from'] == 'logout') {
	session_destroy();
	header("Location: index.php");
}



if (isset($_GET['from']) and $_GET['from'] == 'update-profile') {

	$administratorfullName = $db->escapeString($_POST['administratorfullName']);

	$db->update('administrators_table',
	array(
		'administratorfullName'=>$administratorfullName,
		),
		'administratorUserId=' . $_SESSION['administratorUserId']
	);

	$res = $db->getResult();

	header("Location: update-profile.php");
	$_SESSION['toast'] = 'update-profile';
}




if (isset($_GET['from']) and $_GET['from'] == 'customer-registration') {

	$db->select('users_view','*',NULL,'userEmail = "' . $_POST['userEmail'] . '"', NULL); 
	$res = $db->getResult();
	
	if (count($res) == 0) {
		$userEmail = $db->escapeString($_POST['userEmail']);
		$userPassword = $db->escapeString(md5($_POST['userPassword']));


		$db->insert('users_table',
		array(
			'userEmail'=>$userEmail,
			'userPassword'=>$userPassword,
			'userType'=>'Customer',
			'userIsBlocked'=>'0',
			'userRegistrationDate'=>date('Y-m-d'),
			)
		);

		$res = $db->getResult();


		
		$_SESSION['userId'] = $res[0];
		$_SESSION['toast'] = 'customer-registration';
		header("Location: finish-registration.php");
	}
	else
	{
		$_SESSION['toast'] = 'userEmail-taken';
		header("Location: login.php?show=registration");

	}
	

	
}

if (isset($_GET['from']) and $_GET['from'] == 'update-user') {

	$administratorUserName = $db->escapeString($_POST['administratorUserName']);
	$administratorUserPassword = $db->escapeString(md5($_POST['administratorUserPassword']));
	$administratorfullName = $db->escapeString($_POST['administratorfullName']);

	$db->select('administrators_table','*',NULL,'administratorUserId = "' . $_POST['administratorUserId'] . '"', NULL); 
	$res = $db->getResult(); $res = $res[0];

	if ($administratorUserName != $res['administratorUserName']) {

		$db->select('administrators_table','*',NULL,'administratorUserName = "' . $_POST['administratorUserName'] . '"', NULL); 
		$res = $db->getResult();
		
		if (count($res) == 0) {
			$db->update('administrators_table',
			array(
				'administratorUserName'=>$administratorUserName,
				'administratorUserPassword'=>$administratorUserPassword,
				'administratorfullName'=>$administratorfullName,
				),
				'administratorUserId=' . $_POST['administratorUserId']
			);

			$res = $db->getResult();

			
			$_SESSION['toast'] = 'update-user';
		}
		else
		{
			$_SESSION['toast'] = 'administratorUserName-taken';
		}

	}
	else
	{
		$db->update('administrators_table',
		array(
			'administratorUserPassword'=>$administratorUserPassword,
			'administratorfullName'=>$administratorfullName,
			),
			'administratorUserId=' . $_POST['administratorUserId']
		);

		$res = $db->getResult();
		$_SESSION['toast'] = 'update-user';
	}

	header("Location: update-user.php?administratorUserId=".$_POST['administratorUserId']."");
		
}


if (isset($_GET['from']) and $_GET['from'] == 'finish-registration') {

	$userFirstName = $db->escapeString($_POST['userFirstName']);
	$userLastName = $db->escapeString($_POST['userLastName']);
	$userAddress = $db->escapeString($_POST['userAddress']);
	$userPhoneNumber = $db->escapeString($_POST['userPhoneNumber']);

	$db->update('users_table',
	array(
		'userFirstName'=>$userFirstName,
		'userLastName'=>$userLastName,
		'userAddress'=>$userAddress,
		'userPhoneNumber'=>$userPhoneNumber,
		),
		'userId=' . $_SESSION['userId']
	);

	$res = $db->getResult();

	header("Location: index.php");
	$_SESSION['toast'] = 'account-ready';

}


if (isset($_GET['from']) and $_GET['from'] == 'add-feedback') {

	$userFeedback = $db->escapeString($_POST['userFeedback']);

	$db->insert('user_feedbacks_table',
	array(
		'userFeedback'=>$userFeedback,
		'userFeedbackDate'=>date('Y-m-d'),
		'userId'=>$_SESSION['userId'],

		)
	);

	$res = $db->getResult();

	header("Location: my-feedbacks.php");
	$_SESSION['toast'] = 'add-feedback';
}


if (isset($_GET['from']) and $_GET['from'] == 'add-cart') {

	$quantity = $db->escapeString($_POST['quantity']);
	$productVariationId = $db->escapeString($_POST['productVariationId']);
	$productPrice = $db->escapeString($_POST['productPrice']);
	


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


if (isset($_GET['from']) and $_GET['from'] == 'remove-cart') {

	$db->delete('order_details_table','productVariationId=' . $_GET['productVariationId']);
	$res = $db->getResult();
	header("Location: shopping-cart.php");
	$_SESSION['toast'] = 'remove-cart';
}


if (isset($_GET['from']) and $_GET['from'] == 'update-cart') {

	$quantity = $db->escapeString($_POST['quantity']);
	$orderDetailId = $db->escapeString($_POST['orderDetailId']);
	$productPrice = $db->escapeString($_POST['productPrice']);


		$db->update('order_details_table',
		array(
			'quantity'=>$quantity,
			'price'=>$productPrice,

			),
			'orderDetailId=' . $orderDetailId
		);

		$res = $db->getResult();

	header("Location: shopping-cart.php");
	$_SESSION['toast'] = 'update-cart';
}

if (isset($_GET['from']) and $_GET['from'] == 'empty-cart') {

	$db->delete('order_details_table','orderId=' . $_GET['orderId']);
	$res = $db->getResult();
	header("Location: shopping-cart.php");
	$_SESSION['toast'] = 'empty-cart';
}


if (isset($_GET['from']) and $_GET['from'] == 'place-order') {

	$orderId = $db->escapeString($_POST['orderId']);
	$orderPlacedDate = $db->escapeString(date('Y-m-d H:i:s'));
	$orderStatus = $db->escapeString("Pending Approval");
	$orderTotalAmount = $db->escapeString($_POST['sum']);
	$orderPaymentStatus = $db->escapeString("Unpaid");
	

	//billing information
	$billingFirstName = $db->escapeString($_POST['billingFirstName']);
	$billingLastName = $db->escapeString($_POST['billingLastName']);
	$billingAddress = $db->escapeString($_POST['billingAddress']);
	$billingPhoneNumber = $db->escapeString($_POST['billingPhoneNumber']);
	$billingEmail = $db->escapeString($_POST['billingEmail']);

	$orderModeOfPayment = $db->escapeString($_POST['orderModeOfPayment']);

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



	$orderDeliveryMethod = $db->escapeString($_POST['orderDeliveryMethod']);

	if ($orderDeliveryMethod == 'Shipping') {
		//shipping information
		$orderShipFirstName = $db->escapeString($_POST['orderShipFirstName']);
		$orderShipLastName = $db->escapeString($_POST['orderShipLastName']);
		$orderShippingAddress = $db->escapeString($_POST['orderShippingAddress']);
		$orderShipPhoneNumber = $db->escapeString($_POST['orderShipPhoneNumber']);
		$orderShipEmail = $db->escapeString($_POST['orderShipEmail']);


		$db->update('orders_table',
		array(
			'orderDeliveryMethod'=>$orderDeliveryMethod,

			'orderShipFirstName'=>$orderShipFirstName,
			'orderShipLastName'=>$orderShipLastName,
			'orderShippingAddress'=>$orderShippingAddress,
			'orderShipPhoneNumber'=>$orderShipPhoneNumber,
			'orderShipEmail'=>$orderShipEmail,
			),
			'orderId=' . $orderId
		);

		$res = $db->getResult();


	} elseif ($orderDeliveryMethod == 'Pick Up') {
		$orderPickupDate = $db->escapeString($_POST['orderPickupDate']);

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
		$notificationMessage = $db->escapeString("Order number " . $orderId . " was placed.");
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



	header("Location: thank-you.php?orderId=".base64_encode($orderId));
	$_SESSION['toast'] = 'order-placed';
}


if (isset($_GET['from']) and $_GET['from'] == 'update-profile') {

	$userFirstName = $db->escapeString($_POST['userFirstName']);
	$userLastName = $db->escapeString($_POST['userLastName']);
	$userAddress = $db->escapeString($_POST['userAddress']);
	$userPhoneNumber = $db->escapeString($_POST['userPhoneNumber']);

		$db->update('users_table',
		array(
			'userFirstName'=>$userFirstName,
			'userLastName'=>$userLastName,
			'userAddress'=>$userAddress,
			'userPhoneNumber'=>$userPhoneNumber,

			),
			'userId=' . $_SESSION['userId']
		);

		$res = $db->getResult();

	header("Location: my-profile.php");
	$_SESSION['toast'] = 'update-profile';
}

if (isset($_GET['from']) and $_GET['from'] == 'update-password') {

	$oldPassword = $db->escapeString(md5($_POST['oldPassword']));
	$newPasssword = $db->escapeString(md5($_POST['newPasssword']));
	$confirmNewPassword = $db->escapeString(md5($_POST['confirmNewPassword']));
	$userPassword = $db->escapeString($_POST['userPassword']);

	if (($oldPassword == $userPassword) and ($newPasssword == $confirmNewPassword)) {
		$db->update('users_table',
		array(
			'userPassword'=>$newPasssword,

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

	header("Location: my-profile.php");
	
}


if (isset($_GET['from']) and $_GET['from'] == 'payment-form') {

	$filename = basename($_FILES["paymentRecieptImage"]["name"]);
	$filename = md5(date("Y-m-d H:i:s") . "1") . $filename;
	$target_dir = "paymentImages/";
	$target_file = $target_dir . $filename;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["paymentRecieptImage"]["tmp_name"], $target_file);

	$paymentAmount = $db->escapeString($_POST['paymentAmount']);
	$orderId = $db->escapeString($_GET['orderId']);
	$paymentStatus = $db->escapeString("Pending");
	$nameOfRemmitanceCenter = $db->escapeString($_POST['nameOfRemmitanceCenter']);
	$controlNumber = $db->escapeString($_POST['controlNumber']);
	$paymentTransactionDate = $db->escapeString(date('Y-m-d H:i:s'));
	$paymentRecieptImage = $db->escapeString($filename);
	$orderDeliveryMethod = $db->escapeString($_GET['orderDeliveryMethod']);
	$orderShippingFee = $db->escapeString($_GET['orderShippingFee']);


	if ($orderDeliveryMethod == 'Shipping') {
		$paymentAmount = $paymentAmount - $orderShippingFee;
	}



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
		$notificationMessage = $db->escapeString("Order number " . $orderId . " payment was sent.");
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


	$_SESSION['toast'] = 'payment-sent';
	header("Location: order-details.php?orderId=". base64_encode($orderId));


}

if (isset($_GET['from']) and $_GET['from'] == 'cancel-order') {

	$orderId = $db->escapeString($_GET['orderId']);
	$orderStatus = $db->escapeString("Cancelled");
	

	$db->update('orders_table',
	array(
		'orderStatus'=>$orderStatus,
		),
		'orderId=' . $orderId
	);

	$res = $db->getResult();

	$db->select('order_details_view','*',NULL,'orderId = "' . $orderId . '"', NULL); 
	$output = $db->getResult();

	foreach ($output as $res) {

		$productStock = $db->escapeString($res['productStock']);
		$quantity = $db->escapeString($res['quantity']);
		$productVariationId = $db->escapeString($res['productVariationId']);

		$total = $productStock + $quantity;

		$db->update('product_variations_table',
		array(
			'productStock'=>$total,
			),
			'productVariationId=' . $res['productVariationId']
		);
		$db->getResult();


		$db->insert('inventory_logs_table',
		array(
			'productVariationId'=>$productVariationId,
			'inOrOut'=>'In',
			'quantity'=>$quantity,
			'transactionDateTime'=>date('Y-m-d H:i:s'),
			'inventoryLogRemark'=>'The stocks is increased by ' . $quantity . ' because the order number ' . $orderId . ' is cancelled.',
			)
		);
		$db->getResult();

		

	}


	$db->select('administrators_view'); 
	$output = $db->getResult();

	foreach ($output as $res) {

		$administratorUserId = $db->escapeString($res['administratorUserId']);
		$notificationMessage = $db->escapeString("Order number " . $orderId . " was cancelled by the customer.");
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



	header("Location: order-details.php?orderId=".base64_encode($orderId));
	$_SESSION['toast'] = 'cancel-order';

}


if (isset($_GET['from']) and $_GET['from'] == 'add-review') {

	$productVariationId = $db->escapeString($_GET['productVariationId']);
	$productReview = $db->escapeString($_POST['productReview']);
	$productReviewDate = $db->escapeString(date('Y-m-d'));
	$userId = $db->escapeString($_SESSION['userId']);


	$db->insert('product_reviews_table',
	array(
		'productVariationId'=>$productVariationId,
		'productReview'=>$productReview,
		'productReviewDate'=>$productReviewDate,
		'userId'=>$userId,
		)
	);

	$res = $db->getResult();



	$_SESSION['toast'] = 'add-review';
	header("Location: review.php?productVariationId=". $productVariationId);


}



?>