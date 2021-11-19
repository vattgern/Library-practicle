<?php
require_once '../php/getUsers.php';
$users = getUser();
$table_users = "<tr>
                    <td>id</td>
                    <td>ФИО</td>
                    <td>Почта</td>
                    <td>Статус</td>
                    <td>Удаление</td>
                </tr>";
for($index = 0;$index < count($users); $index++){
    $line = "<tr>
                                <td>" . $users[$index]['id'] . "</td>
                                <td>" . $users[$index]['name'] . "</td>
                                <td>" . $users[$index]["email"] . "</td>
                                <td>" . $users[$index]['status'] . "</td>
                                <td><a href='../php/delete_user.php?id=" . $users[$index]['id'] . "'>Удалить</a></td>
                            </tr>";
    $table_users .= $line;
}
echo $table_users;