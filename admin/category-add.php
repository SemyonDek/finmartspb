<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/category-add.css">
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

                <div class="basket-title">Список категорий</div>

                <div class="category-add-main-block">
                    <div class="add-category-block">
                        <div class="add-category-title">Добавление категории</div>
                        <input class="input-text" id="nameCat" name="nameCat" type="text" placeholder="Название">
                        <input class="input-button" id="addCat" type="button" value="Добавить">
                    </div>
                    <div class="upd-category-block">
                        <div class="add-category-title">Изменение категории</div>
                        <input id="catid" name="catid" type="hidden" value="">
                        <input class="input-text" id="nameUpdCat" name="nameUpdCat" type="text" placeholder="Название">
                        <input class="input-button" id="updCat" type="button" value="Изменить">
                    </div>

                    <div class="category-add-list-block">
                        <div class="add-category-title">Изменение категории</div>
                        <div id="add-category-list" class="category-add-list">
                            <?php
                            addListCategory($category);
                            ?>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>

</body>

<script src="../script/category-add.js"></script>

</html>