
<?php 
include('connection.php');

if (isset($_GET['from']) and $_GET['from'] == 'login') {
	
	$administratorUserName = $db->escapeString($_POST['administratorUserName']);
	$administratorUserPassword = $db->escapeString(md5($_POST['administratorUserPassword']));

	$db->select('administrators_table', '*', NULL, 'administratorUserName = "' . $administratorUserName  .'" and administratorUserPassword = "' . $administratorUserPassword . '"');
	$res = $db->getResult();

	if (count($res) > 0) {
		$res = $res[0];
		$_SESSION['administratorUserId'] = $res['administratorUserId'];
		$_SESSION['administratorUserName'] = $res['administratorUserName'];
		$_SESSION['toast'] = 'login-successful';
		header("Location: dashboard.php");
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


if (isset($_GET['from']) and $_GET['from'] == 'add-category') {

	$productCategory = $db->escapeString($_POST['productCategory']);

	$db->insert('product_categories_table',
	array(
		'productCategory'=>$productCategory,
		)
	);

	$res = $db->getResult();

	header("Location: add-category.php");
	$_SESSION['toast'] = 'add-category';
}


if (isset($_GET['from']) and $_GET['from'] == 'update-category') {

	$productCategory = $db->escapeString($_POST['productCategory']);

	$db->update('product_categories_table',
	array(
		'productCategory'=>$productCategory,
		),
		'productCategoryId=' . $_POST['productCategoryId']
	);

	$res = $db->getResult();

	

	header("Location: update-category.php?productCategoryId=".$_POST['productCategoryId']."");
	$_SESSION['toast'] = 'update-category';
}

if (isset($_GET['from']) and $_GET['from'] == 'delete-category') {

	$db->delete('product_categories_table','productCategoryId=' . $_GET['productCategoryId']);

	$res = $db->getResult(); $res = $res[0];

	if ($res == 1) {
		$_SESSION['toast'] = 'delete-category';
	}
	else
	{
		$_SESSION['toast'] = 'delete-category-failed';
	}

	header("Location: categories.php");
	 


}


if (isset($_GET['from']) and $_GET['from'] == 'add-staff') {

	$db->select('users_table','*',NULL,'userEmail = "' . $_POST['userEmail'] . '"', NULL); 
	$res = $db->getResult();
	
	if (count($res) == 0) {
		$userEmail = $db->escapeString($_POST['userEmail']);
		$userPassword = $db->escapeString(md5($_POST['userPassword']));
		$userFirstName = $db->escapeString($_POST['userFirstName']);
		$userLastName = $db->escapeString($_POST['userLastName']);
		$userRegistrationDate = $db->escapeString(date('Y-m-d'));
		$userType = $db->escapeString("Staff");

		$db->insert('users_table',
		array(
			'userEmail'=>$userEmail,
			'userPassword'=>$userPassword,
			'userFirstName'=>$userFirstName,
			'userLastName'=>$userLastName,
			'userRegistrationDate'=>$userRegistrationDate,
			'userType'=>$userType,
			'userIsBlocked'=>'0',
			)
		);

		$res = $db->getResult();

		
		$_SESSION['toast'] = 'add-staff';
	}
	else
	{
		$_SESSION['toast'] = 'userEmail-taken';

	}
	header("Location: add-staff.php");

	
}

if (isset($_GET['from']) and $_GET['from'] == 'update-staff') {

	$userEmail = $db->escapeString($_POST['userEmail']);
	$userPassword = $db->escapeString(md5($_POST['userPassword']));
	$userFirstName = $db->escapeString($_POST['userFirstName']);
	$userLastName = $db->escapeString($_POST['userLastName']);

	$db->select('users_table','*',NULL,'userId = "' . $_GET['userId'] . '"', NULL); 
	$res = $db->getResult(); $res = $res[0];

	if ($userEmail != $res['userEmail']) {

		$db->select('users_table','*',NULL,'userEmail = "' . $_POST['userEmail'] . '"', NULL); 
		$res = $db->getResult();
		
		if (count($res) == 0) {
			$db->update('users_table',
			array(
				'userEmail'=>$userEmail,
				'userPassword'=>$userPassword,
				'userFirstName'=>$userFirstName,
				'userLastName'=>$userLastName,
				),
				'userId=' . $_GET['userId']
			);

			$res = $db->getResult();
			
			$_SESSION['toast'] = 'update-staff';
		}
		else
		{
			$_SESSION['toast'] = 'userEmail-taken';
		}

	}
	else
	{
		$db->update('users_table',
		array(
			'userPassword'=>$userPassword,
			'userFirstName'=>$userFirstName,
			'userLastName'=>$userLastName,
			),
			'userId=' . $_GET['userId']
		);

		$res = $db->getResult();

		$_SESSION['toast'] = 'update-staff';
	}


	header("Location: update-staff.php?userId=".$_GET['userId']."");
		
}


if (isset($_GET['from']) and $_GET['from'] == 'block-staff') {

	$userId = $db->escapeString($_GET['userId']);

	$db->update('users_table',
	array(
		'userIsBlocked'=>'1',
		),
		'userId=' . $userId
	);

	$res = $db->getResult();


	header("Location: manage-staffs.php");
	$_SESSION['toast'] = 'block-staff';
}

if (isset($_GET['from']) and $_GET['from'] == 'unblock-staff') {

	$userId = $db->escapeString($_GET['userId']);

	$db->update('users_table',
	array(
		'userIsBlocked'=>'0',
		),
		'userId=' . $userId
	);

	$res = $db->getResult();


	header("Location: manage-staffs.php");
	$_SESSION['toast'] = 'unblock-staff';
}

if (isset($_GET['from']) and $_GET['from'] == 'block-customer-view-all') {

	$userId = $db->escapeString($_GET['userId']);

	$db->update('users_table',
	array(
		'userIsBlocked'=>'1',
		),
		'userId=' . $userId
	);

	$res = $db->getResult();


	header("Location: customers.php");
	$_SESSION['toast'] = 'block-customer-view-all';
}

if (isset($_GET['from']) and $_GET['from'] == 'unblock-customer-view-all') {

	$userId = $db->escapeString($_GET['userId']);

	$db->update('users_table',
	array(
		'userIsBlocked'=>'0',
		),
		'userId=' . $userId
	);

	$res = $db->getResult();


	header("Location: customers.php");
	$_SESSION['toast'] = 'unblock-customer-view-all';
}


if (isset($_GET['from']) and $_GET['from'] == 'change-password') {

	$oldPassword = $db->escapeString(md5($_POST['oldPassword']));
	$newPassword = $db->escapeString(md5($_POST['newPassword']));
	$confirmNewPassword = $db->escapeString(md5($_POST['confirmNewPassword']));

	$db->select('administrators_view','*',NULL,'administratorUserId = "' . $_SESSION['administratorUserId'] . '"', NULL); 
	$res = $db->getResult(); $res = $res[0];

	$administratorUserPassword = $res['administratorUserPassword'];

	if ($oldPassword == $administratorUserPassword and $newPassword == $confirmNewPassword) {

		$db->update('administrators_table',
		array(
			'administratorUserPassword'=>$administratorUserPassword,
			),
			'administratorUserId=' . $_SESSION['administratorUserId']
		);

		$res = $db->getResult();
		$_SESSION['toast'] = 'change-password';
	}
	else
	{
		$_SESSION['toast'] = 'change-password-failed';
	}

	header("Location: change-password.php");
	
}



if (isset($_GET['from']) and $_GET['from'] == 'add-product') {

	$productName = $db->escapeString($_POST['productName']);
	$productSubCategoryId = $db->escapeString($_POST['productSubCategoryId']);
	$productDetails = $db->escapeString($_POST['productDetails']);

	$db->insert('products_table',
	array(
		'productName'=>$productName,
		'productSubCategoryId'=>$productSubCategoryId,
		'productDetails'=>$productDetails,
		'productUpdateDate'=>date('Y-m-d H:i:s'),
		)
	);

	$res = $db->getResult();

	$productId = $res[0];


	$db->insert('product_images_table',
	array(
		'productImageLocation'=>'default-image.jpg',
		'isThumbnail'=>'1',
		'productId'=>$productId,
		)
	);

	$res = $db->getResult();


	$db->insert('product_images_table',
	array(
		'productImageLocation'=>'default-image.jpg',
		'isThumbnail'=>'0',
		'productId'=>$productId,
		)
	);

	$res = $db->getResult();


	$db->insert('product_images_table',
	array(
		'productImageLocation'=>'default-image.jpg',
		'isThumbnail'=>'0',
		'productId'=>$productId,
		)
	);

	$res = $db->getResult();


	header("Location: manage-product.php?productId=".$productId);
	$_SESSION['toast'] = 'add-product';
}




if (isset($_GET['from']) and $_GET['from'] == 'update-product') {

	$productName = $db->escapeString($_POST['productName']);
	$productSubCategoryId = $db->escapeString($_POST['productSubCategoryId']);
	$productDetails = $db->escapeString($_POST['productDetails']);


	$db->update('products_table',
	array(
		'productName'=>$productName,
		'productSubCategoryId'=>$productSubCategoryId,
		'productDetails'=>$productDetails,
		'productUpdateDate'=>date('Y-m-d H:i:s'),
		'productSubCategoryId'=>$productSubCategoryId,
		),
		'productId=' . $_POST['productId']
	);

	$res = $db->getResult();
	print_r($res);

	header("Location: update-product.php?productId=".$_POST['productId']);
	$_SESSION['toast'] = 'update-product';
}



if (isset($_GET['from']) and $_GET['from'] == 'product-images') {

	$triggerAlert = 0;
	$filename = basename($_FILES["image1"]["name"]);

	$db->select('product_images_view','*',NULL,'productId = "' . $_POST['productId'] . '"', NULL); 
	$res = $db->getResult();

	$filename1 = $res[0]['productImageLocation'];
	$filename2 = $res[1]['productImageLocation'];
	$filename3 = $res[2]['productImageLocation'];


	if ($filename != '') {


		if ($filename1 != 'default-image.jpg') {
			unlink('images/'.$filename1);
		}
		

		$filename = md5(date("Y-m-d H:i:s") . "1") . $filename;
		$target_dir = "images/";
		$target_file = $target_dir . $filename;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	    move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file);

		$db->update('product_images_table',
		array(
			'productImageLocation'=>$filename,

			),
			'productImageId=' . $_POST['productImageId1']
		);
		$triggerAlert = 1;
		$res = $db->getResult();

	}

	$filename = basename($_FILES["image2"]["name"]);


	if ($filename != '') {

		if ($filename2 != 'default-image.jpg') {
			unlink('images/'.$filename2);
		}


		$filename = md5(date("Y-m-d H:i:s") . "2") . $filename;

		$target_dir = "images/";
		$target_file = $target_dir . $filename;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	    move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file);

		$db->update('product_images_table',
		array(
			'productImageLocation'=>$filename,

			),
			'productImageId=' . $_POST['productImageId2']
		);
		$triggerAlert = 1;
		$res = $db->getResult();
		print_r($res);
	}

	$filename = basename($_FILES["image3"]["name"]);


	if ($filename != '') {

		if ($filename3 != 'default-image.jpg') {
			unlink('images/'.$filename3);
		}


		$filename = md5(date("Y-m-d H:i:s") . "3") . $filename;

		$target_dir = "images/";
		$target_file = $target_dir . $filename;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	    move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file);

		$db->update('product_images_table',
		array(
			'productImageLocation'=>$filename,

			),
			'productImageId=' . $_POST['productImageId3']
		);
		$triggerAlert = 1;
		$res = $db->getResult();
		print_r($res);
	}




	if ($triggerAlert == 1) {
		$_SESSION['toast'] = 'product-images';
	}
	

	header("Location: manage-product.php?productId=".$_POST['productId']);
	
}
if (isset($_GET['from']) and $_GET['from'] == 'delete-product') {



	$db->update('products_table',
	array(
		'productIsDeleted'=>'1',

		),
		'productId=' . $_GET['productId']
	);

	$res = $db->getResult();

	header("Location: catalog.php");
	$_SESSION['toast'] = 'delete-product';
}


