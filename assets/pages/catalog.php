<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/book.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
            <img src="<?= '/' .$_SESSION['user']['avatar']?>" alt=''>
            <div class="menu__icon"></div>
        </div>
    </header>
    <!-- ! ------------------------------------------------- -->
    <!-- ! ------------------------------------------------- -->
    <!-- * Меню пользователя   -->
    <div class="drop__menu">
        <ul>
            <li><a href="profile.php">Настройки</a></li>
            <li><a href="php/logout.php">Выход</a></li>
        </ul>
    </div>
    <!-- ! ------------------------------------------------- -->
    <!-- ! ------------------------------------------------- -->
<!--    <div class="book">-->
<!--        <div class="book__img"></div>-->
<!--        <div class="book__title">-->
<!--            <p>-->
<!--                Автор: Типо автор или авторы-->
<!--            </p>-->
<!--        </div>-->
<!--        <div class="book__link">-->
<!--            <a href="#">Подробнее</a>-->
<!--        </div>-->
<!--    </div>-->
    <section class="area">
        <div class="option-books">
            <ul>
                <li><a href="#" class="add">Добавить</a></li>
                <li><a href="#" class="edit">Изменить</a></li>
                <li><a href="#" class="delete">Удалить</a></li>
                <li><a href="php/testing.php">TESING</a></li>
            </ul>
        </div>
        <div class="book-area">

        </div>
    </section>
    <div class="area-popOn">
        <div class="btnExit">
            <div></div>
        </div>
        <div class="popOnAdd">
            <h1>Добавление книги</h1>
            <form action="" id="form-book">
                <input type="text" name="name-book" id="name-book" placeholder="Введите название книги">
                <input type="text" name="name-author" id="name-author" placeholder="Введите ФИО Автора">
                <input type="text" name="genre-book" id="genre-book" placeholder="Введите жанр книги">
                <input type="text" name="year-book" id="year-book" placeholder="Введите год выпуска">
                <textarea name="description-book" id="description-book" placeholder="Описание"></textarea>
                <button type="submit" id="btnFormAdd">
                    Добавить
                </button>
            </form>
        </div>
    </div>
    <!-- ! ------------------------------------------------- -->
    <script>
        $(document).ready(function(){
            $('#btnFormAdd').on('click', function () {
                let nameBook = $('#name-book').val()
                let nameAuthor = $('#name-author').val()
                let genreBook = $('#genre-book').val()
                let yearBook = $('#year-book').val()
                let description = $('#description-book').val()
                $.ajax({
                    method: 'POST',
                    url: 'php/add_book.php',
                    data: {
                        name_book: nameBook,
                        name_author: nameAuthor,
                        genre_book: genreBook,
                        desc: description,
                        year_book: yearBook
                    },
                }).done(function (msg){
                    alert("Data saved " + msg)

                })
            })
        })
    </script>
    <script  src="../js/drop_menu-catalog.js"></script>
    <script  src="../js/popOns.js"></script>
</body>
</html>