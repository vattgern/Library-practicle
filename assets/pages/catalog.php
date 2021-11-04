<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="stylesheet" href="../css/book.css">
</head>
<body>
    <!-- ! ------------------------------------------------- -->
    <!-- * Шапка -->
    <header>
        <div class="logo">
            <h1><a href="#">LibPath</a></h1>
        </div>
        <div>
            <input type="search" name="search" id="search" placeholder="Что вы ищите ... ">
            <label for="search">
                <img class="search-svg" src="../images/search-svg.svg" alt="">
            </label>
        </div>
        <div class="profile">
            <div class="name"><?= $_SESSION['user']['name'] ?></div>
            <img src="" alt="Типо ава">
            <div class="menu__icon"></div>
        </div>
    </header>
    <!-- ! ------------------------------------------------- -->
    <!-- ! ------------------------------------------------- -->
    <!-- * Меню пользователя   -->
    <div class="drop__menu">
        <ul>
            <li><a href="#">Настройки</a></li>
            <li><a href="php/logout.php">Выход</a></li>
        </ul>
    </div>
    <!-- ! ------------------------------------------------- -->
    <!-- ! ------------------------------------------------- -->
    <div class="book">
        <div class="book__img"></div>
        <div class="book__title">
            <p>            
                Автор: Типо автор или авторы
            </p>
        </div>
        <div class="book__link">
            <a href="#">Подробнее</a>
        </div>
    </div>
    <!-- ! ------------------------------------------------- -->
    <script src="../js/drop_menu-catalog.js"></script>
</body>
</html>