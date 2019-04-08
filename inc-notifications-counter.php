<?php 
include('dashboard/connection.php');

$db->select('notifications_table','coalesce(count(*), 0) as total',NULL,'userId = "' . $_SESSION['userId'] . '" and notificationIsRead = 0', NULL); 
$res = $db->getResult(); 

$res = $res[0];

echo $res['total'];


?>