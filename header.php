<?php
session_start();
if (isset($basketPage) && (!isset($_SESSION['basket']) || $_SESSION['basket'] == [])) {
    header('Location: index.php');
}
if (isset($orderPage) && (!isset($_SESSION['basket']) || $_SESSION['basket'] == [])) {
    header('Location: index.php');
}
if (isset($loginPage) && isset($_SESSION['accountName'])) {
    header('Location: account.php');
}
if (isset($accountPage) && (!isset($_SESSION['accountName']) || $_SESSION['accountName'] !== 'user')) {
    header('Location: login.php');
}
if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'admin') {
    header('Location: admin');
}
?>

<link rel="stylesheet" href="css/header.css">

<header>
    <div class="header-top-block">
        <div class="container">
            <div class="header-top-block-left">
                <div class="header-top-info-block">
                    <div class="icon icon-gps">
                        <img src="img/main/geo-alt-fill-svgrepo-com.png" alt="">
                    </div>
                    <p class="header-top-info-text">г. Санкт-Петербург</p>
                </div>
                <div class="header-top-info-block">
                    <div class="icon icon-clock">
                        <img src="img/main/clock-seven-svgrepo-com.png" alt="">
                    </div>
                    <p class="header-top-info-text">Пн-Пт: 11.00 - 17.00 (консультации по телефону)</p>
                </div>
            </div>
            <div class="header-top-block-right">
                <a href="login.php" class="header-top-link-block">
                    <p class="header-top-link-text">Кабинет</p>
                    <div class="icon icon-user">
                        <img src="img/main/user-alt-1-svgrepo-com.png" alt="">
                    </div>
                </a>
                <a href="basket.php" class="header-top-link-block">
                    <p class="header-top-link-text">Корзина</p>
                    <div class="icon icon-basket">
                        <img src="img/main/basket-alt-3-svgrepo-com.png" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="header-middle-block">
        <div class="container">
            <div class="header-logo-block-link">
                <a href="index.php">
                    <div class="header-logo-block">
                        <img src="img/main/Logo_new.jpg" alt="">
                    </div>
                </a>
            </div>
            <div class="header-menu-middle-menu">
                <nav class="menu-list">
                    <div class="menu-list-item"><a href="index.php">Главная</a></div>
                    <div class="menu-list-item"><a href="catalog.php?catid=0">Каталог</a></div>
                    <div class="menu-list-item"><a href="basket.php">Корзина</a></div>
                </nav>
            </div>
        </div>
    </div>
    <div class="header-bottom-block">
        <div class="container">
            <div class="search-header-block">
                <form action="search.php" method="get">
                    <input class="input-search" name="search" type="text" placeholder="Поиск по товарам...">
                    <button class="search-button" type="submit">
                        <img src="img/main/search-svgrepo-com.png" alt="">
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>