<?php
require_once('../../config/connect.php');

$name = $_POST['name'];

mysqli_query($ConnectDatabase, "INSERT INTO `category` (`ID`, `NAME`) VALUES (NULL, '$name')");

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