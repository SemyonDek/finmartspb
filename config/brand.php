<?php
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);

$brand = [];
$prov = true;

foreach ($TableProdAll as $item) {
    foreach ($brand as $item_brand) {
        if ($item['BRAND'] == $item_brand) {
            $prov = false;
            break;
        }
    }
    if ($prov) {
        $brand[] = $item['BRAND'];
    }
    $prov = true;
}

function addFilterBrand($brand, $brandGet = '')
{
?>
    <?php
    foreach ($brand as $item) {

    ?>
        <option value="<?= $item ?>" <?php if ($brandGet == $item) echo 'selected' ?>><?= $item ?></option>
<?php

    }
}
