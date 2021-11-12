<?php
require 'connect.php';
function checkBooks($db){
    $result = $db->query("SELECT * FROM `books`");
    $data = [];
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($data,$row);
    }
    if(empty($data)){
        return false;
    } else{
        return $data;
    }
}