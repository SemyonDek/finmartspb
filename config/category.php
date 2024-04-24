<?php

require_once('connect.php');

$category = mysqli_query($ConnectDatabase, "SELECT * FROM `category`");
$category = mysqli_fetch_all($category, MYSQLI_ASSOC);


function addLeftCategory($category)
{
    foreach ($category as $item) {
?>
        <div class="category-list-item">
            <a href="catalog.php?catid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
        </div>
    <?php
    }
}
function addListCategory($category)
{
    foreach ($category as $item) {
    ?>
        <div class="category-add-lis-item"><?= $item['NAME'] ?> <br> <span class="del-cat" onclick="delcat(<?= $item['ID'] ?>)">Удалить</span> <span class="upd-cat" onclick="updcat(<?= $item['ID'] ?>, '<?= $item['NAME'] ?>')">Изменить</span> </div>
    <?php
    }
}

function addSelect($category, $checked = 0)
{
    foreach ($category as $item) {
    ?>
        <option <?php if ($checked == $item['ID']) echo 'selected' ?> value="<?= $item['ID'] ?>"><?= $item['NAME'] ?></option>
<?php
    }
}
