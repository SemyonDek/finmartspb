<?php
require_once('../../config/connect.php');


$idProd = $_POST['idProdPhoto'];

$photoitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$idProd'");
$photoitem = mysqli_fetch_assoc($photoitem);

unlink('../../' . $photoitem['SRC']);

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

mysqli_query($ConnectDatabase, "UPDATE `products` SET `SRC` = '$fileUrlDataBase' WHERE `products`.`ID` = $idProd");


?>

<div id="photo-prod-block" class="photo-block">
    <img src="../<?= $fileUrlDataBase ?>" alt="">
</div>