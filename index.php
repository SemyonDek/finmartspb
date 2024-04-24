<?php
require_once('config/products-new.php');
$countSlider = mysqli_query($ConnectDatabase, "SELECT * FROM `products_new`");
$countSlider = mysqli_fetch_all($countSlider, MYSQLI_ASSOC);
if (isset($countSlider)) {
    $countSlider = count($countSlider);

    if ($countSlider > 4) {
        $countSlider = $countSlider - 3;
    } else {
        $countSlider = 1;
    }
} else {
    $countSlider = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ФИНМАРТ | Товары из Финляндии</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <?php
    require_once('header.php');
    ?>

    <main>
        <div class="container">
            <?php
            require_once('category-list.php');
            ?>

            <div class="main-block">
                <h3 class="title-name-block">Новинки</h3>

                <div class="new-slider-block">
                    <div class="hidden-slider-block">
                        <div id="slider" class="swipe-slider-block">
                            <?php
                            addProdSliderUser($products, $newList);
                            ?>
                        </div>
                    </div>

                    <div class="button-slider-block">
                        <input id="count-page-slider" type="hidden" value="<?= $countSlider ?>">
                        <div id="left-slider-button" class="button-slider"><img src="img/main/left-2-svgrepo-com.png" alt=""></div>
                        <div id="right-slider-button" class="button-slider"><img src="img/main/right-2-svgrepo-com.png" alt=""></div>
                    </div>
                </div>

                <div class="index-text-block">
                    <div class="index-title">Финские товары и товары из Финляндии</div>
                    <p class="index-text">
                        Добро пожаловать в интернет-магазин товаров из Финляндии - Финмарт!
                        <br>
                        <br>
                        Рады предложить Вам большой ассортимент товаров на любой вкус по самым привлекательным ценам.
                        <br>
                        Наиболее популярными Финскими товарами являются Витамины и Бады.
                        <br>
                        Витамин Д от бренда Девисол самый популярный продукт для младенцев которым просто необходим Витамин D3 в условиях северного климата и малого количества солнечных дней, это первый и самый важный витамин для развития детского организма. Так же представлены и продукты других Финских брендов это Мультитабс, Moller, Sana-sol, Optisana, Macrobios, Multivita.
                        <br>
                        Пищевые добавки для здоровья суставов производства Финляндии, являются топовыми продуктами, самым популярным по праву можно назвать продукт финской компании Vitabalans под названием Артро Баланс плюс - это аптечный препарат и его нельзя купить в обычных гипермаркетах Финляндии что подтверждает его качество и эффективность.
                        <br>
                        Бытовая химия производства Финляндии, а так же Евросоюза, зарекомендовала себя с отличной стороны, товары брендов Fairy, Finish, Astonish, Sun являются лидерами в своих сегментах рынка и представлены в нашем магазине. Так же особое внимание заслуживает гипоаллергенная продукция Финских компаний LV и MiniRisk, предназначенная для людей с особо чувствительной кожей и обонянием.
                        <br>
                        Средства гигиены брендов Elmex, Family fresh, Erritan Hieno, Tresseme, Dentalux – всегда предоставляют абсолютное качество и богатый выбор на все вкусы.
                        <br>
                        И конечно же Финляндия это страна кофеманов, Nescafe kulta, Gevalia, Paulig, Kulta katriina, Lofbergs стали синонимами вкусного кофе. В нашем магазине представлены и Итальянские бренда такие как Lavazza, Illy, Segafredo и другие.
                        <br>
                        В нашем магазине представлено более 3000 наименований товаров производства Финляндии, а так же других Европейских стран.
                        <br>
                        <br>
                        КАК МЫ РАБОТАЕМ?
                        <br>
                        <br>
                        Вы оформляете заказ, мы звоним Вам уточняем день и время доставки.
                        <br>
                        В день доставки курьер звонит Вам и согласовывает время доставки.
                        <br>
                        <br>
                        ПРЕИМУЩЕСТВА?
                        <br>
                        <br>
                        Цены - наши цены ниже большинства магазинов СПб, это не сложно проверить.
                        <br>
                        Ассортимент - ассортимент товаров постоянно растет, но несмотря на это, мы готовы выполнить заказ на позиции, которых нет в каталоге.
                        <br>
                        Доставка - стоимость доставки курьером по Санкт-Петербургу до адреса - 200 рублей, при сумме заказа более 2500 рублей доставка курьером по Санкт-Петербургу до адреса бесплатно.
                        <br>
                        Для постоянных клиентов в нашем магазине предусмотренна накопительная система скидок.
                        <br>
                        <br>
                        Хороших покупок и удачного дня!!!
                        <br>
                        <br>
                        P.S. - ассортимент товаров постоянно увеличивается. Если Вы не нашли интересующие товары у нас в каталоге, напишите нам. Мы найдем нужный товар в Финляндии по самой оптимальной цене и доставим его Вам в короткие сроки.
                    </p>
                </div>

            </div>

        </div>
    </main>
    <?php
    require_once('footer.php');
    ?>

</body>

<script src="script/slider.js"></script>
<script src="script/basket-add.js"></script>

</html>