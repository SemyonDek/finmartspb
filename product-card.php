<?php
require_once('config/reviews.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ФИНМАРТ | Товары из Финляндии</title>
    <link rel="stylesheet" href="css/product-card.css">
</head>

<body>

    <?php
    require_once('header.php');
    ?>

    <main>
        <div class="container">
            <?php
            require_once('category-list.php');
            $prodid = $_GET['prodid'];
            $productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
            $productitem = mysqli_fetch_assoc($productitem);
            $catid = $productitem['CATID'];
            $categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
            $categoryitem = mysqli_fetch_assoc($categoryitem);
            $reviewsList = mysqli_query($ConnectDatabase, "SELECT * FROM `reviews` WHERE PRODID = '$prodid'");
            $reviewsList = mysqli_fetch_all($reviewsList, MYSQLI_ASSOC);
            if (isset($reviewsList)) {
                $countReview = count($reviewsList);
                $finalRateit = 0;
                if ($countReview !== 0) {
                    foreach ($reviewsList as $item) {
                        $finalRateit += $item['RATEIT'];
                    }
                    $finalRateit = $finalRateit  / $countReview;
                    $finalRateit = round($finalRateit);
                }
            } else {
                $countReview = 0;
                $finalRateit = 0;
            }
            ?>

            <div class="main-block">

                <div class="breadcrumbs-block">
                    <a href="catalog.php?catid=0">
                        <div class="breadcrumbs-item">
                            Каталог
                        </div>
                        <div class="breadcrumbs-arrow"></div>
                    </a>
                    <a href="catalog.php?catid=<?= $catid ?>">
                        <div class="breadcrumbs-item"><?= $categoryitem['NAME'] ?></div>
                        <div class="breadcrumbs-arrow"></div>
                    </a>
                    <a href="product-card.php?prodid=1">
                        <div class="breadcrumbs-item last-crumb"><?= $productitem['NAME'] ?></div>
                    </a>
                </div>

                <div class="main-product-card-block">

                    <div class="product-photo-block">
                        <div class="main-photo-block">
                            <img src="<?= $productitem['SRC'] ?>" alt="">
                        </div>
                    </div>

                    <div class="product-main-info-block">
                        <div class="product-name"><?= $productitem['NAME'] ?></div>

                        <div class="product-main-char-block">
                            <div class="line-main-char">
                                <div class="name-main-char">Артикул:</div>
                                <div class="value-main-char"><?= $productitem['CODE'] ?></div>
                            </div>
                            <div class="line-main-char">
                                <div class="name-main-char">Вес:</div>
                                <div class="value-main-char"><?= $productitem['WEIGHT'] ?> кг.</div>
                            </div>
                            <div id="main-star-review" class="line-main-char">
                                <?php
                                for ($i = 0; $i < $finalRateit; $i++) {
                                ?>
                                    <div class="star-review-item fill-star"></div>
                                <?php
                                }
                                for ($i = 0; $i < 5 - $finalRateit; $i++) {
                                ?>
                                    <div class="star-review-item clear-star"></div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="product-price-block">
                            <div class="name-price">Цена:</div>
                            <div class="value-price"><?= $productitem['PRICE'] ?> руб.</div>
                        </div>

                        <div class="product-buy-block">
                            <form id="buyProdForm" action="">
                                <input type="hidden" name="prodid" id="prodid" value="<?= $productitem['ID'] ?>">
                                <div class="value-prod-block">
                                    <input id="value-input" class="value-prod-input" type="number" name="valueprod" id="valueprod" value="1" disabled>
                                    <div class="value-button-block">
                                        <button id="minus-value" class="value-button-input" type="button"></button>
                                        <button id="plus-value" class="value-button-input" type="button"></button>
                                    </div>
                                </div>
                                <button class="buy-button" type="button" onclick="addBasket()">
                                    <img src="img/main/basket-add-icon.png" alt="">
                                    Купить
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="product-info-block">

                        <div class="tabs-list-block">
                            <div id="desc-tub" class="tab-item tab-item-active">Описание</div>
                            <div id="char-tub" class="tab-item">Характеристики</div>
                            <div id="review-tub" class="tab-item">Отзывы (<?= $countReview ?>)</div>
                        </div>

                        <div class="product-info-main-block">
                            <div id="desc-block" class="product-info-item info-block-active">
                                <p><?= nl2br($productitem['TEXT']) ?></p>
                            </div>

                            <div id="char-block" class="product-info-item">
                                <div class="line-char">
                                    <div class="name-char">Артикул:</div>
                                    <div class="text-char"><?= $productitem['CODE'] ?></div>
                                </div>
                                <div class="line-char">
                                    <div class="name-char">Бренд:</div>
                                    <div class="text-char"><?= $productitem['BRAND'] ?></div>
                                </div>
                                <div class="line-char">
                                    <div class="name-char">Вес:</div>
                                    <div class="text-char"><?= $productitem['WEIGHT'] ?> кг.</div>
                                </div>
                            </div>

                            <div id="review-block" class="product-info-item">
                                <?php
                                if (!isset($_SESSION['accountName'])) {
                                ?>
                                    <div class="clear-review-block">
                                        Пожалуйста, авторизуйтесь на сайте, чтобы оценить товар и оставить ваш отзыв.
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="add-review-block">
                                        <form id="addReviewForm" action="">
                                            <textarea class="review-textarea" name="commtext" id="commtext" placeholder="Оставьте ваш отзыв"></textarea>
                                            <input type="hidden" id="rateit" name="rateit" value="">
                                            <div class="line-review-star">
                                                <div class="rateit-name">Оцените товар: </div>
                                                <div class="star-block">
                                                    <div id="rateit-star-1" class="star-rateit-item clear-star-rateit"></div>
                                                    <div id="rateit-star-2" class="star-rateit-item clear-star-rateit"></div>
                                                    <div id="rateit-star-3" class="star-rateit-item clear-star-rateit"></div>
                                                    <div id="rateit-star-4" class="star-rateit-item clear-star-rateit"></div>
                                                    <div id="rateit-star-5" class="star-rateit-item clear-star-rateit"></div>
                                                </div>
                                            </div>
                                            <button onclick="addReview()" class="add-review-button" type="button">Оставить отзыв</button>
                                        </form>
                                    </div>
                                <?php
                                }
                                ?>
                                <div id="reviews-list" class="reviews-list-block">
                                    <?php
                                    addReviewsListUser($reviewsList);
                                    ?>
                                </div>

                            </div>
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

<script src="script/product-card.js"></script>

</html>