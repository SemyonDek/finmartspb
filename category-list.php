<?php
require_once('config/category.php');
?>

<div class="category-list-block">
    <div class="top-category-list-block">
        <div class="top-category-list-img">
            <img src="img/main/list-svgrepo-com.png" alt="">
        </div>
        <p class="top-category-list-text">Каталог</p>
    </div>
    <div class="bottom-category-list-block">
        <?php
        addLeftCategory($category);
        ?>
    </div>
</div>