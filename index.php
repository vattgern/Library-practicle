<?php
session_start();
if(!empty($_SESSION['user'])){
    header("Location: assets/pages/catalog.php");
}
require_once 'assets/pages/php/checkBooks.php';
require 'connect.php';
//if(checkBooks($database)){
//    $;
//}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практика</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>
<body>
<!-- !------------------------------------------------------------------- -->
<!-- * Шапка -->
<header>
    <div class="logo">
        <h1><a href="#">LibPath</a></h1>
    </div>
    <nav>
        <ul>
            <li><a href="#">Главная</a></li>
            <li class="middle"><a href="#">Каталог</a></li>
            <li><a href="assets/pages/logIn.php">Вход</a></li>
        </ul>
    </nav>
</header>
<!-- !------------------------------------------------------------------- -->
<!-- !------------------------------------------------------------------- -->
<!-- * Промо -->
<section class="promotion__area">
    <div class="promotion">
        <h1>Добро пожаловать в электронную библиотеку <p>LibPath</p></h1>
    </div>
</section>
<!-- !------------------------------------------------------------------- -->
<!-- !------------------------------------------------------------------- -->
<!-- * Книги -->
<section class="book__area">
    <div class="books__title">
        <h1>Наши рекомендации</h1>
    </div>
    <div class="book__list">
        <div class="books book__1">
            <div class="book__img">
                <img src="" alt="">
            </div>
            <div class="book__info">
                <h1 class="book__title">Название</h1>
                <p class="genre__book">Жанр</p>
                <sub class="year__book">2077</sub>
                <a href="" class="link__description">Подробнее</a>
            </div>
        </div>
        <div class="books book__1">
            <div class="book__img">
                <img src="" alt="">
            </div>
            <div class="book__info">
                <h1 class="book__title">Название</h1>
                <p class="genre__book">Жанр</p>
                <sub class="year__book">2077</sub>
                <a href="" class="link__description">Подробнее</a>
            </div>
        </div>
        <div class="books book__1">
            <div class="book__img">
                <img src="" alt="">
            </div>
            <div class="book__info">
                <h1 class="book__title">Название</h1>
                <p class="genre__book">Жанр</p>
                <sub class="year__book">2077</sub>
                <a href="" class="link__description">Подробнее</a>
            </div>
        </div>
        <div class="books book__1">
            <div class="book__img">
                <img src="" alt="">
            </div>
            <div class="book__info">
                <h1 class="book__title">Название</h1>
                <p class="genre__book">Жанр</p>
                <sub class="year__book">2077</sub>
                <a href="" class="link__description">Подробнее</a>
            </div>
        </div>
        <div class="books book__1">
            <div class="book__img">
                <img src="" alt="">
            </div>
            <div class="book__info">
                <h1 class="book__title">Название</h1>
                <p class="genre__book">Жанр</p>
                <sub class="year__book">2077</sub>
                <a href="" class="link__description">Подробнее</a>
            </div>
        </div>
        <div class="books book__1">
            <div class="book__img">
                <img src="" alt="">
            </div>
            <div class="book__info">
                <h1 class="book__title">Название</h1>
                <p class="genre__book">Жанр</p>
                <sub class="year__book">2077</sub>
                <a href="" class="link__description">Подробнее</a>
            </div>
        </div>
        <div class="books book__1">
            <div class="book__img">
                <img src="" alt="">
            </div>
            <div class="book__info">
                <h1 class="book__title">Название</h1>
                <p class="genre__book">Жанр</p>
                <sub class="year__book">2077</sub>
                <a href="" class="link__description">Подробнее</a>
            </div>
        </div>
        <div class="books book__1">
            <div class="book__img">
                <img src="" alt="">
            </div>
            <div class="book__info">
                <h1 class="book__title">Название</h1>
                <p class="genre__book">Жанр</p>
                <sub class="year__book">2077</sub>
                <a href="" class="link__description">Подробнее</a>
            </div>
        </div>
    </div>
</section>
<!-- !------------------------------------------------------------------- -->
<!-- !------------------------------------------------------------------- -->
<!-- * Хотите больше ? -->
<section class="add">
    <div class="add__title">
        <h1>
            Хотите больше?<br>
            Тогда зарегистрируйтесь у нас и сможите добавлять себе в профиль книги, которые вам по душе
        </h1>
        <div class="add_button">
            <a href="assets/pages/registration.php">Зарегистрируйтесь</a>
        </div>
    </div>
</section>
<!-- !------------------------------------------------------------------- -->
<!-- !------------------------------------------------------------------- -->
<!-- * Подвал -->
<footer>
    <div class="footer__name">
        <p>Выполнил:</p>
        <a href="#">Лиджиев Александр</a>
    </div>
    <div class="footer__links">
        <ul>
            <li><a href="assets/pages/logIn.php">Войти</a></li>
            <li><a href="assets/pages/registration.php">Зарегистрироваться</a></li>
            <li><a href="#">Тех. поддержка</a></li>
            <li><a href="#">Справка</a></li>
            <li><a href="#">Политика конфиденциальности</a></li>
        </ul>
    </div>
</footer>
<!-- !------------------------------------------------------------------- -->
<script src="assets/js/main.js"></script>
</body>
</html>