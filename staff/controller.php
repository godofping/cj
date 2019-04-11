
<?php 
include('connection.php');

if (isset($_GET['from']) and $_GET['from'] == 'login') {
	
	$userEmail = $db->escapeString($_POST['userEmail']);
	$userPassword = $db->escapeString(md5($_POST['userPassword']));

	$db->select('staffs_view', '*', NULL, 'userEmail = "' . $userEmail  .'" and userPassword = "' . $userPassword . '"');
	$res = $db->getResult();

	if (count($res) > 0) {
		$res = $res[0];

		
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

	$db->update('users_table',
	array(
		'userFirstName'=>$userFirstName,
		'userLastName'=>$userLastName,
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


?>
