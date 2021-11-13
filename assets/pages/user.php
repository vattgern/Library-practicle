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
<!-- ! ------------------------------------------------- -->
<!-- * Шапка -->
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
<!-- ! ------------------------------------------------- -->
<!-- ! ------------------------------------------------- -->
<!-- * Меню пользователя   -->
<div class="drop__menu">
    <ul>
        <li><a href="setting.php">Настройки</a></li>
        <li><a href="php/logout.php">Выход</a></li>
    </ul>
</div>
<section class="area">
    <div class="option-books">
        <ul>
            <li><a href="#" class="add">Добавить</a></li>
            <li><a href="#" class="edit">Изменить</a></li>
            <li><a href="#" class="delete">Удалить</a></li>
            <form action="php/delete_without_ajax.php" method="post">
                <input type="text" name="name_book" id="" placeholder="Книгу крирорукий">
                <input type="submit" value="Удалить без AJAX">
            </form>

        </ul>
    </div>
    <div class="book-area">
        <?php
        require_once 'php/getUsers.php';
        $users = getUser();
        $table = "<table class='table_users' border='2' style='color: white'>
                               <tr>
                               <th>id</th>
                               <th>Имя</th>
                               <th>Почта</th>
                               <th>Статус</th>
                               <th>Удалить</th>
                                </tr>";
        $end_table = "</table>";
        for($index = 0;$index < count($users); $index++){
            $line = "<tr>
                                <td>" . $users[$index]['id'] . "</td>
                                <td>" . $users[$index]['name'] . "</td>
                                <td>" . $users[$index]["email"] . "</td>
                                <td>" . $users[$index]['status'] . "</td>
                                <td><a href='php/delete_user.php?id=" . $users[$index]['id'] . "'>Удалить</a></td>
                            </tr>";
            $table .= $line;
        }
        $table .= $end_table;
        echo $table;
        ?>
    </div>
</section>
<div class="area-popOn">
    <div class="btnExit">
        <div></div>
    </div>
    <div class="popOnAdd">
        <h1>Добавление книги</h1>
        <form method="post" id="form-book" enctype="multipart/form-data">
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
    <div class="popOnDelete">
        <h1>Удаление книги</h1>
        <form action="" id="form-book">
            <input type="text" name="name-book" id="name-booker" placeholder="Введите название книги">
            <button type="submit" id="btnFormDelete">
                Добавить
            </button>
        </form>
    </div>
</div>
<!-- ! ------------------------------------------------- -->
<script>
    $(document).ready(function(){
        $('#btnFormDelete').on('click', function () {
            let nameBook = $('#name-booker').val()
            $.ajax({
                method: 'POST',
                url: 'php/delete_book.php',
                data: {
                    name_book: nameBook,
                },
            }).done(function (msg){
                alert("Book deleted " + msg)
            })
        })
        $('#btnFormAdd').on('click', function () {
            let nameBook = $('#name-book').val()
            let nameAuthor = $('#name-author').val()
            let genreBook = $('#genre-book').val()
            let yearBook = $('#year-book').val()
            let description = $('#description-book').val()
            let imgBook = document.querySelector("#img-book").files[0]
            var formData = new FormData();
            formData.append('file', $("#img-book").files[0]);
            $.ajax({
                method: 'POST',
                url: 'php/add_book.php',
                data: {
                    "name_book": nameBook,
                    "name_author": nameAuthor,
                    "genre_book": genreBook,
                    "year_book": yearBook,
                    "desc": description,
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