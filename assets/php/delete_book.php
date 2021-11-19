<?php
session_start();
// ПРОВЕРКА НА АДМИНА
//------------------------------------------------------------------------------
if($_SESSION['user']['status'] != 10){
    header("Location: ../../index.php");
}
//------------------------------------------------------------------------------
require 'connect.php';
//------------------------------------------------------------------------------
// ИДЕТ ВЫПОЛЕНИЕ УДАЛЕНИЯ С AJAX И БЕЗ НЕГО ЧЕРЕЗ ТАБЛИЦУ
if(empty($_POST)){
    $request = $database->query("SELECT * FROM `books` WHERE `id_book` LIKE '{$_REQUEST['id']}'");
    $id = $request->fetch(PDO::FETCH_ASSOC);
    $database->query("DELETE FROM `usersbooks` WHERE `id_b` = '{$_REQUEST['id']}'");
    $database->query("DELETE FROM `books` WHERE `id_book` = '{$_REQUEST['id']}'");
    header("Location: ../pages/user.php");
} else{
    $request = $database->query("SELECT * FROM `books` WHERE `title_book` LIKE '{$_POST['name_book']}'");
    $id = $request->fetch(PDO::FETCH_ASSOC);
    $id['id_book'] = (int) $id['id_book'];
    $database->query("DELETE FROM `usersbooks` WHERE `id_b` = '{$id['id_book']}'");
    $database->query("DELETE FROM `books` WHERE `id_book` = '{$id['id_book']}'");
    header("Location: ../pages/user.php");
}
//------------------------------------------------------------------------------