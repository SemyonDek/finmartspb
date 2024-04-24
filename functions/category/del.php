<?php
require_once('../../config/connect.php');

$catid = $_POST['catid'];

$productsList = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE CATID = '$catid'");
$productsList = mysqli_fetch_assoc($productsList);

if (!isset($productsList)) {
    mysqli_query($ConnectDatabase, "DELETE FROM category WHERE `category`.`ID` = $catid");
} else {
    echo 'В категории есть товары';
}

require_once('../../config/category.php');

?>

<div id="left-category-list" class="bottom-category-list-block">
    <?php
    addLeftCategory($category);
    ?>
</div>

<div id="add-category-list" class="category-add-list">
    <?php
    addListCategory($category);
    ?>
</div>