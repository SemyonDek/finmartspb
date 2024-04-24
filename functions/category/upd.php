<?php
require_once('../../config/connect.php');

$catid = $_POST['catid'];
$name = $_POST['name'];

mysqli_query($ConnectDatabase, "UPDATE `category` SET `NAME` = '$name'  WHERE `category`.`ID` = $catid");

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