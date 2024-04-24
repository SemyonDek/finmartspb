<?php
require_once('../../config/connect.php');

$deliveryid = $_POST['deliveryid'];
$name = $_POST['name'];
$price = $_POST['price'];

mysqli_query($ConnectDatabase, "UPDATE `delivery` SET `NAME` = '$name', `PRICE` = '$price'  WHERE `delivery`.`ID` = $deliveryid");

require_once('../../config/delivery.php');

?>

<div id="add-delivery-list" class="category-add-list">
    <?php
    addListDelivery($delivery);
    ?>
</div>