<?php
require_once('../config/delivery.php');
require_once('../config/orders.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/category-add.css">
    <link rel="stylesheet" href="../css/account.css">
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

                <div class="basket-title">Заказы</div>

                <div class="category-add-list-block">
                    <div class="add-category-title">Список заказов</div>
                    <br>
                    <div id="order-block" class="account-info-item info-block-active">
                        <table id="ordersTable">
                            <thead>
                                <tr>
                                    <td class="td-number">№</td>
                                    <td class="td-date">Дата и Время</td>
                                    <td class="td-address">Адресс</td>
                                    <td class="td-delivery">Способ доставки</td>
                                    <td class="td-amount">Сумма</td>
                                    <td class="td-info">Информация</td>
                                    <td class="td-status">Состояние</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                addOrdersList($orders, $delivery);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br>
                <br>

                <div class="category-add-main-block">
                    <div class="add-category-block">
                        <div class="add-category-title">Добавление способа доставки</div>
                        <input class="input-text" id="nameDelivery" name="nameDelivery" type="text" placeholder="Название">
                        <input class="input-text" id="priceDelivery" name="priceDelivery" type="number" placeholder="Цена">
                        <input class="input-button" id="addDelivery" type="button" value="Добавить">
                    </div>
                    <div class="upd-category-block">
                        <div class="add-category-title">Изменение способа доставки</div>
                        <input id="deliveryid" name="deliveryid" type="hidden" value="">
                        <input class="input-text" id="nameUpdDelivery" name="nameUpdDelivery" type="text" placeholder="Название">
                        <input class="input-text" id="priceUpdDelivery" name="priceUpdDelivery" type="number" placeholder="Цена">
                        <input class="input-button" id="updDelivery" type="button" value="Изменить">
                    </div>

                    <div class="category-add-list-block">
                        <div class="add-category-title">Список способов доставки</div>
                        <div id="add-delivery-list" class="category-add-list">
                            <?php
                            addListDelivery($delivery);
                            ?>
                        </div>
                    </div>



                </div>

            </div>

        </div>
    </main>

</body>

<script src="../script/delivery-add.js"></script>

</html>