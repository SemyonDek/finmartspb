<?php
session_start();
if (!isset($_SESSION['accountName']) || $_SESSION['accountName'] !== 'admin') {
    header('Location: ../');
}
?>
<link rel="stylesheet" href="../css/header.css">

<header>
    <div class="header-middle-block">
        <div class="container">
            <div class="header-logo-block-link">
                <a href="index.php">
                    <div class="header-logo-block">
                        <img src="../img/main/Logo_new.jpg" alt="">
                    </div>
                </a>
            </div>
            <div class="header-menu-middle-menu">
                <nav class="menu-list">
                    <div class="menu-list-item"><a href="index.php">Главная</a></div>
                    <div class="menu-list-item"><a href="orders.php">Заказы</a></div>
                    <div class="menu-list-item"><a href="reviews.php">Отзывы</a></div>
                    <div class="menu-list-item"><a href="catalog.php?catid=0">Список товаров</a></div>
                    <div class="menu-list-item"><a href="category-add.php">Категории</a></div>
                    <div class="menu-list-item"><a href="../functions/account/logout.php">Выход</a></div>
                </nav>
            </div>
        </div>
    </div>
    <div class="header-bottom-block">
        <div class="container">
            <div class="search-header-block">
                <form action="search.php" method="get">
                    <input name="search" class="input-search" type="text" placeholder="Поиск по товарам...">
                    <button class="search-button" type="submit">
                        <img src="../img/main/search-svgrepo-com.png" alt="">
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>