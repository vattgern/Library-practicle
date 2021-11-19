<?php
session_start();
$_REQUEST['name-authors'] = str_replace(',','',$_REQUEST['name-authors']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $_REQUEST['name-book'] ?></title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/about_book.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <?php if(!empty($_SESSION['user'])){
        echo '<link rel="stylesheet" href="../css/header.css">';
    } else{
        echo '<link rel="stylesheet" href="../css/header_without_user.css">';
    }
    ?>
</head>
<body>
<!-- !------------------------------------------------------------------- -->
<!-- * Шапка -->
<?php
$header_without_user = '<header>
                                <div class="logo">
                                    <h1><a href="../../index.php">LibPath</a></h1>
                                </div>
                                <nav>
                                    <ul>
                                        <li><a href="#">Главная</a></li>
                                        <li class="middle"><a href="#">Каталог</a></li>
                                        <li><a href="logIn.php">Вход</a></li>
                                    </ul>
                                </nav>
                        </header>';
if(empty($_SESSION['user'])){
    echo $header_without_user;
} else{
    $head_user_name = "{$_SESSION['user']['name']} ";
    $head_user_avatar = "/" . "{$_SESSION['user']['avatar']}";
    $header_with_user = '<header>
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
                                <div class="name">' . $head_user_name . '</div>
                                <a href="user.php"><img src="' . $head_user_avatar . '" alt=""></a>
                                <div class="menu__icon"></div>
                            </div>
                        </header>';
    echo $header_with_user;
}
?>
<!-- !------------------------------------------------------------------- -->
<!-- !------------------------------------------------------------------- -->
<!-- * DROP MENU -->
<?php
if(!empty($_SESSION['user'])){
    echo '    <div class="drop__menu">
        <ul>
            <li><a href="setting.php">Настройки</a></li>
            <li><a href="../php/logout.php">Выход</a></li>
        </ul>
    </div>';
}
?>
<!-- !------------------------------------------------------------------- -->
<!-- !------------------------------------------------------------------- -->
<!--* СЕКЦИЯ О КНИГЕ-->
<section>
    <aside>
        <img src="<?= '../../' . $_REQUEST['img_book'] ?>" alt="">
    </aside>
    <article>
        <div class="book__title"><strong>Название произведения:</strong>  <?= $_REQUEST['name-book'] ?></div>
        <div class="genre__book"><strong>Жанр произведения:</strong>  <?= $_REQUEST['genre-book'] ?></div>
        <div class="year__book"><strong>Год издания:</strong>  <?= $_REQUEST['year-book'] ?></div>
        <div class="authors__book"><strong>Автор:</strong>  <?= $_REQUEST['name-authors']?></div>
    </article>
</section>
<!-- !------------------------------------------------------------------- -->
<!-- !------------------------------------------------------------------- -->
<!--* ОПИСАНИЕ КНИГИ-->
<div class="description">
    <h1>Описание</h1>
    <p>
        <?= $_REQUEST['desc']  ?>
    </p>
</div>
<!-- !------------------------------------------------------------------- -->
<!-- * Подвал -->
<footer>
    <div class="footer__name">
        <p>Выполнил:</p>
        <a href="#">Лиджиев Александр</a>
    </div>
    <div class="footer__links">
        <ul>
            <li><a href="../pages/logIn.php">Войти</a></li>
            <li><a href="../pages/registration.php">Зарегистрироваться</a></li>
            <li><a href="#">Тех. поддержка</a></li>
            <li><a href="#">Справка</a></li>
            <li><a href="#">Политика конфиденциальности</a></li>
        </ul>
    </div>
</footer>
<!-- !------------------------------------------------------------------- -->
<!-- !------------------------------------------------------------------- -->
<!-- * СКРИПТЫ-->
    <?php
    if(!empty($_SESSION['user'])){
        echo '<script src="../js/drop_menu-catalog.js"></script>';
    }
    ?>
<!-- !------------------------------------------------------------------- -->
<!-- !------------------------------------------------------------------- -->
</body>
</html>
