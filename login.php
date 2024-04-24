<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ФИНМАРТ | Товары из Финляндии</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <?php
    $loginPage = true;
    require_once('header.php');
    ?>

    <main>
        <div class="container">
            <?php
            require_once('category-list.php');
            ?>

            <div class="main-block">

                <div class="basket-title">Авторизация</div>

                <div class="login-main-block">
                    <form id="loginForm" action="">
                        <input id="login" name="login" placeholder="Логин" class="account-input" type="text">
                        <input id="password" name="password" placeholder="Пароль" class="account-input" type="password">
                        <button id="account-button" class="account-button" type="button">Войти</button>
                    </form>
                </div>

            </div>

        </div>
    </main>
    <?php
    require_once('footer.php');
    ?>

</body>

<script src="script/login.js"></script>

</html>