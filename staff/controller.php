
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



?>
