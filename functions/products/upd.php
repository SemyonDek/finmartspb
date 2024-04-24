<?php
require_once('../../config/connect.php');


$idProd = $_POST['idProd'];
$name = $_POST['nameProd'];
$catid = $_POST['catid'];
$price = $_POST['priceProd'];
$code = $_POST['codeProd'];
$weight = $_POST['weightProd'];
$brand = $_POST['brandProd'];
$desc = $_POST['descProd'];


mysqli_query($ConnectDatabase, "UPDATE `products` SET 
`NAME` = '$name', `CATID` = '$catid', `PRICE` = '$price', 
`CODE` = '$code', `WEIGHT` = '$weight', `BRAND` = '$brand', 
`TEXT` = '$desc' WHERE `products`.`ID` = $idProd");


$newlist = $_POST['newProd'];

$newListItem = mysqli_query($ConnectDatabase, "SELECT * FROM `products_new` WHERE PRODID = '$idProd'");
$newListItem = mysqli_fetch_assoc($newListItem);

if ($newlist == 1) {
    if (!isset($newListItem))
        mysqli_query($ConnectDatabase, "INSERT INTO `products_new` (`ID`, `PRODID`) VALUES (NULL, '$idProd')");
} else {
    mysqli_query($ConnectDatabase, "DELETE FROM `products_new` WHERE `products_new`.`PRODID` = $idProd");
}
