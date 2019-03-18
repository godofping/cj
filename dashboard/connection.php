<?php 

session_start();
date_default_timezone_set('Asia/Manila');

include('class/mysql_crud.php');
$db = new Database();
$db->connect();

?>