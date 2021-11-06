<?php
session_start();
require 'connect.php';
function checkPass($one, $two){
    return $one == $two;
}
$fullName = $_POST["first_name"] . " " . $_POST["last_name"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_two = $_POST["password_two"];

if(checkPass($password,$password_two)){
    $password = md5($password);
    if(!empty($_FILES['avatar']['name'])){
        $path = 'assets/vendor/avatars/' . time() . $_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], '../../../' . $path);
    }
    mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`) VALUES (NULL, '$fullName', '$email', '$password', '$path')");
    $_SESSION['message'] = "Регистрация прошла успешно";
    header("Location: ../logIn.php");
} else{
    $_SESSION['message'] = 'Пароли не совпадают';
    header("Location: ../registration.php");
}