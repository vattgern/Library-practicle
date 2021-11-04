<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/logIn.css">
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
                <li><a href="../../index.html">Главная</a></li>
                <li class="middle"><a href="#">Каталог</a></li>
                <li><a href="#">Вход</a></li>
            </ul>
        </nav>
    </header>
    <!-- !------------------------------------------------------------------- -->
    <!-- !------------------------------------------------------------------- -->
    <!-- * Форма Авторизации -->
    <div class="auth">
        <h1>Авторизуйтесь</h1>
        <form action="php/auth.php" method="post">
            <label for="email">
                Введите почту
                <input type="email" name="email" id="email">
            </label>
            <label for="password">
                Введите пароль
                <input type="password" name="password" id="password">
            </label>
            <button type="submit">Войти</button>
            <div class="create">
                <p>Нет, аккаунта? <a href="registration.php">Зарегистрируйтесь</a></p>
            </div>
            <?php
                if(!empty($_SESSION['message'])){
                    echo "<strong style='color: red; font-size: 1.25rem; text-align: center'>{$_SESSION['message']}</strong>";
                    unset($_SESSION['message']);
                } else{
                    $_SESSION['message'] = '';
                }
            ?>
        </form>
    </div>
    <!-- !------------------------------------------------------------------- -->
</body>
</html>