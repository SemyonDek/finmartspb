<?php

require_once('../../config/connect.php');

$prodid = $_POST['prodid'];

$productPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productPhoto = mysqli_fetch_all($productPhoto, MYSQLI_ASSOC);

foreach ($productPhoto as $item) {
    unlink('../../' . $item['SRC']);
}

mysqli_query($ConnectDatabase, "DELETE FROM `products_new` WHERE `products_new`.`PRODID` = $prodid");

mysqli_query($ConnectDatabase, "DELETE FROM `products` WHERE `products`.`ID` = $prodid");

mysqli_query($ConnectDatabase, "DELETE FROM `reviews` WHERE `reviews`.`PRODID` = $prodid");
