<?php
require_once('config/connect.php');
require_once('config/orders.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ФИНМАРТ | Товары из Финляндии</title>
    <link rel="stylesheet" href="css/account.css">
</head>

<body>

    <?php
    $accountPage = true;
    require_once('header.php');

    ?>

    <main>
        <div class="container">
            <?php
            require_once('category-list.php');
            $accountid = $_SESSION["accountId"];
            $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$accountid'");
            $usersData = mysqli_fetch_assoc($usersData);
            $orders = mysqli_query($ConnectDatabase, "SELECT * FROM `orders` WHERE USERID = '$accountid'");
            $orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);
            ?>

            <div class="main-block">

                <div class="basket-title">Личный кабинет</div>

                <div class="account-main-block">
                    <div class="tabs-list-block">
                        <div id="order-tub" class="tab-item tab-item-active">Заказы</div>
                        <div id="info-tub" class="tab-item">Данные</div>
                    </div>

                    <div class="line-logout">
                        <a href="functions/account/logout.php" class="logout-button">Выйти</a>
                    </div>

                    <div class="account-info-main-block">
                        <div id="order-block" class="account-info-item info-block-active">
                            <!-- <div class="orders-list-clear">У вас нет заказов</div> -->
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

                        <div id="info-block" class="account-info-item">
                            <form id="updAccountForm" action="">
                                <div class="info-input-block">
                                    <input id="emailUser" name="emailUser" value="<?= $usersData['EMAIL'] ?>" placeholder="E-mail" class="account-input" type="text">
                                    <input id="phoneUser" name="phoneUser" value="<?= $usersData['PHONE'] ?>" placeholder="Телефон" class="account-input" type="text">
                                    <input id="fioUser" name="fioUser" value="<?= $usersData['NAME'] ?>" placeholder="Ф.И.О." class="account-input" type="text">
                                    <input id="addresUser" name="addresUser" value="<?= $usersData['ADDRESS'] ?>" placeholder="Адрес доставки" class="account-input" type="text">
                                </div>
                                <button id="account-button" class="account-button" type="button">Сохранить</button>
                            </form>
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

<script src="script/account.js"></script>

</html>