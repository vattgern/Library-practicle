<?php
$connect = mysqli_connect('localhost','root','','library-practicle');
if(!$connect){
    die("<h1>Ошибка подключения к бд</h1>");
}