<?php
session_start();
require_once 'assets/pages/php/checkBooks.php';
if(is_array(checkBooks($database))){
    $_SESSION['books'] = checkBooks($database);
}
?>
<!--TODO:
        1- Доделать карточку товара
        2- Создать админа и пользователя
        3- Почистить код
        4- Поиск книг
        5- По желанию сделать защиту запросов
-->
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
    <?php
    if(!empty($_SESSION['user'])){
        echo '<link rel="stylesheet" href="assets/css/header.css">';
    }
    ?>
</head>
<body>
<!-- !------------------------------------------------------------------- -->
<!-- * Шапка -->
<?php
    $header_without_user = '<header>
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
                        </header>';
    if(empty($_SESSION['user'])){
        echo $header_without_user;
    } else{
        $head_user_name = "<?= {$_SESSION['user']['name']} ?>";
        $head_user_avatar = "{$_SESSION['user']['avatar']}";
        $header_with_user = '<header>
                            <div class="logo">
                                <h1><a href="#">LibPath</a></h1>
                            </div>
                            <div>
                                <input type="search" name="search" id="search" placeholder="Что вы ищите ... ">
                                <label for="search">
                                    <img class="search-svg" src="assets/images/search-svg.svg" alt="">
                                </label>
                            </div>
                            <div class="profile">
                                <div class="name">' . $head_user_name . '</div>
                                <a href="assets/pages/catalog.php"><img src="' . $head_user_avatar . '" alt=""></a>
                                <div class="menu__icon"></div>
                            </div>
                        </header>';
        echo $header_with_user;
    }
?>
<!-- !------------------------------------------------------------------- -->
<?php
if(!empty($_SESSION['user'])){
    echo '    <div class="drop__menu">
        <ul>
            <li><a href="assets/pages/profile.php">Настройки</a></li>
            <li><a href="assets/pages/php/logout.php">Выход</a></li>
        </ul>
    </div>';
}
?>
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
        <?php

            for ($index = 0; $index < count($_SESSION['books']);$index++){
                $url = 'assets/pages/aboutBook.php?name-book='.$_SESSION['books'][$index]['title_book']
                        .'&genre-book=' . $_SESSION['books'][$index]['genre_book']
                        .'&year-book=' . $_SESSION['books'][$index]['year_book'];
                $book = '
                <div class="books book__1">
                    <div class="book__img">
                        <img src="" alt="">
                    </div>
                    <div class="book__info">
                        <h1 class="book__title">' . $_SESSION['books'][$index]['title_book'] . '</h1>
                        <p class="genre__book">' . $_SESSION['books'][$index]['genre_book'] . '</p>
                        <sub class="year__book">' . $_SESSION['books'][$index]['year_book'] . '</sub>
                        <a href="' . $url .'" class="link__description">Подробнее</a>
                    </div>
                </div>';
                echo $book;
            }
        ?>
<!--        <div class="books book__1">-->
<!--            <div class="book__img">-->
<!--                <img src="" alt="">-->
<!--            </div>-->
<!--            <div class="book__info">-->
<!--                <h1 class="book__title"></h1>-->
<!--                <p class="genre__book">Жанр</p>-->
<!--                <sub class="year__book">2077</sub>-->
<!--                <a href="" class="link__description">Подробнее</a>-->
<!--            </div>-->
<!--        </div>-->
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
<?php
if(!empty($_SESSION['user'])){
    echo '<script src="assets/js/drop_menu-catalog.js"></script>';
}
?>
</body>
</html>