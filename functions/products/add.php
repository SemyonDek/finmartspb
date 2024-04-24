<?php
require_once('../../config/connect.php');

$name = $_POST['nameProd'];
$catid = $_POST['catid'];
$price = $_POST['priceProd'];
$code = $_POST['codeProd'];
$weight = $_POST['weightProd'];
$brand = $_POST['brandProd'];
$desc = $_POST['descProd'];

$typeFIle = substr($_FILES['imgProd']['name'], strrpos($_FILES['imgProd']['name'], '.') + 1);

$prov = True;
while ($prov) {
    $fileName = uniqid() . '.' . $typeFIle;
    $fileUrl = '../../img/product/' . $fileName;
    $fileUrlDataBase = 'img/product/' . $fileName;

    if (!file_exists($fileUrl)) {
        move_uploaded_file($_FILES['imgProd']['tmp_name'], $fileUrl);
        $prov = False;
    }
}

mysqli_query($ConnectDatabase, "INSERT INTO `products` 
(`ID`, `CATID`, `NAME`, `PRICE`, `CODE`, `WEIGHT`, `BRAND`, `TEXT`, `SRC`) VALUES 
(NULL, '$catid', '$name', '$price', '$code', '$weight', '$brand', '$desc',  '$fileUrlDataBase')");

$idProd = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `products`");
$idProd = mysqli_fetch_all($idProd);
$idProd = $idProd[0][0];

echo $idProd;
