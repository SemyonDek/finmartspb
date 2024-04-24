<?php
require_once('../../config/connect.php');
session_start();

$prodid = $_POST['prodid'];
$value = $_POST['value'];

$itemProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE `ID`='$prodid'");
$itemProd = mysqli_fetch_assoc($itemProd);

$price = $itemProd['PRICE'];
$amount = $value * $price;

$prod = [];
$prod['ID'] = $prodid;
$prod['VALUE'] = $value;
$prod['PRICE'] = $price;
$prod['AMOUNT'] = $amount;

$basket = [];

if (isset($_SESSION['basket'])) {
    if ($_SESSION['basket'] !== '') {
        $basket = $_SESSION['basket'];

        $prov = true;
        foreach ($basket as $key => $item) {
            if ($item['ID'] == $prod['ID']) {
                $basket[$key]['VALUE'] = $basket[$key]['VALUE'] + $prod['VALUE'];
                $basket[$key]['AMOUNT'] = $basket[$key]['PRICE'] * $basket[$key]['VALUE'];
                $prov = false;
                break;
            }
        }

        if ($prov) array_push($basket, $prod);
    }
} else {
    array_push($basket, $prod);
}

$_SESSION['basket'] = $basket;

$sum = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $sum += $value['AMOUNT'];
}

$_SESSION['basketSum'] = $sum;
$_SESSION['finalbasketSum'] = $sum;
