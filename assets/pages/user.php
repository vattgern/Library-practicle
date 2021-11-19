<?php session_start();
if($_SESSION['user']['status'] != 10){
    header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/book.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
<!----------------------------------------------------------------------------------------->
<!-- ШАПКА -->
<header>
    <div class="logo">
        <h1><a href="../../index.php">LibPath</a></h1>
    </div>
    <div>
        <input type="search" name="search" id="search" placeholder="Что вы ищите ... ">
        <label for="search">
            <img class="search-svg" src="../images/search-svg.svg" alt="">
        </label>
    </div>
    <div class="profile">
        <div class="name"><?= $_SESSION['user']['name'] ?></div>
        <img src="<?= '/' .$_SESSION['user']['avatar']?>" alt=''>
        <div class="menu__icon"></div>
    </div>
</header>
<!----------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------->
<!-- МЕНЮ ПОЛЬЗОВАТЕЛЯ   -->
<div class="drop__menu">
    <ul>
        <li><a href="setting.php">Настройки</a></li>
        <li><a href="../php/logout.php">Выход</a></li>
    </ul>
</div>
<!----------------------------------------------------------------------------------------->
<!-- ОБАЛСТЬ ДЛЯ ТАБЛИЦ -->
<section class="area">
    <div class="option-books">
        <ul>
            <li><a href="#" class="add">Добавить</a></li>
            <li><a href="#" class="edit">GET</a></li>
            <li><a href="#" class="delete">Удалить</a></li>
        </ul>
    </div>
    <div class="book-area">
<!--        ТАБЛИЦА ПОЛЬЗОВАТЕЛЕЙ-->
        <table class='table_users' border='2' style='color: white'></table>
<!--        ТАБЛИЦА КНИГ-->
        <table class='table_books' border='2' style='color: white'>

        </table>
    </div>
</section>
<!----------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------->
<!-- ОБЛАСТЬ ДЛЯ ПОПАНОВ-->
<div class="area-popOn">
    <div class="btnExit">
        <div></div>
    </div>
    <!--        ПОПАН НА ДОБАВЛЕНИЕ КНИГИ-->
    <!--        ------------------------------------------------------------------------------------------------------------- -->
    <div class="popOnAdd">
        <h1>Добавление книги</h1>
        <form method="post" id="form-add" enctype="multipart/form-data">
            <input type="text" name="name-book" id="name-book" placeholder="Введите название книги">
            <input type="text" name="name-author" id="name-author" placeholder="Введите ФИО Автора">
            <input type="text" name="genre-book" id="genre-book" placeholder="Введите жанр книги">
            <input type="text" name="year-book" id="year-book" placeholder="Введите год выпуска">
            <input type="file" name="img-book" id="img-book">
            <textarea name="description-book" id="description-book" placeholder="Описание"></textarea>
            <button type="submit" id="btnFormAdd">
                Добавить
            </button>
        </form>
    </div>
    <!--        ------------------------------------------------------------------------------------------------------------- -->
<!--        ПОПАН НА УДАЛЕНИЕ КНИГИ-->
    <!--        ------------------------------------------------------------------------------------------------------------- -->
    <div class="popOnDelete">
        <h1>Удаление книги</h1>
        <form action="" id="form-book">
            <input type="text" name="name-book" id="name-booker" placeholder="Введите название книги">
            <button type="submit" id="btnFormDelete">
                Удалить
            </button>
        </form>
    </div>
    <!--        ------------------------------------------------------------------------------------------------------------- -->
</div>
<!----------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------->
<script src="../js/ajax_requests.js"></script>
<script  src="../js/drop_menu-catalog.js"></script>
<script  src="../js/popOns.js"></script>
</body>
</html>