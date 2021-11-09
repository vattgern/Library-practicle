<?php
session_start();
if(!empty($_SESSION['user'])){
    header("Location: assets/pages/catalog.php");
}
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
    <section class="promotion">
        <div class="promotion__title">
            <h1>Добро пожаловать в электронную библиотеку <p>LibPath</p></h1>
        </div>
    </section>
    <!-- !------------------------------------------------------------------- -->
    <!-- !------------------------------------------------------------------- -->

    <!-- !------------------------------------------------------------------- -->
    <script src="assets/js/main.js"></script>
</body>
</html>