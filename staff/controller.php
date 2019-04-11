
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



?>
