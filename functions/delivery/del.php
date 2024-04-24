<?php
require_once('../../config/connect.php');

$deliveryid = $_POST['deliveryid'];


mysqli_query($ConnectDatabase, "DELETE FROM delivery WHERE `delivery`.`ID` = $deliveryid");

require_once('../../config/delivery.php');

?>

<div id="add-delivery-list" class="category-add-list">
    <?php
    addListDelivery($delivery);
    ?>
</div>