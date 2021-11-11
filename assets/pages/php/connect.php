<?php
try {
    $database = new PDO('mysql:host=localhost;dbname=library-practicle','root','');
} catch (PDOException $e){
    echo "Ошибка подключения базы данных " . $e;
    die();
}