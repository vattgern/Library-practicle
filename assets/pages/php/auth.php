<?php
session_start();
require 'connect.php';

$email =$_POST['email'];
$password = md5($_POST['password']);

$result = $connect->query("SELECT * FROM  `users` WHERE `email`='$email' AND `password`='$password'");
if($result == false){
    $_SESSION['message'] = "Вы ввели неверные данные";
    header("Location: ../logIn.php");
} elseif ($result == null){
    $_SESSION['message'] = "Такого пользователя не существует";
    header("Location: ../logIn.php");
} else{
    $user = $result->fetch_assoc();
    if(is_array($user)){
        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "email" => $user['email']
        ];
        $_SESSION['message'] = "Вход выполнен";
        header("Location: ../catalog.php");
    }
}