<?php
session_start();

$id = $_POST['id'];
unset($_SESSION['basket'][$id]);

$sum = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $sum += $value['AMOUNT'];
}

$_SESSION['basketSum'] = $sum;
$_SESSION['finalbasketSum'] = $sum;

if ($_SESSION['basket'] == []) {
    unset($_SESSION['basket']);
    unset($_SESSION['basketSum']);
    unset($_SESSION['finalbasketSum']);
?>
    <div id="price-amount-value" class="price-amount-value"></div>
<?php
} else {
    require_once('../../config/basket.php');
?>
    <table id="basketTable">
        <tbody>
            <?php
            addBasketList($_SESSION['basket'], $products);
            ?>
        </tbody>
    </table>

    <div id="price-amount-value" class="price-amount-value"><?= $_SESSION['basketSum'] ?> руб.</div>
<?php
}
