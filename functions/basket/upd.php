<?php
session_start();

$id = $_POST['id'];
$value = $_POST['value'];
$_SESSION['basket'][$id]['VALUE'] = $value;
$_SESSION['basket'][$id]['AMOUNT'] = $_SESSION['basket'][$id]['PRICE'] * $_SESSION['basket'][$id]['VALUE'];

$sum = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $sum += $value['AMOUNT'];
}

$_SESSION['basketSum'] = $sum;
$_SESSION['finalbasketSum'] = $sum;

require_once('../../config/basket.php');

?>

<div id="amount-prod"><?= $_SESSION['basket'][$id]['AMOUNT'] ?> руб.</div>

<div id="price-amount-value" class="price-amount-value"><?= $_SESSION['basketSum'] ?> руб.</div>