<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/product-add.css">
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
            $newList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_new` WHERE PRODID = '$prodid'");
            $newList = mysqli_fetch_assoc($newList);
            ?>

            <div class="main-block">

                <div class="basket-title">Изменение товара</div>

                <div class="product-add-main-block">

                    <form id="updPhotoForm">
                        <input type="hidden" id="idProdPhoto" name="idProdPhoto" value="<?= $prodid ?>">
                        <div class="input-line">
                            <div id="photo-prod-block" class="photo-block">
                                <img src="../<?= $productitem['SRC'] ?>" alt="">
                            </div>
                        </div>
                        <div class="input-line">
                            <div class="name-input">Изображение: </div>
                            <input type="file" class="input-file" id="imgProd" name="imgProd">
                        </div>
                        <div class="input-line">
                            <input class="input-button" id="updPhoto" type="button" value="Изменить">
                        </div>
                    </form>

                    <form id="updProdForm" action="">
                        <input type="hidden" id="idProd" name="idProd" value="<?= $prodid ?>">
                        <div class="input-line">
                            <div class="name-input">Название: </div>
                            <input type="text" class="input-text" id="nameProd" name="nameProd" value="<?= $productitem['NAME'] ?>">
                        </div>
                        <div class="input-line">
                            <div class="name-input">Категория: </div>
                            <select class="input-text" name="catid" id="catid">
                                <option value=""></option>
                                <?php
                                addSelect($category, $productitem['CATID']);
                                ?>
                            </select>
                        </div>
                        <div class="input-line">
                            <div class="name-input">Цена: </div>
                            <input type="number" class="input-text" id="priceProd" name="priceProd" value="<?= $productitem['PRICE'] ?>">
                        </div>
                        <div class="input-line">
                            <div class="name-input">Артикул: </div>
                            <input type="text" class="input-text" id="codeProd" name="codeProd" value="<?= $productitem['CODE'] ?>">
                        </div>
                        <div class="input-line">
                            <div class="name-input">Вес: </div>
                            <input type="text" class="input-text" id="weightProd" name="weightProd" value="<?= $productitem['WEIGHT'] ?>">
                        </div>
                        <div class="input-line">
                            <div class="name-input">Бренд: </div>
                            <input type="text" class="input-text" id="brandProd" name="brandProd" value="<?= $productitem['BRAND'] ?>">
                        </div>
                        <div class="input-line">
                            <div class="name-input">Описание: </div>
                            <textarea class="input-textarea" name="descProd" id="descProd"><?= $productitem['TEXT'] ?></textarea>
                        </div>
                        <div class="input-line">
                            <div class="name-input">Новинки: </div>
                            <select class="input-text" name="newProd" id="newProd">
                                <option value="0">Нет</option>
                                <option value="1" <?php if (isset($newList)) echo 'selected' ?>>Да</option>
                            </select>
                        </div>
                        <div class="input-line">
                            <input class="input-button" id="updProd" type="button" value="Изменить">
                        </div>
                        <div class="input-line">
                            <input class="input-button" onclick="delProd(<?= $productitem['ID'] ?>)" type="button" value="Удалить">
                        </div>
                        <div class="input-line">
                            <a href="catalog.php?catid=0" class="input-button">Назад</a>
                        </div>
                    </form>


                </div>

            </div>

        </div>
    </main>

</body>

<script src="../script/product-upd.js"></script>

</html>