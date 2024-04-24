<?php
require_once('config/delivery.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ФИНМАРТ | Товары из Финляндии</title>
    <link rel="stylesheet" href="css/order.css">
</head>

<body>

    <?php
    $orderPage = true;
    require_once('header.php');
    if (isset($_SESSION['accountId'])) {
        $accountid = $_SESSION['accountId'];
        $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$accountid'");
        $usersData = mysqli_fetch_assoc($usersData);
    }
    ?>

    <main>
        <div class="container">
            <?php
            require_once('category-list.php');
            ?>

            <div class="main-block">

                <div class="basket-title">Оформление заказа</div>

                <div class="order-main-block">
                    <form id="orderForm" action="">
                        <div class="order-item-block">
                            <div class="order-item-title-line">
                                <div class="order-item-number-block">1</div>
                                <div class="order-item-title-name">Контактные данные</div>
                            </div>
                            <div class="order-item-input-block">
                                <input id="emailUser" name="emailUser" value="<?php if (isset($usersData)) echo $usersData['EMAIL'] ?>" placeholder="E-mail" class="order-input" type="text">
                                <input id="phoneUser" name="phoneUser" value="<?php if (isset($usersData)) echo $usersData['PHONE'] ?>" placeholder="Телефон" class="order-input" type="text">
                                <input id="fioUser" name="fioUser" value="<?php if (isset($usersData)) echo $usersData['NAME'] ?>" placeholder="Ф.И.О." class="order-input" type="text">
                                <input id="addresUser" name="addresUser" value="<?php if (isset($usersData)) echo $usersData['ADDRESS'] ?>" placeholder="Адрес доставки" class="order-input" type="text">
                                <textarea id="commOrder" name="commOrder" placeholder="Комментарий к заказу" class="order-input"></textarea>
                            </div>
                        </div>

                        <div class="order-item-block">
                            <div class="order-item-title-line">
                                <div class="order-item-number-block">2</div>
                                <div class="order-item-title-name">Способ доставки</div>
                            </div>
                            <div class="order-item-input-block">
                                <input type="hidden" name="delivery" id="delivery" value="">
                                <?php
                                addListDeliveryOrder($delivery);
                                ?>
                            </div>
                        </div>
                    </form>

                    <div class="bottom-order-block">
                        <div class="name-button-order">Всего к оплате</div>
                        <div id="amount-price" class="amount-order"><?= $_SESSION['basketSum'] ?> руб.</div>
                        <button id="order-button" class="order-button" type="button" onclick="addOrder()">Оформить заказ</button>
                    </div>
                </div>

            </div>

        </div>
    </main>
    <?php
    require_once('footer.php');
    ?>

</body>

<script src="script/order-add.js"></script>

</html>