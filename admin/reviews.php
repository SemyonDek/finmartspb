<?php
require_once('../config/reviews.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/reviews.css">
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
                <div class="basket-title">Список отзывов</div>

                <div id="reviews-list" class="reviews-main-block">
                    <?php
                    addReviewsListAdm($reviews, $productList);
                    ?>
                </div>

            </div>

        </div>
    </main>

</body>

<script src="../script/review-del.js"></script>

</html>