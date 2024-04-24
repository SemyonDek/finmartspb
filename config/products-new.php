<?php

require_once('connect.php');

$products = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$products = mysqli_fetch_all($products, MYSQLI_ASSOC);

$newList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_new`");
$newList = mysqli_fetch_all($newList, MYSQLI_ASSOC);

function addProdSliderAdm($products, $newList)
{

    foreach ($newList as $itemNew) {
        foreach ($products as $item) {
            if ($item['ID'] == $itemNew['PRODID']) {
?>
                <div class="product-item-block">
                    <div class="product-item-content-block">
                        <div class="product-item-img-block">
                            <a href="product-upd.php?prodid=<?= $item['ID'] ?>"><img src="../<?= $item['SRC'] ?>" alt=""></a>
                        </div>
                        <div class="product-item-name-block">
                            <a href="product-upd.php?prodid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
                        </div>
                        <div class="product-item-buy-block">
                            <div class="product-item-price-block"><?= $item['PRICE'] ?> руб.</div>
                            <a href="product-upd.php?prodid=<?= $item['ID'] ?>" class="product-item-upd-button">Изменить</a>
                        </div>
                    </div>
                </div>

            <?php
                break;
            }
        }
    }
}

function addProdSliderUser($products, $newList)
{

    foreach ($newList as $itemNew) {
        foreach ($products as $item) {
            if ($item['ID'] == $itemNew['PRODID']) {
            ?>
                <div class="product-item-block">
                    <div class="product-item-content-block">
                        <div class="product-item-img-block">
                            <a href="product-card.php?prodid=<?= $item['ID'] ?>"><img src="<?= $item['SRC'] ?>" alt=""></a>
                        </div>
                        <div class="product-item-name-block">
                            <a href="product-card.php?prodid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
                        </div>
                        <div class="product-item-buy-block">
                            <div class="product-item-price-block"><?= $item['PRICE'] ?> руб.</div>
                            <div class="product-item-buy-button" onclick="addBasket(<?= $item['ID'] ?>)"><img src="img/main/basket-add-icon.png" alt=""></div>
                        </div>
                    </div>
                </div>
<?php
                break;
            }
        }
    }
}
