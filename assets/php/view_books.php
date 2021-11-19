<?php
$table_books = "<tr>
                <th>id</th>
                <th>Название книги</th>
                <th>Жанр книги</th>
                <th>Путь обложки</th>
                <th>Удалить</th>
            </tr>";
require_once '../php/checkBooks.php';
require '../php/connect.php';
$books = checkBooks($database);
$books = $books["books"];
for ($index = 0; $index < count($books); $index++) {
    $lines = "<tr>
                                <td>" . $books[$index]['id_book'] . "</td>
                                <td>" . $books[$index]['title_book'] . "</td>
                                <td>" . $books[$index]["genre_book"] . "</td>
                                <td>" . $books[$index]['img_book'] . "</td>
                                <td><a href='../php/delete_book.php?id=" . $books[$index]['id_book'] . "'>Удалить</a></td>
                            </tr>";
    $table_books .= $lines;
}
echo $table_books;