
<?php 
include('dashboard/connection.php');

if (isset($_GET['from']) and $_GET['from'] == 'login') {
	
	$customerEmail = $db->escapeString($_POST['customerEmail']);
	$customerPassword = $db->escapeString(md5($_POST['customerPassword']));

	$db->select('customers_table', '*', NULL, 'customerEmail = "' . $customerEmail  .'" and customerPassword = "' . $customerPassword . '"');
	$res = $db->getResult();

	if (count($res) > 0) {
		$res = $res[0];
		
		$_SESSION['customerType'] = $res['customerType'];
		$_SESSION['customerEmail'] = $res['customerEmail'];
		$_SESSION['customerFirstName'] = $res['customerFirstName'];
		$_SESSION['customerLastName'] = $res['customerLastName'];
		$_SESSION['toast'] = 'login-successful';

	

		if ($res['customerFirstName'] == '' and $res['customerLastName'] == '' and $res['customerAddress'] == '' and $res['customerPhoneNumber'] == '' and $res['customerIsBlocked'] == 0) {

			$_SESSION['customerId'] = $res['customerId'];
			header("Location: finish-registration.php");

		}
		else
		{
			if ($res['customerIsBlocked'] == 1) {
				$_SESSION['toast'] = 'customer-block';
				header("Location: login.php?show=login");
			}
			else
			{
				$_SESSION['customerId'] = $res['customerId'];
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

	$fullName = $db->escapeString($_POST['fullName']);

	$db->update('users_table',
	array(
		'fullName'=>$fullName,
		),
		'userId=' . $_SESSION['userId']
	);

	$res = $db->getResult();

	header("Location: update-profile.php");
	$_SESSION['toast'] = 'update-profile';
}




if (isset($_GET['from']) and $_GET['from'] == 'customer-registration') {

	$db->select('customers_view','*',NULL,'customerEmail = "' . $_POST['customerEmail'] . '"', NULL); 
	$res = $db->getResult();
	
	if (count($res) == 0) {
		$customerEmail = $db->escapeString($_POST['customerEmail']);
		$customerPassword = $db->escapeString(md5($_POST['customerPassword']));


		$db->insert('customers_table',
		array(
			'customerEmail'=>$customerEmail,
			'customerPassword'=>$customerPassword,
			'customerType'=>'online',
			'customerIsBlocked'=>'0',
			'customerRegistrationDate'=>date('Y-m-d'),
			)
		);

		$res = $db->getResult();


		
		$_SESSION['customerId'] = $res[0];
		$_SESSION['toast'] = 'customer-registration';
		header("Location: finish-registration.php");
	}
	else
	{
		$_SESSION['toast'] = 'customerEmail-taken';
		header("Location: login.php?show=registration");

	}
	

	
}

if (isset($_GET['from']) and $_GET['from'] == 'update-user') {

	$userName = $db->escapeString($_POST['userName']);
	$userPassword = $db->escapeString(md5($_POST['userPassword']));
	$fullName = $db->escapeString($_POST['fullName']);

	$db->select('users_table','*',NULL,'userId = "' . $_POST['userId'] . '"', NULL); 
	$res = $db->getResult(); $res = $res[0];

	if ($userName != $res['userName']) {

		$db->select('users_table','*',NULL,'userName = "' . $_POST['userName'] . '"', NULL); 
		$res = $db->getResult();
		
		if (count($res) == 0) {
			$db->update('users_table',
			array(
				'userName'=>$userName,
				'userPassword'=>$userPassword,
				'fullName'=>$fullName,
				),
				'userId=' . $_POST['userId']
			);

			$res = $db->getResult();

			
			$_SESSION['toast'] = 'update-user';
		}
		else
		{
			$_SESSION['toast'] = 'userName-taken';
		}

	}
	else
	{
		$db->update('users_table',
		array(
			'userPassword'=>$userPassword,
			'fullName'=>$fullName,
			),
			'userId=' . $_POST['userId']
		);

		$res = $db->getResult();
		$_SESSION['toast'] = 'update-user';
	}

	header("Location: update-user.php?userId=".$_POST['userId']."");
		
}


if (isset($_GET['from']) and $_GET['from'] == 'finish-registration') {

	$customerFirstName = $db->escapeString($_POST['customerFirstName']);
	$customerLastName = $db->escapeString($_POST['customerLastName']);
	$customerAddress = $db->escapeString($_POST['customerAddress']);
	$customerPhoneNumber = $db->escapeString($_POST['customerPhoneNumber']);

	$db->update('customers_table',
	array(
		'customerFirstName'=>$customerFirstName,
		'customerLastName'=>$customerLastName,
		'customerAddress'=>$customerAddress,
		'customerPhoneNumber'=>$customerPhoneNumber,
		),
		'customerId=' . $_SESSION['customerId']
	);

	$res = $db->getResult();

	header("Location: index.php");
	$_SESSION['toast'] = 'account-ready';

}


if (isset($_GET['from']) and $_GET['from'] == 'add-feedback') {

	$customerFeedback = $db->escapeString($_POST['customerFeedback']);

	$db->insert('customer_feedbacks_table',
	array(
		'customerFeedback'=>$customerFeedback,
		'customerFeedbackDate'=>date('Y-m-d'),
		'customerFeedbackStatus'=>0,
		'customerId'=>$_SESSION['customerId'],
		

		)
	);

	$res = $db->getResult();

	header("Location: feedbacks.php");
	$_SESSION['toast'] = 'add-feedback';
}


if (isset($_GET['from']) and $_GET['from'] == 'add-cart') {

	$quantity = $db->escapeString($_POST['quantity']);
	$productVariationId = $db->escapeString($_POST['productVariationId']);
	$productPrice = $db->escapeString($_POST['productPrice']);
	


	$db->select('orders_table','count(*) as total',NULL,'customerId = "' . $_SESSION['customerId'] . '" and orderStatus = "On Cart"', NULL); 
	$res = $db->getResult(); $res = $res[0];

	if ($res['total'] == 0) {

		$db->insert('orders_table',
		array(
			'orderType'=>'Online',
			'orderStatus'=>'On Cart',
			'customerId'=>$_SESSION['customerId'],
			)
		);

		$res = $db->getResult();
		$orderId =  $res[0];

		echo "cart created with the orderId " . $orderId . " <br>";

	}
	else
	{
		$db->select('orders_table','*',NULL,'customerId = "' . $_SESSION['customerId'] . '" and orderStatus = "On Cart"', NULL); 
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
		$orderShippingArrivalOrPickupDate = $db->escapeString($_POST['orderShippingArrivalOrPickupDate']);

		$db->update('orders_table',
		array(
			'orderDeliveryMethod'=>$orderDeliveryMethod,
			'orderShippingArrivalOrPickupDate'=>$orderShippingArrivalOrPickupDate,

			),
			'orderId=' . $orderId
		);

		$res = $db->getResult();

	}

	
	if ($orderModeOfPayment == 'Remittance') {
		// //payment information
		// $paymentAmount = $db->escapeString($_POST['paymentAmount']);
		// $nameOfRemmitanceCenter = $db->escapeString($_POST['nameOfRemmitanceCenter']);
		// $controlNumber = $db->escapeString($_POST['controlNumber']);
		// $paymentStatus = $db->escapeString("Pending Approval");
		// $paymentTransactionDate = $db->escapeString(date('Y-m-d H:i:s'));


		// // $paymentRecieptImage = $db->escapeString($_POST['paymentRecieptImage']);

		// $db->delete('payments_table','orderId=' . $orderId);
		// $res = $db->getResult();


		// $db->insert('payments_table',
		// array(
		// 	'paymentAmount'=>$paymentAmount,
		// 	'nameOfRemmitanceCenter'=>$nameOfRemmitanceCenter,
		// 	'controlNumber'=>$controlNumber,
		// 	'paymentStatus'=>$orderDeliveryMethod,
		// 	'paymentTransactionDate'=>$paymentTransactionDate,
		// 	'orderId'=>$orderId,

		// 	)
		// );

		// $res = $db->getResult();
	


	} elseif ($orderModeOfPayment == 'Walk In') {
		
	}


		$db->select('order_details_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '" and orderId = "' . $orderId . '" ', NULL); 
	    $output = $db->getResult();
	    
	    
	    foreach ($output as $res) { 


	    	$productVariationId = $db->escapeString($res['productVariationId']);
	    	$inOrOut = $db->escapeString("Out");
	    	$quantity = $db->escapeString($res['quantity']);
	    	$transactionDateTime = $db->escapeString(date('Y-m-d H:i:s'));
			$inventoryLogRemark = $db->escapeString("The stocks is decreased by " . $quantity . " because of Order ID " . $orderId);

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


	header("Location: thank-you.php?orderId=".base64_encode($orderId));
	$_SESSION['toast'] = 'order-placed';
}


if (isset($_GET['from']) and $_GET['from'] == 'update-profile') {

	$customerFirstName = $db->escapeString($_POST['customerFirstName']);
	$customerLastName = $db->escapeString($_POST['customerLastName']);
	$customerAddress = $db->escapeString($_POST['customerAddress']);
	$customerPhoneNumber = $db->escapeString($_POST['customerPhoneNumber']);

		$db->update('customers_table',
		array(
			'customerFirstName'=>$customerFirstName,
			'customerLastName'=>$customerLastName,
			'customerAddress'=>$customerAddress,
			'customerPhoneNumber'=>$customerPhoneNumber,

			),
			'customerId=' . $_SESSION['customerId']
		);

		$res = $db->getResult();

	header("Location: my-profile.php");
	$_SESSION['toast'] = 'update-profile';
}

if (isset($_GET['from']) and $_GET['from'] == 'update-password') {

	$oldPassword = $db->escapeString(md5($_POST['oldPassword']));
	$newPasssword = $db->escapeString(md5($_POST['newPasssword']));
	$confirmNewPassword = $db->escapeString(md5($_POST['confirmNewPassword']));
	$customerPassword = $db->escapeString($_POST['customerPassword']);

	if (($oldPassword == $customerPassword) and ($newPasssword == $confirmNewPassword)) {
		$db->update('customers_table',
		array(
			'customerPassword'=>$newPasssword,

			),
			'customerId=' . $_SESSION['customerId']
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

?>