if (isset($_GET['from']) and $_GET['from'] == 'add-sub-category') {

	$productCategoryId = $db->escapeString($_POST['productCategoryId']);
	$productSubCategory = $db->escapeString($_POST['productSubCategory']);

	$db->insert('product_sub_categories_table',
	array(
		'productCategoryId'=>$productCategoryId,
		'productSubCategory'=>$productSubCategory,
		)
	);

	$res = $db->getResult();

	header("Location: add-sub-category.php");
	$_SESSION['toast'] = 'add-sub-category';

}


if (isset($_GET['from']) and $_GET['from'] == 'update-sub-category') {

	$productCategoryId = $db->escapeString($_POST['productCategoryId']);
	$productSubCategory = $db->escapeString($_POST['productSubCategory']);

	$db->update('product_sub_categories_view',
	array(
		'productCategoryId'=>$productCategoryId,
		'productSubCategory'=>$productSubCategory,
		),
		'productSubCategoryId=' . $_POST['productSubCategoryId']
	);

	$res = $db->getResult();

	header("Location: update-sub-category.php?productSubCategoryId=".$_POST['productSubCategoryId']);
	$_SESSION['toast'] = 'update-sub-category';

}


if (isset($_GET['from']) and $_GET['from'] == 'delete-sub-category') {

	$productSubCategoryId = $db->escapeString($_GET['productSubCategoryId']);

	$db->delete('product_sub_categories_table','productSubCategoryId=' . $productSubCategoryId); 

	$res = $db->getResult(); $res = $res[0];

	if ($res == 1) {
		$_SESSION['toast'] = 'delete-sub-category';
	}
	else
	{
		$_SESSION['toast'] = 'delete-sub-category-failed';
	}

	header("Location: sub-categories.php");
	
}




