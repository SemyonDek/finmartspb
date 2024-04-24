<?php

require_once('connect.php');

$reviews = mysqli_query($ConnectDatabase, "SELECT * FROM `reviews`");
$reviews = mysqli_fetch_all($reviews, MYSQLI_ASSOC);
$productList = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$productList = mysqli_fetch_all($productList, MYSQLI_ASSOC);

function addReviewsListAdm($reviews, $productList)
{
    foreach ($reviews as $item) {
        $prodName = '';
        foreach ($productList as $itemProd) {
            if ($item['PRODID'] == $itemProd['ID']) {
                $prodName = $itemProd['NAME'];
                break;
            }
        }
?>
        <div class="review-item">
            <div class="del-review-line">
                <div class="name-prod"><?= $prodName ?></div>
                <div class="del-review-button" onclick="delreview(<?= $item['ID'] ?>)">Удалить</div>
            </div>
            <div class="name-user"><?= $item['NAME'] ?> - </div>
            <div class="review-item-stars">
                <?php
                for ($i = 0; $i < $item['RATEIT']; $i++) {
                ?>
                    <div class="star-review-item fill-star"></div>
                <?php
                }
                for ($i = 0; $i < 5 - $item['RATEIT']; $i++) {
                ?>
                    <div class="star-review-item clear-star"></div>
                <?php
                }
                ?>
            </div>
            <div class="review-item-text"><?= nl2br($item['TEXT']) ?></div>
        </div>
    <?php
    }
}

function addReviewsListUser($reviews)
{
    foreach ($reviews as $item) {
    ?>
        <div class="review-item">
            <div class="name-user"><?= $item['NAME'] ?> - </div>
            <div class="review-item-stars">
                <?php
                for ($i = 0; $i < $item['RATEIT']; $i++) {
                ?>
                    <div class="star-review-item fill-star"></div>
                <?php
                }
                for ($i = 0; $i < 5 - $item['RATEIT']; $i++) {
                ?>
                    <div class="star-review-item clear-star"></div>
                <?php
                }
                ?>
            </div>
            <div class="review-item-text"><?= nl2br($item['TEXT']) ?></div>
        </div>
<?php
    }
}
