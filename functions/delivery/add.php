<?php
require_once('../../config/connect.php');

$name = $_POST['name'];
$price = $_POST['price'];

mysqli_query($ConnectDatabase, "INSERT INTO `delivery` (`ID`, `NAME`, `PRICE`) VALUES (NULL, '$name', '$price')");

require_once('../../config/delivery.php');

?>

<div id="add-delivery-list" class="category-add-list">
    <?php
    addListDelivery($delivery);
    ?>
</div>