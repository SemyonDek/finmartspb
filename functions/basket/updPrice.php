<?php
require_once('../../config/connect.php');
session_start();

$id = $_POST['id'];

$deliveryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `delivery` WHERE ID = '$id'");
$deliveryitem = mysqli_fetch_assoc($deliveryitem);

$deliveryPrice = $deliveryitem['PRICE'];
$sum = $_SESSION['basketSum'] + $deliveryPrice;

$_SESSION['finalbasketSum'] = $sum;

?>

<div id="amount-price" class="amount-order"><?= $_SESSION['finalbasketSum']  ?> руб. <span class="amount-delivery">включая доставку <?= $deliveryPrice ?> руб.</span></div>