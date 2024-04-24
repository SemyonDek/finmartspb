<?php

require_once('connect.php');

$products = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$products = mysqli_fetch_all($products, MYSQLI_ASSOC);


function addBasketList($basket, $products)
{
    foreach ($basket as $key => $item) {
        foreach ($products as $itemProd) {
            if ($item['ID'] == $itemProd['ID']) {

?>
                <tr>
                    <td class="td-img">
                        <a href="product-card.php?prodid=<?= $itemProd['ID'] ?>"><img src="<?= $itemProd['SRC'] ?>" alt=""></a>
                    </td>
                    <td class="td-name">
                        <a href="product-card.php?prodid=<?= $itemProd['ID'] ?>"><?= $itemProd['NAME'] ?></a>
                    </td>
                    <td class="td-count">
                        <div class="value-prod-block">
                            <input id="value-prod<?= $key ?>" class="value-prod-input" type="number" value="<?= $item['VALUE'] ?>" disabled="">
                            <div class="value-button-block">
                                <button onclick="minusValue(<?= $key ?>)" id="minus-value" class="value-button-input" type="button"></button>
                                <button onclick="plusValue(<?= $key ?>)" id="plus-value" class="value-button-input" type="button"></button>
                            </div>
                        </div>
                    </td>
                    <td id="amount-prod<?= $key ?>" class="td-price"><?= $item['AMOUNT'] ?> руб.</td>
                    <td class="td-del">
                        <div class="remove-basket-item" onclick="delBasket(<?= $key ?>)"><img src="img/main/remove-basket.png" alt=""></div>
                    </td>
                </tr>
            <?php

            }
        }
    }
}

function addOrderItemListAdm($orderItems, $products)
{
    foreach ($orderItems as $key => $item) {
        foreach ($products as $itemProd) {
            if ($item['PRODID'] == $itemProd['ID']) {

            ?>
                <tr>
                    <td class="td-img">
                        <a href="product-upd.php?prodid=<?= $itemProd['ID'] ?>"><img src="../<?= $itemProd['SRC'] ?>" alt=""></a>
                    </td>
                    <td class="td-name">
                        <a href="product-upd.php?prodid=<?= $itemProd['ID'] ?>"><?= $itemProd['NAME'] ?></a>
                    </td>
                    <td class="td-count"><?= $item['VALUE'] ?></td>
                    <td id="amount-prod<?= $key ?>" class="td-price"><?= $item['AMOUNT'] ?> руб.</td>
                </tr>
            <?php

            }
        }
    }
}

function addOrderItemListUser($orderItems, $products)
{
    foreach ($orderItems as $key => $item) {
        foreach ($products as $itemProd) {
            if ($item['PRODID'] == $itemProd['ID']) {
            ?>
                <tr>
                    <td class="td-img">
                        <a href="product-card.php?prodid=<?= $itemProd['ID'] ?>"><img src="<?= $itemProd['SRC'] ?>" alt=""></a>
                    </td>
                    <td class="td-name">
                        <a href="product-card.php?prodid=<?= $itemProd['ID'] ?>"><?= $itemProd['NAME'] ?></a>
                    </td>
                    <td class="td-count"><?= $item['VALUE'] ?></td>
                    <td id="amount-prod<?= $key ?>" class="td-price"><?= $item['AMOUNT'] ?> руб.</td>
                </tr>
<?php

            }
        }
    }
}