if (isset($_GET['from']) and $_GET['from'] == 'add-product-variation') {

	$productId = $db->escapeString($_POST['productId']);
	$productOption1 = $db->escapeString($_POST['productOption1']);
	$productOption2 = $db->escapeString($_POST['productOption2']);
	$productPrice = $db->escapeString($_POST['productPrice']);


	$db->insert('product_variations_table',
	array(
		'productId'=>$productId,
		'productOption1'=>$productOption1,
		'productOption2'=>$productOption2,
		'productStock'=>0,
		'productStocksReorderPoint'=>0,
		'productVariationIsDeleted'=>0,
		'productPrice'=>$productPrice,
		)
	);

	$res = $db->getResult();

	print_r($res);

	header("Location: manage-product.php?productId=".$productId);
	$_SESSION['toast'] = 'add-product-variation';

}


if (isset($_GET['from']) and $_GET['from'] == 'update-product-variation') {

	$productOption1 = $db->escapeString($_POST['productOption1']);
	$productOption2 = $db->escapeString($_POST['productOption2']);
	$productPrice = $db->escapeString($_POST['productPrice']);

	$db->update('product_variations_table',
	array(
		'productOption1'=>$productOption1,
		'productOption2'=>$productOption2,
		'productPrice'=>$productPrice,
		),
		'productVariationId=' . $_POST['productVariationId']
	);

	$res = $db->getResult();



	header("Location: manage-product.php?productId=".$_POST['productId']);
	$_SESSION['toast'] = 'update-product-variation';

}

