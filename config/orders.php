<?php

require_once('connect.php');

$orders = mysqli_query($ConnectDatabase, "SELECT * FROM `orders`");
$orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);
$delivery = mysqli_query($ConnectDatabase, "SELECT * FROM `delivery`");
$delivery = mysqli_fetch_all($delivery, MYSQLI_ASSOC);


function addOrdersList($orders, $delivery)
{
    foreach ($orders as $item) {
        $deliveryName = '';
        foreach ($delivery as $itemDelivery) {
            if ($itemDelivery['ID'] == $item['DELIVERYID']) {
                $deliveryName = $itemDelivery['NAME'];
                break;
            }
        }
        if ($deliveryName == '') {
            $deliveryName = $item['DELIVERYNAME'];
        }

?>
        <tr>
            <td class="td-number"><?= $item['ID'] ?></td>
            <td class="td-date"><?= $item['DATE'] ?></td>
            <td class="td-address"><?= $item['ADDRESS'] ?></td>
            <td class="td-delivery"><?= $deliveryName ?></td>
            <td class="td-amount"><?= $item['AMOUNTFULL'] ?> руб.</td>
            <td class="td-info"><a href="order-item.php?orderid=<?= $item['ID'] ?>">Подробнее</a></td>
            <td class="td-status"><?php
                                    if ($item['STATUS'] == '0') echo 'В обработке';
                                    elseif ($item['STATUS'] == '1') echo 'В доставке';
                                    elseif ($item['STATUS'] == '2') echo 'Доставлен';
                                    ?></td>
        </tr>
<?php
    }
}
