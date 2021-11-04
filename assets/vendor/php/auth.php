<?php
session_start();
require 'connect.php';

$email =$_POST['email'];
$password = md5($_POST['password']);

$result_requare = $connect->query("SELECT * FROM  `users` WHERE 'email' = '$email' AND `password` = '$password'");
$user = $result_requare->fetch_assoc();
if(!empty($user)){
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "email" => $user['email']
    ];
    $_SESSION['message'] = "Вход выполнен";
    header("Location: ../../pages/catalog.php");
} else{
    $_SESSION['message'] = "Вы ввели неверные данные";
    header("Location: ../../pages/logIn.php");
}