if (isset($_GET['from']) and $_GET['from'] == 'delete-product-variation') {


	$db->update('product_variations_table',
	array(
		'productVariationIsDeleted'=>'1',
		),
		'productVariationId=' . $_GET['productVariationId']
	);

	$res = $db->getResult();


	header("Location: manage-product.php?productId=".$_GET['productId']);
	$_SESSION['toast'] = 'delete-product-variation';

}



if (isset($_GET['from']) and $_GET['from'] == 'delete-feedback') {
	
	$db->delete('user_feedbacks_table','userFeedbackId=' . $_GET['userFeedbackId']);

	$res = $db->getResult();


	header("Location: feedbacks.php");
	$_SESSION['toast'] = 'delete-feedback';

}


if (isset($_GET['from']) and $_GET['from'] == 'delete-review') {
	
	$db->delete('product_reviews_table','productReviewId=' . $_GET['productReviewId']);

	$res = $db->getResult();


	header("Location: reviews.php");
	$_SESSION['toast'] = 'delete-review';

}

if (isset($_GET['from']) and $_GET['from'] == 'stock-in') {


	$productStock = $db->escapeString($_POST['productStock']);
	$quantity = $db->escapeString($_POST['quantity']);
	$productVariationId = $db->escapeString($_POST['productVariationId']);

	$total = $productStock + $quantity;

	$db->update('product_variations_table',
	array(
		'productStock'=>$total,
		),
		'productVariationId=' . $_POST['productVariationId']
	);
	$res = $db->getResult();


	$db->insert('inventory_logs_table',
	array(
		'productVariationId'=>$productVariationId,
		'inOrOut'=>'In',
		'quantity'=>$quantity,
		'transactionDateTime'=>date('Y-m-d H:i:s'),
		'inventoryLogRemark'=>'The stocks is increased by ' . $quantity . '.',
		)
	);
	$res = $db->getResult();

	

	header("Location: manage-stocks.php?productVariationId=".$_POST['productVariationId']);
	$_SESSION['toast'] = 'stock-in';

}

