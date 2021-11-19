<?php
session_start();
if($_SESSION['user']['status'] != 10){
    header("Location: ../../index.php");
}
require 'connect.php';
// ПРОВЕРКА НАЛИЧЯ АВТОРА В БАЗЕ ДАННЫХ
function checkAuthor($name, $db){
    $result = $db->query("SELECT * FROM `authors` WHERE `name_author` LIKE '$name'");
    $check = $result->fetch(PDO::FETCH_ASSOC);
    if($check == null){
        return false;
    } elseif(!$check){
        return false;
    } else{
        return true;
    }
}
// ПРОВЕРКА НАЛИЧИЯ КНИГИ В БАЗЕ ДАННЫХ
function checkBook($name,$genre,$year,$db){
    $result = $db->query("SELECT * FROM `books` WHERE `title_book`LIKE'$name' AND `year_book`LIKE'$year' AND `genre_book`LIKE'$genre'");
    $check = $result->fetch(PDO::FETCH_ASSOC);
    if($check == null || $check == false){
        return false;
    } else{
        return true;
    }
}
// ПРЕОБРАЗУЕТ СТРОКУ В МАССИВ ИЗ АВТОРОВ
function checkCountAuthors($arr, $db){
    $name_author = $arr['name_author'];
    if(!strpos($name_author, ',')){
        return [$name_author];
    } else{
        $name = '';
        $result = [];
        for ($index = 0; $index < strlen($name_author);$index++){
            if($name_author[$index] == ","){
                $name = substr($name_author,0,$index);
                array_push($result,$name);
                $name_author = str_replace($name,'',$name_author);
                $name = '';
                $name_author = ltrim("$name_author","\,");
            }
        }
        array_push($result,$name_author);
        return $result;
    }
}
$data = [
    "name_book" => $_POST['name-book'],
    "genre_book" =>$_POST['genre-book'],
    "desc" =>$_POST['description-book'],
    "year_book" =>$_POST['year-book'],
    "name_author" => $_POST['name-author'],
];
$path = 'assets/vendor/books/' . uniqid() . $_FILES['img-book']['name'];
?>
<pre>
    <?php
        print_r($_FILES);
        print_r($_POST);
    ?>
</pre>
<?php
if(count(checkCountAuthors($data,$database)) > 0){
    $arrAuthors = checkCountAuthors($data,$database);
    for ($index = 0;$index < count($arrAuthors); $index++){
        // ЕСЛИ АВТОР УЖЕ ЕСТЬ В БАЗЕ ДАННЫХ
        if(checkAuthor($arrAuthors[$index],$database)){
            // БЕРЕМ ID АВТОРА
            $idAuthor_fk = $database->query("SELECT `id_author` FROM `authors` WHERE `name_author` LIKE '{$arrAuthors[$index]}'");
            $idAuthor = $idAuthor_fk->fetch(PDO::FETCH_ASSOC);
            $idAuthor['id_author'] = (int) $idAuthor['id_author'];
            if(!checkBook($data['name_book'],$data['genre_book'],$data['year_book'],$database)){
                move_uploaded_file($_FILES['img-book']['tmp_name'],'../../'.$path);
                // ВСТАВЛЯЕМ КНИГУ В БАЗУ ДАННЫХ
                $database->query("INSERT INTO `books` (`id_book`, `title_book`, `genre_book`, `desc_book`, `img_book`, `year_book`) VALUES (NULL, '{$data['name_book']}', '{$data['genre_book']}', '{$data['desc']}', '$path' , '{$data['year_book']}')");
            }
            // СРАЗУ ПОЛУЧАЕМ ID КНИГИ
            $idBook_fk = $database->query("SELECT `id_book` FROM `books` WHERE `title_book` LIKE '{$data['name_book']}'");
            $id_book = $idBook_fk->fetch(PDO::FETCH_ASSOC);
            $id_book['id_book'] = (int) $id_book['id_book'];
            // ВСТАВЛЯЕМ ID'S В СВЯЗЫВАЮЩУЮ ТАБЛИЦУ
            $database->query("INSERT INTO `usersbooks` (`id_b`, `id_a`) VALUES ('{$id_book['id_book']}', '{$idAuthor['id_author']}')");
        } else{
            // ДОБАВЛЯЕМ КНИГУ И АВТОРА В БАЗУ ДАННЫХ
            move_uploaded_file($_FILES['img-book']['tmp_name'],'../../'.$path);
            $database->query("INSERT INTO `books` (`id_book`, `title_book`, `genre_book`, `desc_book`, `img_book`, `year_book`) VALUES (NULL, '{$data['name_book']}', '{$data['genre_book']}', '{$data['desc']}', '$path' , '{$data['year_book']}')");
            $database->query("INSERT INTO `authors` (`id_author`, `name_author`) VALUES (NULL , '{$arrAuthors[$index]}')");
            // ПОЛУЧАЕМ ИХ ID
            $answerOne = $database->query("SELECT `id_author` FROM `authors` WHERE `name_author` LIKE '{$arrAuthors[$index]}'");
            $id_author = $answerOne->fetch(PDO::FETCH_ASSOC);
            $answerTwo = $database->query("SELECT `id_book` FROM `books` WHERE `title_book` LIKE '{$data['name_book']}'");
            $id_book = $answerTwo->fetch(PDO::FETCH_ASSOC);
            $id_book['id_book'] = (int) $id_book['id_book'];
            $id_author['id_author'] = (int) $id_author['id_author'];
            // ВСТАВВЛЯЕМ ID'S В СВЯЗЫВАЮЩУЮ ТАБЛИЦУ
            $database->query("INSERT INTO `usersbooks` (`id_b`, `id_a`) VALUES ('{$id_book['id_book']}', '{$id_author['id_author']}')");
        }
    }
}