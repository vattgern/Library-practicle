<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/about_book.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <!-- !------------------------------------------------------------------- -->
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
    <!-- !------------------------------------------------------------------- -->
</body>
</html>
