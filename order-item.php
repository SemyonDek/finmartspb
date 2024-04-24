<?php
require_once('config/basket.php');
$orderid = $_GET['orderid'];
$order = mysqli_query($ConnectDatabase, "SELECT * FROM `orders` WHERE ID = '$orderid'");
$order = mysqli_fetch_assoc($order);
$orderItems = mysqli_query($ConnectDatabase, "SELECT * FROM `orders_item` WHERE ORDERID = '$orderid'");
$orderItems = mysqli_fetch_all($orderItems, MYSQLI_ASSOC);
$deliveryid = $order['DELIVERYID'];
$deliveryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `delivery` WHERE ID = '$deliveryid'");
$deliveryitem = mysqli_fetch_assoc($deliveryitem);
if (isset($deliveryitem)) {
    $deliveryName = $deliveryitem['NAME'];
} else {
    $deliveryName = $order['DELIVERYNAME'];
}

// print_r($orderItems);
// print_r($products);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ФИНМАРТ | Товары из Финляндии</title>
    <link rel="stylesheet" href="css/order-item.css">
</head>

<body>

    <?php
    require_once('header.php');
    ?>

    <main>
        <div class="container">
            <?php
            require_once('category-list.php');
            ?>

            <div class="main-block">

                <div class="basket-title">Страница заказа №<?= $orderid ?></div>

                <div class="order-item-main-block">

                    <div class="basket-table-block">
                        <table id="basketTable">
                            <tbody>
                                <?php
                                addOrderItemListUser($orderItems, $products);
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="order-item-block">
                        <div class="order-item-title-line">
                            <div class="order-item-number-block">📦</div>
                            <div class="order-item-title-name">Информация о заказе</div>
                        </div>
                        <div class="order-item-input-block">
                            <div class="order-item-info-line">
                                <div class="name-order-item-info">Сотсояние:</div>
                                <div class="value-order-item-info">
                                    <?php
                                    if ($order['STATUS'] == '0') echo 'В обработке';
                                    if ($order['STATUS'] == '1') echo 'В доставке';
                                    if ($order['STATUS'] == '2') echo 'Доставлен';
                                    ?>
                                </div>
                            </div>
                            <div class="order-item-info-line">
                                <div class="name-order-item-info">Email:</div>
                                <div class="value-order-item-info"><?= $order['EMAIL'] ?></div>
                            </div>
                            <div class="order-item-info-line">
                                <div class="name-order-item-info">Телефон:</div>
                                <div class="value-order-item-info"><?= $order['NUMBER'] ?></div>
                            </div>
                            <div class="order-item-info-line">
                                <div class="name-order-item-info">Ф.И.О.:</div>
                                <div class="value-order-item-info"><?= $order['USERNAME'] ?></div>
                            </div>
                            <div class="order-item-info-line">
                                <div class="name-order-item-info">Адрес доставки:</div>
                                <div class="value-order-item-info"><?= $order['ADDRESS'] ?></div>
                            </div>
                            <div class="order-item-info-line">
                                <div class="name-order-item-info">Комментарий к заказу:</div>
                                <div class="value-order-item-info"><?= nl2br($order['COMM']) ?></div>
                            </div>
                            <div class="order-item-info-line">
                                <div class="name-order-item-info">Способ доставки:</div>
                                <div class="value-order-item-info"><?= $deliveryName ?> -<span class="price-delivery"><?= $order['DELIVERYPRICE'] ?> руб.</span></div>
                            </div>
                            <div class="order-item-info-line">
                                <div class="name-order-item-info">Сумма заказа:</div>
                                <div class="value-order-item-info"><span class="price-amount"><?= $order['AMOUNTFULL'] ?> руб.</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="button-back-block">
                        <a href="account.php" class="order-button">Назад</a>
                    </div>

                </div>

            </div>

        </div>

        </div>
    </main>
    <?php
    require_once('footer.php');
    ?>

</body>

</html>