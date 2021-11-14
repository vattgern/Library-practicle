<?php
if($_SESSION['user']['status'] != 10){
    header("Location: ../../index.php");
}
function getUser(){
    require 'connect.php';
    $users = [];
    $request = $database->query("SELECT * FROM `users`");
    while ($row = $request->fetch(PDO::FETCH_ASSOC)){
        array_push($users, $row);
    }
    return $users;
}