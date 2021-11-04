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
    mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, '$fullName', '$email', '$password')");
    $_SESSION['message'] = "Регистрация прошла успешно";
    header("Location: ../logIn.php");
} else{
    $_SESSION['message'] = 'Пароли не совпадают';
    header("Location: ../registration.php");
}