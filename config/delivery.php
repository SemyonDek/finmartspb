<?php
require_once('connect.php');

$delivery = mysqli_query($ConnectDatabase, "SELECT * FROM `delivery`");
$delivery = mysqli_fetch_all($delivery, MYSQLI_ASSOC);

function addListDelivery($delivery)
{
    foreach ($delivery as $item) {
?>
        <div class="category-add-lis-item"><?= $item['NAME'] ?> - <span class="price-delivery"><?= $item['PRICE'] ?> Руб</span> <br> <span class="del-cat" onclick="delDelivery(<?= $item['ID'] ?>)">Удалить</span> <span class="upd-cat" onclick="updDelivery(<?= $item['ID'] ?>, '<?= $item['NAME'] ?>', <?= $item['PRICE'] ?>)">Изменить</span> </div>
    <?php
    }
}
function addListDeliveryOrder($delivery)
{
    foreach ($delivery as $item) {
    ?>
        <label onclick="updPrice(<?= $item['ID'] ?>)">
            <input class="radio-delivery" type="radio" name="ratio-delivery" value="<?= $item['ID'] ?>">
            <div class="name-delivery"><?= $item['NAME'] ?> -</div>
            <div class="price-delivery"><?= $item['PRICE'] ?> руб.</div>
        </label>
<?php
    }
}
