<?php
require_once('../config/products-new.php');
$countSlider = mysqli_query($ConnectDatabase, "SELECT * FROM `products_new`");
$countSlider = mysqli_fetch_all($countSlider, MYSQLI_ASSOC);
if (isset($countSlider)) {
    $countSlider = count($countSlider);

    if ($countSlider > 4) {
        $countSlider = $countSlider - 3;
    } else {
        $countSlider = 1;
    }
} else {
    $countSlider = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/index.css">
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

                <h3 class="title-name-block">Новинки</h3>

                <div class="new-slider-block">
                    <div class="hidden-slider-block">
                        <div id="slider" class="swipe-slider-block">

                            <?php
                            addProdSliderAdm($products, $newList);
                            ?>
                        </div>
                    </div>

                    <div class="button-slider-block">
                        <input id="count-page-slider" type="hidden" value="<?= $countSlider ?>">
                        <div id="left-slider-button" class="button-slider"><img src="../img/main/left-2-svgrepo-com.png" alt=""></div>
                        <div id="right-slider-button" class="button-slider"><img src="../img/main/right-2-svgrepo-com.png" alt=""></div>
                    </div>
                </div>

            </div>

        </div>
    </main>

</body>

<script src="../script/slider.js"></script>

</html>