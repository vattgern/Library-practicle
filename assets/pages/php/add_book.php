<?php
session_start();
try {
    $database = new PDO('mysql:host=localhost;dbname=library-practicle','root','');
} catch (PDOException $e) {
    echo "Ошибка подключения базы данных " . $e;
    die();
}
$name_book = $_POST['name_book'];
$name_author = $_POST['name_author'];
$genre_book = $_POST['genre_book'];
$desc = $_POST['desc'];
$year_book = $_POST['year_book'];

$data = [
    "name_book" => $_POST['name_book'],
    "genre_book" =>$_POST['genre_book'],
    "desc" =>$_POST['desc'],
    "year_book" =>$_POST['year_book'],
    "name_author" => $_POST['name_author']
];
$database->query("INSERT INTO `books` (`id_book`, `title_book`, `genre_book`, `desc_book`, `img_book`, `year_book`) VALUES (NULL, '{$data['name_book']}', '{$data['genre_book']}', '{$data['desc']}', '' , '{$data['year_book']}')");
$database->query("INSERT INTO `authors` (`id_author`, `name_author`) VALUES (NULL , '{$data['name_author']}')");

$answerOne = $database->query("SELECT id_author FROM `authors` WHERE `name_author` = '{$data['name_author']}'");
$id_author = $answerOne->fetch(PDO::FETCH_ASSOC);

$answerTwo = $database->query("SELECT id_book FROM `books` WHERE `title_book` = '{$data['name_book']}'");
$id_book = $answerTwo->fetch(PDO::FETCH_ASSOC);

$id_book['id_book'] = (int) $id_book['id_book'];
$id_author['id_author'] = (int) $id_author['id_author'];

//$database->query("INSERT INTO `usersbooks` (`id_b`, `id_a`) VALUES ('{$id_book['id_book']}', '{$id_author['id_author']}'");
$database->query("INSERT INTO `usersbooks` (`id_b`, `id_a`) VALUES ('{$id_book['id_book']}', '{$id_author['id_author']}')");