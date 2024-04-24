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
            ?>

            <div class="main-block">

                <div class="basket-title">Добавление товара</div>

                <div class="product-add-main-block">

                    <form id="addProdForm" action="">
                        <div class="input-line">
                            <div class="name-input">Название: </div>
                            <input type="text" class="input-text" id="nameProd" name="nameProd">
                        </div>
                        <div class="input-line">
                            <div class="name-input">Категория: </div>
                            <select class="input-text" name="catid" id="catid">
                                <option value=""></option>
                                <?php
                                addSelect($category);
                                ?>
                            </select>
                        </div>
                        <div class="input-line">
                            <div class="name-input">Цена: </div>
                            <input type="number" class="input-text" id="priceProd" name="priceProd">
                        </div>
                        <div class="input-line">
                            <div class="name-input">Артикул: </div>
                            <input type="text" class="input-text" id="codeProd" name="codeProd">
                        </div>
                        <div class="input-line">
                            <div class="name-input">Вес: </div>
                            <input type="text" class="input-text" id="weightProd" name="weightProd">
                        </div>
                        <div class="input-line">
                            <div class="name-input">Бренд: </div>
                            <input type="text" class="input-text" id="brandProd" name="brandProd">
                        </div>
                        <div class="input-line">
                            <div class="name-input">Изображение: </div>
                            <input type="file" class="input-file" id="imgProd" name="imgProd">
                        </div>
                        <div class="input-line">
                            <div class="name-input">Описание: </div>
                            <textarea class="input-textarea" name="descProd" id="descProd"></textarea>
                        </div>
                        <div class="input-line">
                            <input class="input-button" id="addProd" type="button" value="Добавить">
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

<script src="../script/product-add.js"></script>

</html>