<?php
require_once('../../config/connect.php');
session_start();

if (isset($_SESSION['accountId'])) {
    $idUser = $_SESSION['accountId'];
} else {
    $idUser = 0;
}
$date = date('d.m.Y H:i');
$deliveryid = $_POST['delivery'];

$deliveryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `delivery` WHERE ID = '$deliveryid'");
$deliveryitem = mysqli_fetch_assoc($deliveryitem);

$deliveryName = $deliveryitem['NAME'];
$deliveryPrice = $deliveryitem['PRICE'];

$emailUser = $_POST['emailUser'];
$phoneUser = $_POST['phoneUser'];
$fioUser = $_POST['fioUser'];
$addresUser = $_POST['addresUser'];
$commOrder = $_POST['commOrder'];

$amount = $_SESSION['basketSum'];
$amountFull = $_SESSION['finalbasketSum'];

$status = 0;




mysqli_query($ConnectDatabase, "INSERT INTO `orders` 
(`ID`, `USERID`, `DATE`, `ADDRESS`, `DELIVERYID`, `DELIVERYNAME`, `DELIVERYPRICE`, 
`AMOUNT`, `AMOUNTFULL`, `EMAIL`, `NUMBER`, `USERNAME`, `COMM`, `STATUS`) VALUES 
(NULL, '$idUser', '$date', '$addresUser', '$deliveryid', '$deliveryName', '$deliveryPrice', 
'$amount', '$amountFull', '$emailUser', '$phoneUser', '$fioUser', '$commOrder', '$status')");

$idOrder = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `orders`");
$idOrder = mysqli_fetch_all($idOrder);
$idOrder = $idOrder[0][0];

foreach ($_SESSION['basket'] as $item) {

    $prodid = $item['ID'];
    $value = $item['VALUE'];
    $price = $item['PRICE'];
    $amountProd = $item['AMOUNT'];

    $productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
    $productitem = mysqli_fetch_assoc($productitem);

    $nameProd = $productitem['NAME'];

    mysqli_query($ConnectDatabase, "INSERT INTO `orders_item` 
    (`ID`, `ORDERID`, `PRODID`, `PRODNAME`, `VALUE`, `AMOUNT`) VALUES 
    (NULL, '$idOrder', '$prodid', '$nameProd', '$value', '$amountProd')");
}

unset($_SESSION['basket']);
unset($_SESSION['basketSum']);
unset($_SESSION['finalbasketSum']);
