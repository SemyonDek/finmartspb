<?php
require_once('config/basket.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ФИНМАРТ | Товары из Финляндии</title>
    <link rel="stylesheet" href="css/basket.css">
</head>

<body>

    <?php
    $basketPage = true;
    require_once('header.php');
    ?>

    <main>
        <div class="container">
            <?php
            require_once('category-list.php');
            ?>

            <div class="main-block">
                <div class="basket-title">Корзина товаров</div>

                <div class="basket-main-block">
                    <div class="basket-table-block">
                        <table id="basketTable">
                            <tbody>
                                <?php
                                addBasketList($_SESSION['basket'], $products);
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="amount-price-block">
                        <div class="amount-block">
                            <div class="title-amount">К оплате:</div>
                            <div id="price-amount-value" class="price-amount-value"><?= $_SESSION['basketSum'] ?> руб.</div>
                            <button id="order-button" class="order-button" type="button">Оформить заказ</button>
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

<script src="script/basket.js"></script>

</html>