<?php
session_start();
require 'connect.php';
$img = $_FILES['file']['name'];
if(empty($img)){
    $_SESSION['message'] = 'Вы не выбрали файл';
} else{
    $path = 'assets/vendor/avatars/' . uniqid() . $img;
    unlink("../../../" . $_SESSION['user']['avatar']);
    move_uploaded_file($_FILES['file']['tmp_name'], "../../../" . $path);
    $database->query("UPDATE `users` SET `avatar`='$path' WHERE id = '{$_SESSION['user']['id']}'");
    $_SESSION['user']['avatar'] = $path;
}
header("Location: ../setting.php");