if (isset($_GET['from']) and $_GET['from'] == 'stock-out') {


	$productStock = $db->escapeString($_POST['productStock']);
	$quantity = $db->escapeString($_POST['quantity']);
	$productVariationId = $db->escapeString($_POST['productVariationId']);

	$total = $productStock - $quantity;

	$db->update('product_variations_table',
	array(
		'productStock'=>$total,
		),
		'productVariationId=' . $_POST['productVariationId']
	);
	$res = $db->getResult();


	$db->insert('inventory_logs_table',
	array(
		'productVariationId'=>$productVariationId,
		'inOrOut'=>'Out',
		'quantity'=>$quantity,
		'transactionDateTime'=>date('Y-m-d H:i:s'),
		'inventoryLogRemark'=>'The stocks is decreased by ' . $quantity . ' manually.',

		)
	);
	$res = $db->getResult();



	header("Location: manage-stocks.php?productVariationId=".$_POST['productVariationId']);
	$_SESSION['toast'] = 'stock-out';

}


if (isset($_GET['from']) and $_GET['from'] == 'reorder-point') {

	$productStocksReorderPoint = $db->escapeString($_POST['productStocksReorderPoint']);

	$db->update('product_variations_table',
	array(
		'productStocksReorderPoint'=>$productStocksReorderPoint,
		),
		'productVariationId=' . $_POST['productVariationId']
	);
	$res = $db->getResult();


	header("Location: manage-stocks.php?productVariationId=".$_POST['productVariationId']);
	$_SESSION['toast'] = 'reorder-point';

}


if (isset($_GET['from']) and $_GET['from'] == 'block-customer') {

	$db->update('users_table',
	array(
		'userIsBlocked'=>1,
		),
		'userId=' . $_GET['userId']
	);

	$res = $db->getResult();


	header("Location: manage-order.php?orderId=".$_GET['orderId']);
	$_SESSION['toast'] = 'block-customer';

}


if (isset($_GET['from']) and $_GET['from'] == 'unblock-customer') {

	$db->update('users_table',
	array(
		'userIsBlocked'=>0,
		),
		'userId=' . $_GET['userId']
	);

	$res = $db->getResult();


	header("Location: manage-order.php?orderId=".$_GET['orderId']);
	$_SESSION['toast'] = 'unblock-customer';

}


if (isset($_GET['from']) and $_GET['from'] == 'confirm-order') {

	$orderStatus = $db->escapeString("Confirmed");
	$orderId = $db->escapeString($_GET['orderId']);
	$userId = $db->escapeString($_GET['userId']);
	$notificationMessage = $db->escapeString("Order number " . $orderId . " was confirmed.");
	$notificationDateTime = $db->escapeString(date('Y-m-d H:i:s'));
	$notificationIsRead = $db->escapeString(0);
	
	
	
	$db->update('orders_table',
	array(
		'orderStatus'=>$orderStatus,
		),
		'orderId=' . $orderId
	);

	$res = $db->getResult();


	$db->insert('notifications_table',
	array(
		'userId'=>$userId,
		'notificationMessage'=>$notificationMessage,
		'notificationDateTime'=>$notificationDateTime,
		'notificationIsRead'=>$notificationIsRead,
		'orderId'=>$orderId,

		)
	);

	$res = $db->getResult();


	header("Location: manage-order.php?orderId=".$_GET['orderId']);
	$_SESSION['toast'] = 'confirm-order';

}


