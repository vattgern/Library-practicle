<?php
require 'connect.php';
$id = $_GET['id'];
$res = $database->query("SELECT `desk_book` FROM `books` WHERE `id_book`='$id'");
$desc = $res->fetch(PDO::FETCH_ASSOC);
echo $desc;