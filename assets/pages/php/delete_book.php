<?php
session_start();
if($_SESSION['user']['status'] != 10){
    header("Location: ../../index.php");
}
try {
    $database = new PDO('mysql:host=localhost;dbname=library-practicle','root','');
} catch (PDOException $e){
    echo "Ошибка подключения базы данных " . $e;
    die();
}
function check($row, $a){
    $row[$a] ??= $a;
    return $row[$a];
}
//НАШЛИ КНИГУ
$haveBook =  $database->query("SELECT * FROM `books` WHERE `title_book` LIKE '{$_REQUEST['name_book']}'");
$result = $haveBook->fetch(PDO::FETCH_ASSOC);
if(is_array($result)){
    $arr1['id_b'] = (int)$result['id_book'];
    $merge = $database->query("SELECT * FROM `usersbooks` WHERE `id_b` LIKE '{$arr1['id_b']}'" );
    $result2 = $merge->fetch(PDO::FETCH_ASSOC);
    if(is_array($result2)){
        $arr2['id_a'] = (int)$result2['id_a'];
        $database->query("DELETE FROM `usersbooks` WHERE `id_a` = '{$arr2['id_a']}'");
        $database->query("DELETE FROM `usersbooks` WHERE `id_b` = '{$arr1['id_b']}'");
        $database->query("DELETE FROM `books` WHERE `id_book` = '{$arr1['id_b']}'");
        $database->query("DELETE FROM `authors` WHERE `id_author` = '{$arr2['id_a']}'");
    }
};