if (isset($_GET['from']) and $_GET['from'] == 'cancel-order') {

	$orderStatus = $db->escapeString("Cancelled");
	$orderId = $db->escapeString($_GET['orderId']);

	$userId = $db->escapeString($_GET['userId']);
	$notificationMessage = $db->escapeString("Order number " . $orderId . " was cancelled.");
	$notificationDateTime = $db->escapeString(date('Y-m-d H:i:s'));
	$notificationIsRead = $db->escapeString(0);

	$db->update('orders_table',
	array(
		'orderStatus'=>$orderStatus,
		),
		'orderId=' . $orderId
	);

	$res = $db->getResult();


	$db->insert('notifications_table',
	array(
		'userId'=>$userId,
		'notificationMessage'=>$notificationMessage,
		'notificationDateTime'=>$notificationDateTime,
		'notificationIsRead'=>$notificationIsRead,
		'orderId'=>$orderId,

		)
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




	header("Location: manage-order.php?orderId=".$_GET['orderId']);
	$_SESSION['toast'] = 'cancel-order';

}


if (isset($_GET['from']) and $_GET['from'] == 'finish-order') {

	$orderStatus = $db->escapeString("Finished");
	$orderId = $db->escapeString($_GET['orderId']);
	
	$userId = $db->escapeString($_GET['userId']);
	$notificationMessage = $db->escapeString("Order number " . $orderId . " was finished.");
	$notificationDateTime = $db->escapeString(date('Y-m-d H:i:s'));
	$notificationIsRead = $db->escapeString(0);

	$db->update('orders_table',
	array(
		'orderStatus'=>$orderStatus,
		),
		'orderId=' . $orderId
	);

	$res = $db->getResult();

	$db->insert('notifications_table',
	array(
		'userId'=>$userId,
		'notificationMessage'=>$notificationMessage,
		'notificationDateTime'=>$notificationDateTime,
		'notificationIsRead'=>$notificationIsRead,
		'orderId'=>$orderId,

		)
	);

	$res = $db->getResult();
	print_r($res);


	header("Location: manage-order.php?orderId=".$orderId);
	$_SESSION['toast'] = 'finish-order';

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

if (isset($_GET['from']) and $_GET['from'] == 'recieve-payment') {

	$orderId = $db->escapeString($_GET['orderId']);
	$paymentId = $db->escapeString($_GET['paymentId']);
	$paymentStatus = $db->escapeString("Recieved");
	$nameOfRemmitanceCenter = $db->escapeString("Paid over the counter");
	$orderPaymentStatus = $db->escapeString("Paid");

	$userId = $db->escapeString($_GET['userId']);
	$notificationMessage = $db->escapeString("Order number " . $orderId . " payment was recieved.");
	$notificationDateTime = $db->escapeString(date('Y-m-d H:i:s'));
	$notificationIsRead = $db->escapeString(0);


	$db->update('payments_table',
	array(
		'paymentStatus'=>$paymentStatus,
		),
		'paymentId=' . $paymentId
	);

	$res = $db->getResult();

	$db->update('orders_table',
	array(
		'orderPaymentStatus'=>$orderPaymentStatus,
		),
		'orderId=' . $orderId
	);

	$res = $db->getResult();

	$db->insert('notifications_table',
	array(
		'userId'=>$userId,
		'notificationMessage'=>$notificationMessage,
		'notificationDateTime'=>$notificationDateTime,
		'notificationIsRead'=>$notificationIsRead,
		'orderId'=>$orderId,

		)
	);

	$res = $db->getResult();

	header("Location: manage-order.php?orderId=".$orderId);
	$_SESSION['toast'] = 'recieve-payment';

}

if (isset($_GET['from']) and $_GET['from'] == 'invalid-payment') {

	$orderId = $db->escapeString($_GET['orderId']);
	$paymentId = $db->escapeString($_GET['paymentId']);
	$paymentStatus = $db->escapeString("Invalid");

	$userId = $db->escapeString($_GET['userId']);
	$notificationMessage = $db->escapeString("Order number " . $orderId . " payment was invalid.");
	$notificationDateTime = $db->escapeString(date('Y-m-d H:i:s'));
	$notificationIsRead = $db->escapeString(0);


	$db->update('payments_table',
	array(
		'paymentStatus'=>$paymentStatus,
		),
		'paymentId=' . $paymentId
	);

	$res = $db->getResult();

	$db->insert('notifications_table',
	array(
		'userId'=>$userId,
		'notificationMessage'=>$notificationMessage,
		'notificationDateTime'=>$notificationDateTime,
		'notificationIsRead'=>$notificationIsRead,
		'orderId'=>$orderId,

		)
	);
	
	$res = $db->getResult();

	header("Location: manage-order.php?orderId=".$orderId);
	$_SESSION['toast'] = 'invalid-payment';

}


if (isset($_GET['from']) and $_GET['from'] == 'add-payment') {

	$paymentAmount = $db->escapeString($_POST['paymentAmount']);
	$orderId = $db->escapeString($_GET['orderId']);
	$paymentTransactionDate = $db->escapeString(date('Y-m-d H:i:s'));
	$paymentStatus = $db->escapeString("Recieved");
	$orderPaymentStatus = $db->escapeString("Paid");

	$userId = $db->escapeString($_GET['userId']);
	$notificationMessage = $db->escapeString("Order number " . $orderId . " payment was recieved.");
	$notificationDateTime = $db->escapeString(date('Y-m-d H:i:s'));
	$notificationIsRead = $db->escapeString(0);

	

	$db->insert('payments_table',
	array(
		'paymentAmount'=>$paymentAmount,
		'orderId'=>$orderId,
		'paymentTransactionDate'=>$paymentTransactionDate,
		'paymentStatus'=>$paymentStatus,
		
		)
	);

	$res = $db->getResult();

	$db->update('orders_table',
	array(
		'orderPaymentStatus'=>$orderPaymentStatus,
		),
		'orderId=' . $orderId
	);
	$res = $db->getResult();

	$db->insert('notifications_table',
	array(
		'userId'=>$userId,
		'notificationMessage'=>$notificationMessage,
		'notificationDateTime'=>$notificationDateTime,
		'notificationIsRead'=>$notificationIsRead,
		'orderId'=>$orderId,

		)
	);

	$res = $db->getResult();
	header("Location: manage-order.php?orderId=".$orderId);
	$_SESSION['toast'] = 'add-payment';
}


if (isset($_GET['from']) and $_GET['from'] == 'confirm-pick-up-date-order') {

	$orderIsReschedule = $db->escapeString(1);
	$orderId = $db->escapeString($_GET['orderId']);
	
	$userId = $db->escapeString($_GET['userId']);
	$notificationMessage = $db->escapeString("Order number " . $orderId . " pick up date was confirmed.");
	$notificationDateTime = $db->escapeString(date('Y-m-d H:i:s'));
	$notificationIsRead = $db->escapeString(0);
	


	$db->update('orders_table',
	array(
		'orderIsReschedule'=>$orderIsReschedule,
		),
		'orderId=' . $orderId
	);

	$res = $db->getResult();

	$db->insert('notifications_table',
	array(
		'userId'=>$userId,
		'notificationMessage'=>$notificationMessage,
		'notificationDateTime'=>$notificationDateTime,
		'notificationIsRead'=>$notificationIsRead,
		'orderId'=>$orderId,

		)
	);
	$res = $db->getResult();


	header("Location: manage-order.php?orderId=".$orderId);
	$_SESSION['toast'] = 'confirm-pick-up-date-order';

}


if (isset($_GET['from']) and $_GET['from'] == 'reschedule-pick-up-date') {

	$orderPickupDate = $db->escapeString($_POST['orderPickupDate']);
	$orderId = $db->escapeString($_GET['orderId']);
	$orderIsReschedule = $db->escapeString(2);

	$userId = $db->escapeString($_GET['userId']);
	$notificationMessage = $db->escapeString("Order number " . $orderId . " was rescheduled to " . date('F d, Y', strtotime($_POST['orderPickupDate'])) . ".");
	$notificationDateTime = $db->escapeString(date('Y-m-d H:i:s'));
	$notificationIsRead = $db->escapeString(0);

	$db->update('orders_table',
	array(
		'orderPickupDate'=>$orderPickupDate,
		'orderIsReschedule'=>$orderIsReschedule,
		
		),
		'orderId=' . $orderId
	);

	$res = $db->getResult();

	$db->insert('notifications_table',
	array(
		'userId'=>$userId,
		'notificationMessage'=>$notificationMessage,
		'notificationDateTime'=>$notificationDateTime,
		'notificationIsRead'=>$notificationIsRead,
		'orderId'=>$orderId,

		)
	);

	$res = $db->getResult();


	header("Location: manage-order.php?orderId=".$_GET['orderId']);
	$_SESSION['toast'] = 'reschedule-pick-up-date';

}






?>
