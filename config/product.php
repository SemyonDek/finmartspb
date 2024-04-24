<?php

require_once('connect.php');
require_once('brand.php');
require_once('filters.php');

if (isset($_GET['search'])) {
    $products = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE $searchStr");
} else {
    $products = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE 
    PRICE BETWEEN $min_prod_mass AND $max_prod_mass $catidStr $brandStr $sort");
}

$products = mysqli_fetch_all($products, MYSQLI_ASSOC);

function addProdListAdm($products)
{
    foreach ($products as $item) {
?>
        <div class="product-item">
            <div class="product-item-block">

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
    }
}
function addProdListUser($products)
{
    foreach ($products as $item) {
    ?>
        <div class="product-item">
            <div class="product-item-block">

                <div class="product-item-img-block">
                    <a href="product-card.php?prodid=<?= $item['ID'] ?>"><img src="<?= $item['SRC'] ?>" alt=""></a>
                </div>

                <div class="product-item-name-block">
                    <a href="product-card.php?prodid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
                </div>

                <div class="product-item-buy-block">
                    <div class="product-item-price-block"><?= $item['PRICE'] ?> руб.</div>
                    <div class="product-item-buy-bottom" onclick="addBasket(<?= $item['ID'] ?>)"><img src="img/main/basket-add-icon.png" alt=""></div>
                </div>
            </div>
        </div>

<?php
    }
}
