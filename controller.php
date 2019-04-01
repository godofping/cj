
<?php 
include('dashboard/connection.php');

if (isset($_GET['from']) and $_GET['from'] == 'login') {
	
	$customerEmail = $db->escapeString($_POST['customerEmail']);
	$customerPassword = $db->escapeString(md5($_POST['customerPassword']));

	$db->select('customers_view', '*', NULL, 'customerEmail = "' . $customerEmail  .'" and customerPassword = "' . $customerPassword . '"');
	$res = $db->getResult();

	if (count($res) > 0) {
		$res = $res[0];
		$_SESSION['customerId'] = $res['customerId'];
		$_SESSION['customerType'] = $res['customerType'];
		$_SESSION['customerEmail'] = $res['customerEmail'];
		$_SESSION['customerFirstName'] = $res['customerFirstName'];
		$_SESSION['customerLastName'] = $res['customerLastName'];
		$_SESSION['toast'] = 'login-successful';

	

		if ($res['customerFirstName'] == '' and $res['customerLastName'] == '' and $res['customerAddress'] == '' and $res['customerPhoneNumber'] == '') {
			header("Location: finish-registration.php");
		}
		else
		{
			header("Location: index.php");
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

	// orderStatus
	// On Cart - if items still on cart
	// To Pay - customer has not yet pay
	// To Ship - customer paid the order and shop is preparing the orders
	// To Recieve - order is delivered to the customer
	// Completed - customer recieved the order and click completed
	// Cancelled - admin cancelled the order

	// orderType
	// Online
	// Walk-in

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

	//billing information
	$billingFirstName = $db->escapeString($_POST['billingFirstName']);
	$billingLastName = $db->escapeString($_POST['billingLastName']);
	$billingAddress = $db->escapeString($_POST['billingAddress']);
	$billingPhoneNumber = $db->escapeString($_POST['billingPhoneNumber']);
	$billingEmail = $db->escapeString($_POST['billingEmail']);


	$deliveryMethod = $db->escapeString($_POST['deliveryMethod']);

	if ($deliveryMethod == 'Shipping') {
		//shipping information
		$billingFirstName = $db->escapeString($_POST['billingFirstName']);
		$billingLastName = $db->escapeString($_POST['billingLastName']);
		$billingAddress = $db->escapeString($_POST['billingAddress']);
		$billingPhoneNumber = $db->escapeString($_POST['billingPhoneNumber']);
		$billingEmail = $db->escapeString($_POST['billingEmail']);
	}
}


?>
