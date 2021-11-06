<?php
session_start();
if(!empty($_SESSION['user'])){
    header("Location: catalog.php");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
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
                <li><a href="../../index.php">Главная</a></li>
                <li class="middle"><a href="#">Каталог</a></li>
                <li><a href="logIn.php">Вход</a></li>
            </ul>
        </nav>
    </header>
    <!-- !------------------------------------------------------------------- -->
    <!-- !------------------------------------------------------------------- -->
    <!-- * Форма Авторизации -->
    <div class="auth">
        <h1>Зарегистрируйтесь</h1>
        <form action="php/signup.php" method="post" enctype="multipart/form-data">
            <label for="first_name">
                Введите имя
                <input type="text" name="first_name" id="first_name">
            </label>
            <label for="last_name">
                Введите фамилию
                <input type="text" name="last_name" id="last_name">
            </label>
            <label for="email">
                Введите почту
                <input type="email" name="email" id="email">
            </label>
            <label for="avatar">
                <input type="file" name="avatar" id="avatar">
            </label>
            <label for="password">
                Введите пароль
                <input type="password" name="password" id="password">
            </label>
            <label for="password_two">
                Введите пароль заного
                <input type="password" name="password_two" id="password_two">
            </label>
            <button type="submit">Зарегистрирваться</button>
            <div class="create">
                <p>Есть, аккаунт <a href="logIn.php">Войдите</a></p>
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