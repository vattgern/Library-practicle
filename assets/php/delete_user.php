<?php
if($_SESSION['user']['status'] != 10){
    header("Location: ../../index.php");
}
require 'connect.php';
$database->query("DELETE FROM `users` WHERE `id` = {$_REQUEST['id']}");
header("Location: ../pages/user.php");