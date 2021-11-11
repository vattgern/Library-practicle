<?php
session_start();
require 'connect.php';
$new_first_name = $_POST['newFirstName'];
$new_last_name = $_POST['newLastName'];
$full_name = $new_first_name . ' ' . $new_last_name;
if($new_first_name == '' || $new_last_name == ''){
    $_SESSION['message'] = 'Пустые строки';
} else{
    $database->query("UPDATE `users` SET `name`='$full_name' WHERE id = '{$_SESSION['user']['id']}'");
    $_SESSION['user']['name'] = $full_name;
}
header("Location: ../profile.php");
