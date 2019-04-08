<?php 
include('connection.php');

$db->select('notifications_table','coalesce(count(*), 0) as total',NULL,'administratorUserId = "' . $_SESSION['administratorUserId'] . '" and notificationIsRead = 0', NULL); 
$res = $db->getResult(); 

$res = $res[0];

echo $res['total'];


?>