<?php session_start();
if(empty($_SESSION['user'])){
    header("Location: ../../index.php");
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $_SESSION['user']['name']; ?></title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/profile.css">
    <script src="../js/settingMenu.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    <!--  --------------------------------------------------------------------------------- -->
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
        </div>
    </header>
    <!--  --------------------------------------------------------------------------------- -->
    <!--  --------------------------------------------------------------------------------- -->
    <section>
        <aside>
            <ul class="setting__menu">
                <li>Изменить аватар</li>
                <li>Изменить имя</li>
                <li><a href="user.php">Выйти из настроек</a></li>
                <li><a href="php/logout.php">Выйти из аккаунта</a></li>
            </ul>
        </aside>
        <article>
            <div class="block_avatar">
                <div class="result">
                    <img src="<?= '/' . $_SESSION['user']['avatar'] ?>" alt="">
                </div>
                <form action="php/changeAvatar.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" id="file" class="input-file">
                    <label for="file" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузить файл</span>
                    </label>
                    <input type="submit" value="Изменить аватар">
                </form>
                <?php
                    if(!empty($_SESSION['message'])){
                        echo "<strong style='color: red; font-size: 1.25rem; text-align: center'>{$_SESSION['message']}</strong>";
                        unset($_SESSION['message']);
                    } else{
                        $_SESSION['message'] = '';
                    }
                ?>
            </div>
            <div class="block_name">
                <form action="php/changeName.php" method="post">
                    <label for="newFirstNameName">Изменить имя:</label>
                    <input type="text" name="newFirstName" id="newFirstName">
                    <label for="newLastName">Изменит фамилию:</label>
                    <input type="text" name="newLastName" id="newLastName">
                    <input type="submit" value="Изменить имя">
                </form>
                <?php
                    if(!empty($_SESSION['message'])){
                        echo "<strong style='color: red; font-size: 1.25rem; text-align: center'>{$_SESSION['message']}</strong>";
                        unset($_SESSION['message']);
                    } else{
                        $_SESSION['message'] = '';
                    }
                ?>
            </div>
        </article>
    </section>
    <!--  --------------------------------------------------------------------------------- -->
</body>
</html>