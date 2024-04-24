<?php
require_once('config/product.php');
$catid = $_GET['catid'];
$catName = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = $catid");
$catName = mysqli_fetch_assoc($catName);
if (isset($catName)) $catName = $catName['NAME'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ФИНМАРТ | Товары из Финляндии</title>
    <link rel="stylesheet" href="css/catalog.css">
</head>

<body>

    <?php
    require_once('header.php');
    ?>

    <main>
        <div class="container">
            <div class="left-block">
                <?php
                require_once('category-list.php');
                ?>

                <div class="filter-block">
                    <form action="" method="get">
                        <input type="hidden" name="catid" id="catid" value="<?= $_GET['catid'] ?>">
                        <input type="hidden" name="viewing" id="viewing" value="<?php if (isset($_GET['viewing'])) echo $_GET['viewing'];
                                                                                else echo 'block' ?>">
                        <div class="filter-title">Сортировать по:</div>
                        <div class="filter-line">
                            <select class="filter-select" name="sort" id="sort">
                                <?php
                                if (isset($_GET['sort'])) {
                                    if ($_GET['sort'] == 'DESC') {
                                ?>
                                        <option value="ASC">Сначала старые</option>
                                        <option value="DESC" selected>Сначала новые</option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="ASC" selected>Сначала старые</option>
                                        <option value="DESC">Сначала новые</option>

                                    <?php
                                    }
                                } else {
                                    ?>
                                    <option value="ASC">Сначала старые</option>
                                    <option value="DESC">Сначала новые</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="filter-title">Фильтр по цене (руб.)</div>
                        <div class="filter-line">
                            <p class="filter-text">От</p>
                            <input class="filter-price" type="number" name="min_price" value="<?php if (isset($_GET['min_price'])) echo $_GET['min_price'] ?>">
                            <p class="filter-text">до</p>
                            <input class="filter-price" type="number" name="max_price" value="<?php if (isset($_GET['max_price'])) echo $_GET['max_price'] ?>">
                        </div>
                        <div class="filter-title">Фильтр по брендам</div>
                        <div class="filter-line">
                            <select class="filter-select" name="brand" id="brand">
                                <option value=""></option>
                                <?php
                                if (isset($_GET['brand'])) {
                                    addFilterBrand($brand, $_GET['brand']);
                                } else {
                                    addFilterBrand($brand);
                                }
                                ?>
                            </select>
                        </div>
                        <div class="filter-line">
                            <input class="filter-button" type="submit" value="Фильтровать">
                            <a class="filter-link" href="catalog.php?catid=0">Cбросить</a>
                        </div>
                    </form>
                </div>
            </div>


            <div class="main-block">
                <div class="breadcrumbs-block">
                    <a href="catalog.php?catid=0">
                        <div class="breadcrumbs-item">
                            Каталог
                        </div>
                        <div class="breadcrumbs-arrow"></div>
                    </a>
                    <?php
                    if ($catid !== '0') {
                    ?>
                        <a href="catalog.php?catid=<?= $catid ?>">
                            <div class="breadcrumbs-item last-crumb"><?= $catName ?></div>
                        </a>
                    <?php
                    }
                    ?>
                </div>

                <h1 class="title-catalog"><?php if (isset($catName)) echo $catName;
                                            else echo 'Каталог'; ?></h1>

                <div class="viewing-block">
                    <?php
                    if (isset($_GET['viewing'])) {
                        if ($_GET['viewing'] == 'block') {
                    ?>
                            <div id="view-block-button" class="viewing-item view-block view-item-active"></div>
                            <div id="view-list-button" class="viewing-item view-list"></div>
                        <?php
                        } else {
                        ?>
                            <div id="view-block-button" class="viewing-item view-block"></div>
                            <div id="view-list-button" class="viewing-item view-list view-item-active"></div>
                        <?php
                        }
                    } else {
                        ?>
                        <div id="view-block-button" class="viewing-item view-block view-item-active"></div>
                        <div id="view-list-button" class="viewing-item view-list"></div>
                    <?php
                    }
                    ?>
                </div>

                <div id="catalog-block" class="main-catalog-block <?php
                                                                    if (isset($_GET['viewing'])) if ($_GET['viewing'] == 'list') echo 'catalog-list-block';
                                                                    ?>">

                    <?php
                    addProdListUser($products);
                    ?>

                    <!-- <div class="product-item">
                        <div class="product-item-block">

                            <div class="product-item-img-block">
                                <a href="product-card.php"><img src="img/product/70_Moller_kalanmaksaoljy_500ml_2020-08-26_15-04-46.jpg" alt=""></a>
                            </div>

                            <div class="product-item-name-block">
                                <a href="product-card.php">BODYFLEX Glucosamin Vahva 800 mg (Бодифлекс глюкозамин усиленный) , 140 шт.</a>
                            </div>

                            <div class="product-item-buy-block">
                                <div class="product-item-price-block">1890 руб.</div>
                                <div class="product-item-buy-bottom"><img src="img/main/basket-add-icon.png" alt=""></div>
                            </div>

                        </div>
                    </div> -->

                </div>

            </div>

        </div>
    </main>
    <?php
    require_once('footer.php');
    ?>

</body>

<script src="script/catalog-visible.js"></script>
<script src="script/basket-add.js"></script>

</html>