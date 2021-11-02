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
                <li><a href="../../index.html">Главная</a></li>
                <li class="middle"><a href="#">Каталог</a></li>
                <li><a href="logIn.html">Вход</a></li>
            </ul>
        </nav>
    </header>
    <!-- !------------------------------------------------------------------- -->
    <!-- !------------------------------------------------------------------- -->
    <!-- * Форма Авторизации -->
    <div class="auth">
        <h1>Зарегистрируйтесь</h1>
        <form action="post">
            <label for="email">
                Введите почту
                <input type="email" name="email" id="email">
            </label>
            <label for="password">
                Введите пароль
                <input type="password" name="password" id="password">
            </label>
            <label for="password">
                Введите пароль заного
                <input type="password" name="password" id="password">
            </label>
            <button type="submit">Зарегистрирваться</button>
            <div class="create">
                <p>Есть, аккаунт <a href="logIn.html">Войдите</a></p>
            </div>
        </form>
    </div>
    <!-- !------------------------------------------------------------------- -->
</body>
</html>