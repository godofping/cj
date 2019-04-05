
<?php 
include('connection.php');

if (isset($_GET['from']) and $_GET['from'] == 'login') {
	
	$userName = $db->escapeString($_POST['userName']);
	$userPassword = $db->escapeString(md5($_POST['userPassword']));

	$db->select('users_table', '*', NULL, 'userName = "' . $userName  .'" and userPassword = "' . $userPassword . '"');
	$res = $db->getResult();

	if (count($res) > 0) {
		$res = $res[0];
		$_SESSION['userLevel'] = $res['userLevel'];
		$_SESSION['userId'] = $res['userId'];
		$_SESSION['userName'] = $res['userName'];
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
	$res = $db->getResult();
	header("Location: categories.php");
	$_SESSION['toast'] = 'delete-category';
}


if (isset($_GET['from']) and $_GET['from'] == 'add-user') {

	$db->select('users_table','*',NULL,'userName = "' . $_POST['userName'] . '"', NULL); 
	$res = $db->getResult();
	
	if (count($res) == 0) {
		$userName = $db->escapeString($_POST['userName']);
		$userPassword = $db->escapeString(md5($_POST['userPassword']));
		$fullName = $db->escapeString($_POST['fullName']);

		$db->insert('users_table',
		array(
			'userName'=>$userName,
			'userPassword'=>$userPassword,
			'fullName'=>$fullName,
			'userLevel'=>'2',
			'isDeleted'=>'0',
			)
		);

		$res = $db->getResult();

		
		$_SESSION['toast'] = 'add-user';
	}
	else
	{
		$_SESSION['toast'] = 'userName-taken';

	}
	header("Location: add-user.php");

	
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


if (isset($_GET['from']) and $_GET['from'] == 'delete-user') {

	$userId = $db->escapeString($_GET['userId']);

	$db->update('users_table',
	array(
		'isDeleted'=>'1',
		),
		'userId=' . $_GET['userId']
	);

	$res = $db->getResult();

	print_r($res);

	header("Location: manage-users.php");
	$_SESSION['toast'] = 'delete-user';
}



if (isset($_GET['from']) and $_GET['from'] == 'change-password') {

	$password = $db->escapeString(md5($_POST['password']));



	$db->update('users_table',
	array(
		'password'=>$password,
		),
			'userId=' . $_SESSION['userId']
	);

	$res = $db->getResult();

	header("Location: change-password.php");
	$_SESSION['toast'] = 'change-password';
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


	header("Location: add-product.php");
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

	$res = $db->getResult();

	header("Location: sub-categories.php");
	$_SESSION['toast'] = 'delete-sub-category';
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

if (isset($_GET['from']) and $_GET['from'] == 'confirm-feedback') {



	$db->update('customer_feedbacks_table',
	array(
		'customerFeedbackStatus'=>1,
		),
		'customerFeedbackId=' . $_GET['customerFeedbackId']
	);

	$res = $db->getResult();


	header("Location: feedbacks.php");
	$_SESSION['toast'] = 'confirm-feedback';

}


if (isset($_GET['from']) and $_GET['from'] == 'delete-feedback') {



	$db->update('customer_feedbacks_table',
	array(
		'customerFeedbackStatus'=>2,
		),
		'customerFeedbackId=' . $_GET['customerFeedbackId']
	);

	$res = $db->getResult();


	header("Location: feedbacks.php");
	$_SESSION['toast'] = 'delete-feedback';

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

	$db->update('customers_table',
	array(
		'customerIsBlocked'=>1,
		),
		'customerId=' . $_GET['customerId']
	);

	$res = $db->getResult();


	header("Location: manage-order.php?orderId=".$_GET['orderId']);
	$_SESSION['toast'] = 'block-customer';

}


if (isset($_GET['from']) and $_GET['from'] == 'unblock-customer') {

	$db->update('customers_table',
	array(
		'customerIsBlocked'=>0,
		),
		'customerId=' . $_GET['customerId']
	);

	$res = $db->getResult();


	header("Location: manage-order.php?orderId=".$_GET['orderId']);
	$_SESSION['toast'] = 'unblock-customer';

}


?>
