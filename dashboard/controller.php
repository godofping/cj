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
		$userPassword = $db->escapeString($_POST['userPassword']);
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
	$userPassword = $db->escapeString($_POST['userPassword']);
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
	$productPrice = $db->escapeString($_POST['productPrice']);
	$productDetails = $db->escapeString($_POST['productDetails']);
	$productSKU = $db->escapeString($_POST['productSKU']);
	$productLive = $db->escapeString($_POST['productLive']);
	$productStock = $db->escapeString($_POST['productStock']);
	$productStocksReorderPoint = $db->escapeString($_POST['productStocksReorderPoint']);

	$db->insert('products_table',
	array(
		'productName'=>$productName,
		'productSubCategoryId'=>$productSubCategoryId,
		'productPrice'=>$productPrice,
		'productDetails'=>$productDetails,
		'productSKU'=>$productSKU,
		'productUpdateDate'=>date('Y-m-d H:i:s'),
		'productLive'=>$productLive,
		'productStock'=>$productStock,
		'productStocksReorderPoint'=>$productStocksReorderPoint,
		)
	);

	$res = $db->getResult();

	$productId = $res[0];


	$db->insert('product_images_table',
	array(
		'productImageLocation'=>'images/default-image.jpg',
		'isThumbnail'=>'1',
		'productId'=>$productId,
		)
	);

	$res = $db->getResult();


	$db->insert('product_images_table',
	array(
		'productImageLocation'=>'images/default-image.jpg',
		'isThumbnail'=>'0',
		'productId'=>$productId,
		)
	);

	$res = $db->getResult();


	$db->insert('product_images_table',
	array(
		'productImageLocation'=>'images/default-image.jpg',
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
	$productPrice = $db->escapeString($_POST['productPrice']);
	$productDetails = $db->escapeString($_POST['productDetails']);
	$productSKU = $db->escapeString($_POST['productSKU']);
	$productLive = $db->escapeString($_POST['productLive']);
	$productStock = $db->escapeString($_POST['productStock']);
	$productStocksReorderPoint = $db->escapeString($_POST['productStocksReorderPoint']);



	$db->update('products_table',
	array(
		'productName'=>$productName,
		'productSubCategoryId'=>$productSubCategoryId,
		'productPrice'=>$productPrice,
		'productDetails'=>$productDetails,
		'productSKU'=>$productSKU,
		'productUpdateDate'=>date('Y-m-d H:i:s'),
		'productLive'=>$productLive,
		'productStock'=>$productStock,
		'productStocksReorderPoint'=>$productStocksReorderPoint,
		),
		'productId=' . $_POST['productId']
	);

	$res = $db->getResult();

	header("Location: update-product.php?productId=".$_POST['productId']);
	$_SESSION['toast'] = 'update-product';
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

?>
