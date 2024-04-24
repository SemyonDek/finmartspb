<?php
require_once('config/product.php');
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
            <?php
            require_once('category-list.php');
            ?>
            <input type="hidden" name="viewing" id="viewing" value="block">
            <div class="main-block">
                <div class="breadcrumbs-block">
                    <a href="catalog.php?catid=0">
                        <div class="breadcrumbs-item">
                            Каталог
                        </div>
                        <div class="breadcrumbs-arrow"></div>
                    </a>
                </div>

                <h1 class="title-search">Поиск по фразе: <strong>«<?= $_GET['search'] ?>»</strong></h1>

                <div class="viewing-block">
                    <div id="view-block-button" class="viewing-item view-block view-item-active"></div>
                    <div id="view-list-button" class="viewing-item view-list"></div>
                </div>

                <div id="catalog-block" class="main-catalog-block">
                    <?php
                    addProdListUser($products);
                    ?>
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