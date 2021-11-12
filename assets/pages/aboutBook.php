<?php
session_start();
?>
<pre>
    <?php
        print_r($_REQUEST);
    ?>
</pre>
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
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/footer.css">
    <?php if(!empty($_SESSION['user'])){
        echo '<link rel="stylesheet" href="../css/header.css">';
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
                                <h1><a href="#">LibPath</a></h1>
                            </div>
                            <div>
                                <input type="search" name="search" id="search" placeholder="Что вы ищите ... ">
                                <label for="search">
                                    <img class="search-svg" src="../images/search-svg.svg" alt="">
                                </label>
                            </div>
                            <div class="profile">
                                <div class="name">' . $head_user_name . '</div>
                                <a href="catalog.php"><img src="' . $head_user_avatar . '" alt=""></a>
                                <div class="menu__icon"></div>
                            </div>
                        </header>';
    echo $header_with_user;
}
?>
<!-- !------------------------------------------------------------------- -->
<!-- * DROP MENU -->
<?php
if(!empty($_SESSION['user'])){
    echo '    <div class="drop__menu">
        <ul>
            <li><a href="profile.php">Настройки</a></li>
            <li><a href="php/logout.php">Выход</a></li>
        </ul>
    </div>';
}
?>
<!-- !------------------------------------------------------------------- -->
    <?php
    if(!empty($_SESSION['user'])){
        echo '<script src="../js/drop_menu-catalog.js"></script>';
    }
    ?>
</body>
</html>