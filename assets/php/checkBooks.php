<?php
session_start();
require 'connect.php';
// ГЕНЕРИРУЕМ АССОЦИАТИВНЫЙ МАССИВ ИЗ ВСЕХ ДАННЫХ О КНИГАХ
function checkBooks($db){
    //----------------------------------------------
    // ИЩЕМ ДАННЫЕ В БД
    $result = $db->query("SELECT * FROM `books`");
    $result2 = $db->query("SELECT * FROM `authors`");
    $merge = $db->query("SELECT * FROM `usersbooks`");
    //----------------------------------------------
    $books = [];
    $authors = [];
    $ships = [];
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($books,$row);
    }
    while($column = $result2->fetch(PDO::FETCH_ASSOC)) {
        array_push($authors, $column);
    }
    while($line = $merge->fetch(PDO::FETCH_ASSOC)){
        array_push($ships,$line);
    }
    $our = [
        "books" => $books,
        "authors" => $authors,
        "ships" => $ships
    ];
    if(empty($our)){
        return false;
    } else{
        return $our;
    }
}