<?php
session_start();

require_once('../../config/connect.php');

$emailUser = $_POST['emailUser'];
$phoneUser = $_POST['phoneUser'];
$fioUser = $_POST['fioUser'];
$addresUser = $_POST['addresUser'];

$idUser = $_SESSION['accountId'];

mysqli_query($ConnectDatabase, "UPDATE `users` SET 
`EMAIL` = '$emailUser', `PHONE` = '$phoneUser', 
`NAME` = '$fioUser', `ADDRESS` = '$addresUser' WHERE `users`.`ID` = $idUser");
