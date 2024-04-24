<?php
require_once('../../config/connect.php');

$orderid = $_POST['orderid'];
$status = $_POST['status'];

mysqli_query($ConnectDatabase, "UPDATE `orders` SET `STATUS` = '$status'  WHERE `orders`.`ID` = $orderid");
