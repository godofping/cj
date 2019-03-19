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
	$productCategoryId = $db->escapeString($_POST['productCategoryId']);
	$productPrice = $db->escapeString($_POST['productPrice']);
	$productWeight = $db->escapeString($_POST['productWeight']);
	$productDetails = $db->escapeString($_POST['productDetails']);
	$productSKU = $db->escapeString($_POST['productSKU']);
	$menOrWomenOrNotAppplicable = $db->escapeString($_POST['menOrWomenOrNotAppplicable']);


	$db->insert('products_table',
	array(
		'productName'=>$productName,
		'productCategoryId'=>$productCategoryId,
		'productPrice'=>$productPrice,
		'productWeight'=>$productWeight,
		'productDetails'=>$productDetails,
		'productSKU'=>$productSKU,
		'menOrWomenOrNotAppplicable'=>$menOrWomenOrNotAppplicable,
		'productUpdateDate'=>date('Y-m-d H:i:s'),
		'productLive'=>'1',
		)
	);

	$res = $db->getResult();

	header("Location: add-product.php");
	$_SESSION['toast'] = 'add-product';
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

	$db->update('product_sub_categories_table',
	array(
		'productCategoryId'=>$productCategoryId,
		'productSubCategory'=>$productSubCategory,
		)
	);

	$res = $db->getResult();

	header("Location: update-sub-category.php");
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
